      <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>In response to</th>
                            <th>Date</th>
                            <th>Approve</th>
                            <th>Unapprove</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                        $query_select_comment = "SELECT * FROM comments ";
                        $result_select_comment = mysqli_query($connection,$query_select_comment);
                        while($comment = mysqli_fetch_assoc($result_select_comment))
                        {
                            $comment_id =  $comment['comment_id'];
                            $comment_post_id =  $comment['comment_post_id'];
                            $comment_author =  $comment['comment_author'];
                            $comment_email =  $comment['comment_email'];
                            $comment_content =  $comment['comment_content'];
                            $comment_status =  $comment['comment_status'];
                            $comment_date =  $comment['comment_date'];
                            echo "<tr>";
                            echo "<td>{$comment_id}</td>";
                            echo "<td>{$comment_author}</td>";
                            echo "<td>{$comment_content}</td>";
                             echo "<td>{$comment_email}</td>";
                            echo "<td>{$comment_status}</td>";
                            
                            $query_t = "SELECT * FROM posts WHERE post_id=$comment_post_id";
                            $result_t = mysqli_query($connection,$query_t);
                               while($row=mysqli_fetch_assoc($result_t))
                                {
                                     $post_t = $row['post_title'];
                                }
                            
                            echo "<td><a href='../post.php?p_id=$comment_post_id' >$post_t</a></td>";
                            echo "<td></td>";
                            echo "<td>{$comment_date}</td>";
                            echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                            echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                            echo "<td><a onClick=\"javascript: return confirm('Are you sure want to delete this comment ?');\" href='comments.php?delete_c=$comment_id'>Delete</a></td>";
                            echo "</tr>";
                        }
                        
                        DeleteComment();
                         Approve_comment();
                         Unapprove_comment();
                    
                        ?>
                    </tbody>
                </table>