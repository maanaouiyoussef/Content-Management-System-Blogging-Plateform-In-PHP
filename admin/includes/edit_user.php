<?php 

if(isset($_GET['edit_u']))
{
    $u_id = $_GET['edit_u'];
    if(isset($_GET['edit_u']))
    {
        $user_id = $_GET['edit_u'];
        $QUERY = "SELECT * FROM users WHERE user_id =$user_id";
        $RESULT = mysqli_query($connection,$QUERY);
        while($user = mysqli_fetch_assoc($RESULT))
        {
            $user_id =  $user['user_id'];
            $username =  $user['username'];
            $user_firstname =  $user['user_firstname'];
            $user_secondname =  $user['user_secondname'];
            $user_email =  $user['user_email'];
            $user_p = $user['user_password'];
            if(password_verify($_SESSION['password'],$user_p))
            {
                $password_access = $_SESSION['password'];
            }
?>
<?php    
    
    } 

 if(isset($_POST['Edit_user']))
 {
     
            $firstname      = $_POST['user_firstname'];
            $secondname        = $_POST['user_secondname'];
            $Username      = $_POST['username'];
             
       //     $post_image        = $_FILES['image']['name'];
         //   $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $email         = $_POST['user_email'];
            $password     = $_POST['user_password'];
            $hashed_pass = password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));
           
     if(empty($firstname || $secondname || $Username || $email || $_POST['user_password']))
     {
        echo "<p style='color:red;'>Error: Some field is empty</p>";
     }
     if(password_verify($password,$user_p))
     {
         $message = "<p style='color:red;'>Password already exists .Please Try a new password !</p>";
     }
     else{
         $query = "UPDATE users SET ";
         $query .= "username = '{$Username}',";
         $query .= "user_password = '{$hashed_pass}',";
         $query .= "user_firstname = '{$firstname}',";
         $query .= "user_secondname = '{$secondname}',";
         $query .= "user_email = '{$email}' ";
         $query .= "WHERE user_id=$u_id";
         $result = mysqli_query($connection,$query);
         echo "<p class='bg-success'>User edited succefully</p>"."<a     href='./users.php'>Edit More Users</a><br>";
         }
         
     }
     
 }


?>


<!DOCTYPE html>
<html>
<body>
<br><form action="" method="post" enctype="multipart/form-data">   
   <div class="form-groupe">
       <label for="title" >First Name</label>
       <input value='<?php echo $user_firstname ; ?>' type="text" name="user_firstname" class="form-control"><br>  
   </div>
   <div class="form-groupe">
       <label for="title" >Last Name</label>
       <input  
              value="<?php echo $user_secondname ; ?>"  type="text" name="user_secondname" class="form-control"><br>  
   </div>
    <div class="form-groupe">
       <label for="title" >Username</label>
       <input placeholder='Username must not have an space between his characters' type="text" value="<?php echo $username ; ?>" name="username" class="form-control"><br>  
   </div>
   <div class="form-groupe">
       <label for="title" >Email</label>
       <input type="email" value="<?php echo $user_email ; ?>" name="user_email" class="form-control"><br>  
   </div>
   
   <div class="form-groupe">
       <label for="title" >Password</label><br>
       <input type="password" value="<?php echo $password_access; ?>" name="user_password" class="form-control">
   </div>
   <?php
   
      if(isset($message))
      {
          echo $message;
      }
   
   
   ?>

 <br>  <input type="submit" class="btn btn-primary" value="Edit user" name="Edit_user">
</form>
</body>
</html>

<?php } ?>
















