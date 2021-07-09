<?php include "db.php" ;?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" ><strong>MedHost</strong></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                           <?php 
                     if(isset($_SESSION['role']))
                     {
                         
$query = "SELECT * FROM categories ";//$connection->prepare($query);$sql->execute();
$result = mysqli_query($connection,$query);
$pageName = basename($_SERVER['PHP_SELF']);   
$class_page = '';
$static_nav = 'contact.php';
    if($pageName == $static_nav)
    {
        $class_page = 'active';
    }
while($row = mysqli_fetch_assoc($result))//$row = $sql->fetchALL(PDO::FETCH_ALL);rowCount();  
{
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];
    $cat_class = '';
    if(isset($_GET['c_id']) && $_GET['c_id'] == $cat_id )
    {
        $cat_class = 'active';
    }
                    ?>
<li class='<?php echo $cat_class; ?>'><a href="./category.php?c_id=<?php echo $cat_id;?>"><?php echo $cat_title; ?></a></li>                    
     
<?php    }
                    
                   
                    {
                        $roel = $_SESSION['role'];
                        if($roel == 'Admin')
                        {
                            echo "<li><a href='admin/index.php'>Admin</a></li>";
                        }
           $first = $_SESSION['firstname'];
           $second = $_SESSION['secondname'];
?>
    <li class='<?php echo $class_page; ?>' ><a href="contact.php">Contact Us</a></li>   
                </ul>
                
                <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo ucfirst($first." ".$second); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                        <li class="divider"></li>
                        <li>
                            <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul> 
            
                       
        <?php }} ?>                          
                   
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>