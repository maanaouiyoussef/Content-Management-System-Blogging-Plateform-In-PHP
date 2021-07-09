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
                    </div>
                </div>
                
                
                <!-- INSERT ADD CATEGORIE -->
                
                
                <div class="col-xs-6">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        
                      <div class="form-group">
                        <label for="chose">ADD SOME CATEGORIES:</label><br>
                        <input type="text" name="cat_added" id="chose" class="form-control">
                              
                    <?php insert_categories(); ?> 
                 
                     </div>
                      <div class="form-groupe">
                        <input style="font-weight:520;" name="valider" type="submit" class="btn btn-primary" value="Add Categorie">
                        </div>
                    </form><br>
                    
                    
                    
                     <!-- UPDATE CATEGORIE -->
                       <?php
                    if(isset($_GET['edit']))
                    {
                        $cat_id = $_GET['edit'];
                        include "includes/edit_categories.php";
                    }    
                    ?>
            
                </div>
                
                
                
                <!--SELECT CATEGORIES IN THE table-->
                <div class="col-xs-6">
                  <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Categorie Title</th>
                        </tr>
                    </thead>  
                      <tbody>   
                  <?php Select_categories() ?>
                     
       <?php           /*DELETE CATEGORIE */
    
                          Delete_categories();                ?>      
                
                    </tbody>
                  </table>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
   <?php include "includes/admin_footer.php";?>