 <?php
  
  if(isset($_POST['Create_post'])) {
            
            
            $post_title        = $_POST['title'];
            $post_author         = $_POST['post_user'];
            $post_category_id  = $_POST['post_category'];
            $post_status       = $_POST['post_status'];
    
            $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $post_tags         = $_POST['post_tags'];
            $post_content      = $_POST['post_content'];
          ///  $post_comment_count = 0;
     
      //!!!!!!!!We move the image to the images folder in order to select it in the index.php cms principale code!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      move_uploaded_file($post_image_temp,"../images/$post_image");
      
      if( (!$post_title) || (!$post_author) || (!$post_category_id) || (!$post_status) || (!$post_image) || (!$post_tags) || (!$post_content))
        {
           echo "<p style=\"color:red;\">Error : Some field is empty please check that you filled out all the fields !<p>";
        }
      else
      {
           $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_image,post_content,post_tags,post_status)
           VALUES ('{$post_category_id}','{$post_title}','{$post_author}','{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
           $result = mysqli_query($connection,$query);
           VerifieQuery($result);
          $p_id = mysqli_insert_id($connection);
           echo "<p class='bg-success'>Post added successfuly ! "."<a href='../post.php?p_id={$p_id}'>View Post</a></p>";
     
      }
      
     
  }

?>
<!DOCTYPE html>
<html>
<body>
<form action="" method="post" enctype="multipart/form-data">
   <div class="form-groupe">
      <label for="title" >Post Title</label>   
      <input type="text" name="title" class="form-control"><br>  
   </div>
   <div class="form-groupe">
   <label for="category">
     Edit Category
   </label>
   <select name='post_category' id='category' class="form-control">
      <?php
           
            $query = "SELECT * FROM categories ";//$connection->prepare($query);$sql->execute();
           $result = mysqli_query($connection,$query);
           while($row = mysqli_fetch_assoc($result))//$row = $sql->fetchALL(PDO::FETCH_ALL);rowCount();  
           {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];
                  echo "<option value='$cat_id'>$cat_title</option>";
           }
     ?>
   </select><br>
   </div>
   <div class="form-groupe">
       <label for="title" >Post author</label>
       <select name='post_user' id='category' class="form-control">
       <option value=''>Select User</option>
      <?php
            
            $query_user = "SELECT * FROM users";//$connection->prepare($query);$sql->execute();
           $result_user = mysqli_query($connection,$query_user);
           while($row = mysqli_fetch_assoc($result_user))//$row = $sql->fetchALL(PDO::FETCH_ALL);rowCount();  
           {
                  $username = $row['username'];
                  $user_firstname = $row['user_firstname'];
                  $user_secondname = $row['user_secondname'];
                  $user_id = $row['user_id'];
                  echo "<option value='$user_firstname $user_secondname '>$username</option>";
           }
     ?>
     </select>
   </div><br>
    <div class="form-groupe">
       <label for="title" >Post Status</label>
    <select name='post_status' class="form-control">
        <option value=''>Select option</option>
        <option value='published'>Published</option>
        <option value='drafted' >Drafted</option>
    </select>
   </div><br>
   <div class="form-groupe">
       <label for="post_image" >Post Image</label>
       <input type="file" id="post_image" name="image" class="form-control"><br>  
   </div>
   <div class="form-groupe">
       <label for="title" >Post Tags</label>
       <input type="text" name="post_tags" class="form-control"><br>  
   </div>
   <div class="form-groupe">
       <label for="title" >Post Content</label>
       <textarea type="text" name="post_content" rows="10" cols="30" class="form-control"></textarea><br>  
   </div>

   <input type="submit" class="btn btn-primary" value="Create post" name="Create_post">
</form>
</body>
</html>