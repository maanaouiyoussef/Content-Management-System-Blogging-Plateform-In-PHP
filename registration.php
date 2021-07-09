<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
  <?php  include "admin/functions.php"; ?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1><strong>Register</strong></h1>
                   
                   <?php 
                   
                   if(isset($_POST['submit']))
                   {
                       $username_registration = $_POST['username'];
                       $email_registration = $_POST['email'];
                       $password_registration = $_POST['password'];
                      
                       if(empty($username_registration || $password_registration || $email_registration))
                       {
                           echo "<p style=\"color:red;\">Error : Some field is empty please check that you filled out all the fields !<p>";
                       }
                       else{
                            $username_registration = mysqli_real_escape_string($connection,$username_registration);
                            $email_registration = mysqli_real_escape_string($connection,$email_registration);
                        $password_registration = trim($password_registration);
                           
                           
 $password = password_hash($password_registration,PASSWORD_BCRYPT,array('cost'=>12));          
                           
/*    hashage    $query = "SELECT randSalt FROM users";
                 $result = mysqli_query($connection,$query);
                 $row = mysqli_fetch_assoc($result);
                 $salt= $row['randSalt'];
                 $password = crypt($password_registration,$salt); */
                           
           $query_add = "INSERT INTO users(username,user_password,user_email)
           VALUES ('{$username_registration}','{$password}','{$email_registration}')";
           $result_add = mysqli_query($connection,$query_add);
           $verification = VerifieQuery($result_add);
           echo "<p style='color: green;'>Signed Up succefully</p>";
                      
                          }
            
                   }
                   
                   ?>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your registration username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your registration email">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Sign Up">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
