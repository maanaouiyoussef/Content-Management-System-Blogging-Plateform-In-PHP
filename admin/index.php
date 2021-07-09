<?php require "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
      <?php include "includes/admin_navigation.php"; ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

               
               <?php
               if(isset($_SESSION['role']) && $_SESSION['role']=='Subscriber')
               {
                   header("location: ../index.php");
               }
               
               
               ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the admin area
                            <small><?php echo $_SESSION['firstname']." ".$_SESSION['secondname']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
    
                  <?php require "includes/admin_dashboard.php"; ?> 
                   
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
   <?php include "includes/admin_footer.php";?>