<?php

function insert_categories()
{
    global $connection;
         if(isset($_POST['valider']))
                {
                    $cat_title_added = $_POST['cat_added'];
                    if(!$cat_title_added)
                    {
                        echo "<p style=\"color:red;\">This field cannot be empty !<p>";
                    }
                    else{
                          $sql = "INSERT INTO categories(cat_title)
                          VALUE ('$cat_title_added')";
                         $sql_result = mysqli_query($connection,$sql);
                         }
                }
    
}

function Select_categories()
{
    global $connection;              
            $query = "SELECT * FROM categories ";//$connection->prepare($query);$sql->execute();
           $result = mysqli_query($connection,$query);
           while($row = mysqli_fetch_assoc($result))//$row = $sql->fetchALL(PDO::FETCH_ALL);rowCount();  
           {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];
                  echo "<tr>";
                  echo "<td>{$cat_id}</td>";
                  echo "<td>{$cat_title}</td>";
                  echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
                  ";
                  echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                  ";
                  echo "</tr>";
           }
}

function Delete_categories()
{
    global $connection;
    if(isset($_GET['delete']))
                    {
                        $id = $_GET['delete'];
                        $query_delete = "DELETE FROM categories WHERE cat_id={$id} ";
                        $result_delete = mysqli_query($connection,$query_delete);
                        header("location: categories.php");
                     }
}
function VerifieQuery($result)
{
    global $connection;
    if(!$result)
    {
        die("QUERY FAILED".mysqli_error($connection));
        
    }
}

function DeletePost()
{
      global $connection;
                        if(isset($_GET['delete']))
                        {
                            $id = ($_GET['delete']);
                            $query_delete = "DELETE FROM posts WHERE post_id={$id} ";
                        $result_delete = mysqli_query($connection,$query_delete);
                        header("location: posts.php");   
                        }
}

function DeleteComment()
{
    global $connection;
                        if(isset($_GET['delete_c']))
                        {
                            $id = $_GET['delete_c'];
                            $comment_delete = "DELETE FROM comments WHERE comment_id=$id ";
                        $result_delete = mysqli_query($connection,$comment_delete);
                         header("location: comments.php");   
                        }
}

function Approve_comment()
{
    global $connection;
    if(isset($_GET['approve']))
    {
        $id_comment_approved = $_GET['approve'];
        $query_approve = "UPDATE comments SET comment_status='Approved' WHERE comment_id='$id_comment_approved'";
        $result_approve = mysqli_query($connection,$query_approve);
        header("location: comments.php");
    } 
}

function Unapprove_comment()
{
    global $connection;
    if(isset($_GET['unapprove']))
    {
        $id_comment_unapproved = $_GET['unapprove'];
        $query_unapprove = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id='$id_comment_unapproved'";
        $result_unapprove = mysqli_query($connection,$query_unapprove);
        header("location: comments.php");
    } 
}

function DeleteUser()
{
    global $connection;
     if(isset($_GET['delete_u']))
    {
                            $id = $_GET['delete_u'];
                            $user_delete = "DELETE FROM users WHERE user_id=$id ";
                        $result_delete = mysqli_query($connection,$user_delete);
                        header("location: users.php");   
     }
}

function ChangeToAdmin()
{
    global $connection;
    if(isset($_GET['admin']))
    {
     $id = $_GET['admin'];
     $set_admin = "UPDATE users SET user_role='Admin' WHERE user_id=$id";
     $set_admin_query = mysqli_query($connection,$set_admin);
     header("location: users.php");
    }
  
}

function ChangeToSubscriber()
{
     global $connection;
    if(isset($_GET['subscriber']))
    {
     $id = $_GET['subscriber'];
     $set_subscriber = "UPDATE users SET user_role='Subscriber' WHERE user_id=$id";
     $set_subscriber_query = mysqli_query($connection,$set_subscriber);
        header("location: users.php");
    }
   

}

function escape($string)
{
    global $connection;
    return mysqli_real_escape_string($connection,trim($string));
}
?>

