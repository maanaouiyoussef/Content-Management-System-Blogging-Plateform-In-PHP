<?php
if(isset($_GET['edit']))
{
    $p_id = $_GET['edit'];
    if(isset($_GET['edit']))
{
        $post_id = $_GET['edit'];
        $query = "SELECT * FROM posts WHERE post_id = $post_id ";
        $select_post_id = mysqli_query($connection,$query);  
            while($post = mysqli_fetch_assoc($select_post_id)) 
            {
                $post_title =  $post['post_title'];
                $post_author =  $post['post_author'];
                $post_date =  $post['post_date'];
                $post_image =  $post['post_image'];
                $post_tags =  $post['post_tags'];
                $post_comments_count =  $post['post_comments_count'];
                $post_status =  $post['post_status'];
                $post_category =  $post['post_category_id'];
                $post_content = $post['post_content'];

?> 

                          
<?php
    
    ///Query UPDATING :
    if(isset($_POST['Edit_post']))
    {
            $post_title        = $_POST['title'];
            $post_author         = $_POST['post_user'];
            $post_category_id  = $_POST['post_category'];
            $post_status       = $_POST['post_status'];
        
        
         //!!!!!!!!We move the image to the images folder in order to select it in the index.php cms principale code!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $post_imagee       = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
            move_uploaded_file($post_image_temp,"../images/$post_imagee");
        
        
            $post_tags         = $_POST['post_tags'];
            $post_content      = $_POST['post_content'];
         if( (!$post_title) || (!$post_author) || (!$post_category_id) || (!$post_status) || (!$post_imagee) || (!$post_tags) || (!$post_content))
        {
           echo "<p style=\"color:red;\">Error : Some field is empty please check that you filled out all the fields !<p>";
        }
         else{
             
              $query_p_update = "UPDATE posts SET
              post_category_id='{$post_category_id}',
              post_title='{$post_title}',
              post_author='{$post_author}',";
              $query_p_update .= "post_image='$post_imagee',";
              $query_p_update .= "
              post_content='{$post_content}',
              post_tags='{$post_tags}',
              post_status= '{$post_status}'
              WHERE post_id = $p_id ";
              $result_p_udpdate = mysqli_query($connection,$query_p_update);
              echo "<p class='bg-success'>Post edited successfuly ! "."<a href='../post.php?p_id={$p_id}'>View Post</a> or <a href='./posts.php'>Edit More Posts</a></p>";
         }  
   }
    ?>
                                                     
<form action="" method="post" enctype="multipart/form-data">
   <div class="form-groupe">
      <label for="title" >Edit Title</label>   
      <input type="text" value='<?php echo $post_title; ?>' name="title" class="form-control"><br>  
   </div>
   <div class="form-groupe">
   <label for="category">
     Edit Category
   </label>
   <select value="<?php echo $post_category; ?>" name='post_category' id='category' class="form-control">
      <?php
       global $connection;              
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
       <label for="title" >Edit author</label>
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
       <label for="title" >Edit Statut</label>
    <select name='post_status' class="form-control">
        <option value='<?php echo $post_status;?>'><?php echo ucfirst($post_status);?></option>
        <?php
                
          if($post_status == 'published')
          {
              echo "<option value='drafted'>Drafted</option>";
          }
          else{
              echo "<option value='published'>Published</option>";
          }
         
        ?>        
    </select>
   </div><br>

    <div class="form-groupe">
        <label for='post_image'>Edit Image ( Please Insert the same post's image shown bellow if you don't wan't to edit it ! )</label>
        <input type="file" id="post_image" name="image" classe='form-control'><br>
       <img width='100' src='../images/<?php echo $post_image ;?>'>  
   </div><br>   
   
   <div class="form-groupe">
       <label for="title" >Edit Tags</label>
       <input type="text" value='<?php echo $post_tags; ?>' name="post_tags" class="form-control"><br>  
   </div>
   <div class="form-groupe">
       <label for="title" >Edit Content</label>
       <textarea type="text" name="post_content" rows="10" cols="30" class="form-control"><?php echo $post_content ; ?></textarea><br>  
   </div>

   <input type="submit" class="btn btn-primary" value="Edit post" name="Edit_post">
</form>
<?php }} ?>

    
 <?php   
} 
?>

