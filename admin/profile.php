<?php require "includes/admin_header.php"; ?>
<?php include "functions.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
      <?php include "includes/admin_navigation.php"; ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the admin area
                            <small><?php echo $_SESSION['firstname']." ".$_SESSION['secondname']; ?></small>
                        </h1>
                  
                        <?php include "includes/add_profile.php"; ?>
                 
                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
   <?php include "includes/admin_footer.php";?>