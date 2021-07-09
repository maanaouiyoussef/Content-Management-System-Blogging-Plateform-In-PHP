<?php 

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $rst = mysqli_query($connection,$query);
    while($user=mysqli_fetch_assoc($rst))    
    {
            $u_id = $user['user_id'];
            $username =  $user['username'];
            $user_firstname =  $user['user_firstname'];
            $user_secondname =  $user['user_secondname'];
            $user_email =  $user['user_email'];
            $user_password = $user['user_password'];
            $role = $user['user_role'];
?>

<?php 

    if(isset($_POST['Edit_user']))
    {
         $firstname      = $_POST['user_firstname'];
            $secondname        = $_POST['user_secondname'];
            $Username      = $_POST['username'];
             
       //     $post_image        = $_FILES['image']['name'];
         //   $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $email         = $_POST['user_email'];
            $password     = $_POST['user_password'];
     
     
     $query = "UPDATE users SET ";
     $query .= "username = '{$Username}',";
     $query .= "user_password = '{$password}',";
     $query .= "user_firstname = '{$firstname}',";
     $query .= "user_secondname = '{$secondname}',";
     $query .= "user_email = '{$email}' ";
     $query .= "WHERE user_id=$u_id";
     $result = mysqli_query($connection,$query);
     header("location: profile.php");
    }

?>

<!DOCTYPE html>
<html>
<body>
<form action="" method="post" enctype="multipart/form-data">   
   <div class="form-groupe">
       <label for="title" >First Name</label>
       <input value='<?php echo $user_firstname ; ?>' type="text" name="user_firstname" class="form-control"><br>  
   </div>
   <div class="form-groupe">
       <label for="title" >Last Name</label>
       <input  
              value="<?php echo $user_secondname ; ?>"  type="text" name="user_secondname" class="form-control"><br>  
   </div>
   <div class="form-group">
   <label for="title" >Profile Role</label>
   <select class="form-control" name='user_role'>
      <option value='<?php echo $role; ?>'><?php echo $role; ?></option>
      <?php 
      if($role == 'Admin')
      {
          echo "<option value='Subscriber'>Subscriber</option>";
      }
      else{
          echo "<option value='Admin'>Admin</option>";
      }
      ?>
   </select><br>
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
       <input type="password" value="<?php echo $user_password ; ?>" name="user_password" class="form-control">
   </div><br>

   <input type="submit" class="btn btn-primary" value="Edit Profile" name="Edit_user">
</form>
</body>
</html>

<?php }} ?>






