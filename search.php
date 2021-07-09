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
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <?php
                if(isset($_POST['submit']))
                {
                $search = $_POST['search'];
                $query_search = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $result_search = mysqli_query($connection,$query_search);
                $count = mysqli_num_rows($result_search);
                if($count == 0)
                {
                    echo "<h1>NO RESULT</h1><h3>Sorry we can't find your research try some other keywords !</h3>";
                }
                else {
                ?>

                <!-- First Blog Post -->
                <?php
                while($row_post = mysqli_fetch_assoc($result_search) )
                {
                    $title = $row_post['post_title'];  
                    $author = $row_post['post_author']; 
                    $date = $row_post['post_date']; 
                    $image = $row_post['post_image']; 
                    $content = substr($row_post['post_content'],0,270); 
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
                <?php  }}};?>
            </div>
         
            <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php"; ?>
       </div>
        <!-- /.row -->
        <hr>
<?php require "includes/footer.php"; ?>
        