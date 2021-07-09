    <?php 
      if(isset($_POST['submit']))
      {
          if(isset($_POST['checkBoxesArray']))
          {
               $arrayIDS = $_POST['checkBoxesArray'];
               $bulk_option = $_POST['bulk_option'];
              foreach($arrayIDS as $IdPost)
              {
                  switch($bulk_option)
                 {
                   case 'published';
                   $query_update_status = "UPDATE posts SET post_status='{$bulk_option}'   WHERE post_id='{$IdPost}'";
                   $connection_query = mysqli_query($connection,$query_update_status);
                   break;
                   case 'drafted';
                   $query_update_status = "UPDATE posts SET post_status='{$bulk_option}'   WHERE post_id='{$IdPost}'";
                    $connection_query = mysqli_query($connection,$query_update_status);
                    break;
              
                   case 'delete';
                   $query_DELETE_status = "DELETE FROM posts WHERE post_id='{$IdPost}'";
                    $DELETE_query = mysqli_query($connection,$query_DELETE_status);
                    break;
                          
                      default:
                    $query = "SELECT * FROM posts WHERE post_id = {$IdPost} ";
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
            }
                $query2 = "INSERT INTO posts(post_category_id,post_title,post_author,post_image,post_content,post_tags,post_comments_count,post_status)
           VALUES ('{$post_category}','{$post_title}','{$post_author}','{$post_image}','{$post_content}','{$post_tags}','{$post_comments_count}','{$post_status}')";
           $result2 = mysqli_query($connection,$query2);           
                   break;      
                 }
             
              }
          }
          
      }

    ?>  
    <form action='' method="post">
       <table class="table table-bordered table-hover">
            <div id="bulkOptionContainer" class="col-xs-4">
                <select class="form-control" name="bulk_option" id="">
                    <option  value="">Select Option</option>
                    <option value="published" >Publish</option>
                    <option value="drafted">Draft</option>
                    <option value="delete">Delete</option>
                    <option value="clone">Clone</option>
                </select>
            </div>       
            
            <div class="col-xs-4">
                <input type="submit" class="btn btn-success" value="Apply" name="submit">   
                <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
            </div>
                    <br><br><thead>
                        <tr>
                           <th>
                        <input id="selectAllBoxes" type="checkbox">
                           </th>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Statuts</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>CMT</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                        
                        if(isset($_GET['post_comment']))
                        {
                            $post_id =$_GET['post_comment'];
                     
                        $query_select_post = "SELECT * FROM posts ";
                        $result_select_post = mysqli_query($connection,$query_select_post);
                        while($post = mysqli_fetch_assoc($result_select_post))
                        {
                            $post_Id =  $post['post_id'];
                            $post_title =  $post['post_title'];
                            $post_author =  $post['post_author'];
                            $post_date =  $post['post_date'];
                            $post_image =  $post['post_image'];
                            $post_tags =  $post['post_tags'];
                            $post_comments_count =  $post['post_comments_count'];
                            $post_status =  $post['post_status'];
                            $post_category_id =  $post['post_category_id'];
                            $post_views = $post['post_views_count'];
                            echo "<tr>";
                            echo "<td> <input class='checkBoxes' type='checkbox'
                            name='checkBoxesArray[]' value='{$post_Id}'></td>";
                            echo "<td>{$post_Id}</td>";
                            echo "<td>{$post_author}</td>";
                            
                            echo "<td><a href='../post.php?p_id=$post_Id'>{$post_title}</a></td>";
        
            $query_cate = "SELECT * FROM categories WHERE cat_id=$post_category_id ";//$connection->prepare($query);$sql->execute();
           $result_cate = mysqli_query($connection,$query_cate);
           while($row = mysqli_fetch_assoc($result_cate))//$row = $sql->fetchALL(PDO::FETCH_ALL);rowCount();  
           {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];
            }
           $query222 = "SELECT * FROM comments WHERE comment_post_id={$post_id}";
                  $query222 = "SELECT * FROM posts ";
                        $result222 = mysqli_query($connection,$query222);
                            
                    while($roww = mysqli_fetch_assoc($result222))
                    {
                        $comment = $roww['comment_content'];
                    }
               
                            echo "<td>{$cat_title}</td>";
                            echo "<td>{$post_status}</td>";
                            echo "<td><img width='80' src='../images/{$post_image}' class='img_responsive' alt='images'></td>";
                            echo "<td>{$post_tags}</td>";
                            echo "<td>{$comment}</td>";
                            echo "<td>{$post_date}</td>";
          
                        }   }
                       
                        ?>
                    </tbody>
                </table>