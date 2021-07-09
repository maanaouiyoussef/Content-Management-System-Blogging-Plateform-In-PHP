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

               

                <!-- First Blog Post -->
                
                
                <?php
                
                /// count for pager !
                
               /* if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                } 
                else{
                    $page = " ";
                }
            
        $quer_count = "SELECT * FROM posts";
        $res = mysqli_query($connection,$quer_count);
        $count = mysqli_num_rows($res);       
        $count = ceil($count/10); */   
                
        /// if WE WANT THE NEWEST TO BE IN THE TOP ,MUST ADD A CONDITION ORDER BY POST_ID DESC        
                if(isset($_SESSION['role']))
                {                
                $query_post = "SELECT * FROM posts ORDER BY post_id DESC  ";
                $result_post = mysqli_query($connection,$query_post);
                    $count_posts = mysqli_num_rows($result_post);
                    if($count_posts < 1)
                    {
                        echo "<h1 class='page-header'>No post available</h1>";
                    }
                while($row_post = mysqli_fetch_assoc($result_post) )
                {
                    $post_id = $row_post['post_id'];
                    $title = $row_post['post_title'];  
                    $p_author = $row_post['post_author']; 
                    $date = $row_post['post_date']; 
                    $image = $row_post['post_image']; 
                    $status = $row_post['post_status'];
                    $content = substr($row_post['post_content'],0,250)."...";
                    if($status == 'published')
                    {
                ?>
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>" ><?php echo $title;?></a>
                </h2>
                <p class="lead">
                    by <a href="postauthor.php?author=<?php echo $p_author; ?>"><?php echo $p_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date;?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id;?>"><img class="img-responsive" src="images/<?php echo $image;?>" alt=""></a>
                <hr>
                <p><?php echo $content;?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php }}
                ?>
                  <nav aria-label="Page navigation example">
           <ul class="pager">
    <?php
        
        
        for($i=1;$i<=5;$i++)
        {
            echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>$i</a></li>";
        }
       
            ?>
       
          </ul>
      </nav>
           <?php
                }
                else{
                    ?>
              
                    <h1 class="page-header">
                    MEDHOST 
                    <small>Find your doctor here without visiting hospitals ! </small>
                </h1>
                <img class="img-responsive" src="imageS/19751iD7D3F21422F6154C.jpg" alt="">
                <hr>
                
                <a class="btn btn-primary" href='registration.php'>Sign up<span class="glyphicon glyphicon-chevron-right"></span></a>

             <?php   } ?>                
            </div>
         
            <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php"; ?>
        </div>
        <!-- /.row -->
        <hr>
        
        
      
          
        
        
<?php require "includes/footer.php"; ?>
        