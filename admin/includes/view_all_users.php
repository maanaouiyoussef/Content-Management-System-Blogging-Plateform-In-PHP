      <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Firstname</th>
                            <th>Secondname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Change to admin</th>
                            <th>Change to subscriber</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                        $query_select_user = "SELECT * FROM users ";
                        $result_select_user = mysqli_query($connection,$query_select_user);
                        while($user = mysqli_fetch_assoc($result_select_user))
                        {
                            $user_id =  $user['user_id'];
                            $username =  $user['username'];
                            $user_firstname =  $user['user_firstname'];
                            $user_secondname =  $user['user_secondname'];
                            $user_email =  $user['user_email'];
                            $user_image= $user['user_image'];
                            $user_role =  $user['user_role'];
                            echo "<tr>";
                            echo "<td>{$user_id}</td>";
                            echo "<td>{$username}</td>";
                            
      /*      $query_cate = "SELECT * FROM categories WHERE cat_id=$post_category_id ";//$connection->prepare($query);$sql->execute();
           $result_cate = mysqli_query($connection,$query_cate);
           while($row = mysqli_fetch_assoc($result_cate))//$row = $sql->fetchALL(PDO::FETCH_ALL);rowCount();  
           {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];
                 
           }*/
                            echo "<td>{$user_firstname}</td>";
                            echo "<td>{$user_secondname}</td>";
                            echo "<td>{$user_email}</td>";
                            echo "<td>{$user_role}</td>";
                             echo "<td><a href='./users.php?admin=$user_id'>Admin</a></td>";
                            echo "<td><a href='./users.php?subscriber=$user_id'>Subscriber</a></td>";
                            echo "<td><a href='./users.php?edit_u=$user_id&source=edit_user'>Edit</a></td>";
                            echo "<td><a onClick=\"javascript: return confirm('Are you sure want to delete that user ?');\" href='./users.php?delete_u=$user_id'>Delete</a></td>";
                            echo "</tr>";
                           
                        }
                        //DELETE THE USER IF WE WANT
                        
                       
                           DeleteUser();
                    
                            ChangeToAdmin();
                       
                            ChangeToSubscriber();
                        
                        
                        ?>
                    </tbody>
                </table>