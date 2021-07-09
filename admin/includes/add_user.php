 <?php
  
  if(isset($_POST['Create_user'])) {
   
      
            $user_firstname       = $_POST['user_firstname'];
            $user_secondname        = $_POST['user_secondname'];
            $user_role  = $_POST['user_role'];
            $username      = $_POST['username'];
             
       //     $post_image        = $_FILES['image']['name'];
         //   $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $user_email         = $_POST['user_email'];
            $user_password     = $_POST['user_password'];
    
    $user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
          ///  $post_comment_count = 0;
     
      //!!!!!!!!We move the image to the images folder in order to select it in the index.php cms principale code!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //  move_uploaded_file($post_image_temp,"../images/$post_image");
      
     if( (!$user_firstname) || (!$user_secondname) || (!$user_role) || (!$username) || (!$user_email) || (!$user_password))
        {
           echo "<p style=\"color:red;\">Error : Some field is empty please check that you filled out all the fields !<p>";
        }
     
      else
      {
           $query = "INSERT INTO users(username,user_password,user_firstname,user_secondname,user_email,user_role)
           VALUES ('{$username}','{$user_password}','{$user_firstname}','{$user_secondname}','{$user_email}','{$user_role}')";
           $result = mysqli_query($connection,$query);
           VerifieQuery($result);
          echo "<p style='color: green;'>User created succefully</p>". " "."<a href='./users.php'>View More Users</a><br>";
     
      }
      
     
  
  }

?>

<!DOCTYPE html>

<html>
<body>
<form autocomplete="off" action="" method="post" enctype="multipart/form-data">   
  <br> <div class="form-groupe">
       <label for="title" >First Name</label>
       <input type="text" name="user_firstname" class="form-control"><br>  
   </div>
   <div class="form-groupe">
       <label for="title" >Last Name</label>
       <input type="text" name="user_secondname" class="form-control"><br>  
   </div>
   <div class="form-groupe">
       
       <label for='user'>User Role</label>
       <select name='user_role' class="form-control">           
           <option value='Subscriber'>Select Option</option>
           <option value='Subscriber'>Subscriber</option>
           <option value='Admin'>Admin</option>   
       </select>
    
   </div><br>
    <div class="form-groupe">
       <label for="title" >Username</label>
       <input placeholder='Username must not have an space between his characters' type="text" name="username" class="form-control"><br>  
   </div>
   <div class="form-groupe">
       <label for="title" >Email</label>
       <input type="email" name="user_email" class="form-control"><br>  
   </div>
   <div class="form-groupe">
       <label for="title" >Password</label><br>
       <input type="password" name="user_password" class="form-control">
   </div><br>

   <input type="submit" class="btn btn-primary" value="Add user" name="Create_user">
</form>
</body>
</html>