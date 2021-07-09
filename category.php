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
                if(isset($_SESSION['role']))
                {
                if(isset($_GET['c_id']))
                {
                    $cat_id = $_GET['c_id'];
                    $query_cat = "SELECT * FROM posts WHERE post_category_id=$cat_id";
                    $result_cat = mysqli_query($connection,$query_cat);
                while($row_post = mysqli_fetch_assoc($result_cat) )
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
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php }}}
                else{
                 echo " <h1 class=\"page-header\">
                    Sorry no category is available !
                    <br><small>Must subscribe by creating an account or login it's for free</small>
                </h1>";
                }    
                ?>
            </div>
         
            <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php"; ?>
       </div>
        <!-- /.row -->
        <hr>
<?php require "includes/footer.php"; ?>
        