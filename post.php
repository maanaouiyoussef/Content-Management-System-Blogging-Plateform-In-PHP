<!--server -->
<?php require "includes/db.php"; ?>


<!-- Header  -->
<?php include "includes/header.php";?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Posts
                </h1>
                
                <!-- First Blog Post -->
                <?php
            
                if(isset($_GET['p_id']))
                {
                    $post_id = $_GET['p_id'];
                    
                      /* Posts views !!!! */
                    
                         $query_views = "UPDATE posts SET post_views_count=post_views_count+1 WHERE post_id={$post_id}";
                         $result_views = mysqli_query($connection,$query_views);
                    
                    $query_post = "SELECT * FROM posts WHERE post_id=$post_id";
                    $result_post = mysqli_query($connection,$query_post);
                while($row_post = mysqli_fetch_assoc($result_post) )
                {
                    $title = $row_post['post_title'];  
                    $author = $row_post['post_author']; 
                    $date = $row_post['post_date']; 
                    $image = $row_post['post_image']; 
                    $content = $row_post['post_content']; 
                ?>
                <h2>
                    <a href="#"><?php echo $title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date;?> </p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $image;?>" alt="">
                <hr>
                <p><?php echo $content;?></p>
                <hr>
                
            <?php 
                
                if($_SESSION['role'] == 'Admin')
                {
                    echo"<a class='btn btn-primary' href='admin/posts.php?source=edit_post&edit={$post_id}'>Edit Post<span class='glyphicon glyphicon-chevron-right'></span></a><br><br>";
                }
                    
               } }
                
                else{
                    header("location: index.php");
                }
        
                ?>
               
               
                <!-- Blog Comments -->
            
                <!-- Comments Form -->
    
                <div class="well">
                    <h4>Leave a Comment :</h4><br>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                           <label  for='comment'>Author</label>
                            <input type='text' name='comment_author' class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for='comment'>Email</label>
                            <input type='email' name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for='comment'>Your comment</label>
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="comment" class="btn btn-primary">Submit</button><br>
                        <?php
                
                if(isset($_POST['comment']))
                {
                    $author = $_POST['comment_author'];
                    $email = $_POST['comment_email'];
                    $content = $_POST['content'];
                    if(empty($author||$email||$content))
                    {
                        echo "<script>alert('Some field is empty please check out that you filled all the fields !')</script>";
                    }
                    else{
                     $query_c = "INSERT INTO 
            comments(comment_post_id,comment_author,comment_email,comment_content,comment_status) 
                        VALUES ('$post_id','$author','$email','$content','Pending...') ";
                       $result_c = mysqli_query($connection,$query_c);
                        echo "<br><p style='color:green;'>Your Comment will display soon just after beeing approved by the admin !</p>";
                    
                    
                    $query_comment_count= "UPDATE posts SET post_comments_count = post_comments_count+1 WHERE post_id = $post_id";
                    $send_query = mysqli_query($connection,$query_comment_count);
                            } 
                    }
                
                            ?>
                    </form>
                   
                </div>

                <hr>
               

                <!-- Posted Comments -->
                
                <?php
                
                $query_select_comment = "SELECT * FROM comments WHERE comment_post_id =$post_id AND comment_status='approved' ORDER BY comment_id DESC ";
                $result_select_comment = mysqli_query($connection,$query_select_comment);
                    while($row = mysqli_fetch_assoc($result_select_comment))
                    {
                        $author = $row['comment_author'];
                        $content = $row['comment_content'];
                        $date = $row['comment_date'];
                ?>        
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $author; ?>
                            <small><?php echo $date; ?></small>
                        </h4>
                        <?php echo $content; ?>
                    </div>
                </div>
                
                
                <?php  
                   
                 }
              
                ?>
                
              
            </div>
         
            <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php"; ?>
       </div>
        <!-- /.row -->
        <hr>
<?php require "includes/footer.php"; ?>
        