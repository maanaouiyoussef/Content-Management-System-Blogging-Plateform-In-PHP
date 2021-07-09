<?php include "db.php" ; 
      session_start();
    
if(isset($_POST['login']))
{
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection,$username);
    $password = trim($password);
    if(empty($password) || empty($username))
    {
        header("location: ../index.php");
    }
    else
    {
    
    $QUERYy = "SELECT * FROM users WHERE username='$username' ";
    $RESULTy = mysqli_query($connection,$QUERYy);
    while($row = mysqli_fetch_assoc($RESULTy))
    {
      $db_firstname = $row['user_firstname'];
      $db_secondname = $row['user_secondname']; 
      $db_password = $row['user_password']; 
      $db_username = $row['username'];
      $db_role = $row['user_role'];
    }
        /*
        $password = crypt($password,$db_password); convert the password in the password in the database if it is true !!!!!! */ 
   //  $password == $db_password && $db_username == $username
    
        if(password_verify($password,$db_password) && $db_role == 'Admin')
    {
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['secondname'] = $db_secondname;
        $_SESSION['role'] = $db_role;
        $_SESSION['password'] = $password;
        header("location: ../admin");
    }
    elseif($db_role == 'Subscriber'){
        $_SESSION['username'] = $db_username;
        $_SESSION['role'] = $db_role;
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_firstname;
        header("location: ../index.php");
    }
        else{
             header("location: ../index.php");
        }
     
    }
    
}

?>



