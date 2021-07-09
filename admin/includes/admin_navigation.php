  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MedHost Admin</a>
            </div>
      
      
            <!-- Top Menu Items -->
            <?php
            if(isset($_SESSION['username']))
            {
                $first = $_SESSION['firstname'];
                $second = $_SESSION['secondname'];
            }
           if(isset($_GET['source']))
           {
               $action = "active_link";
           }
      else{
          $action = "";
      }
         
           ?>        
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo ucfirst($first." ".$second); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
      
      
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            
            <?php 
            
            
          /*  $pageName = basename($_SERVER['PHP_SELF']);
            $arrayPages = array('index.php','posts.php','posts.php?source=add_post','categories.php','comments.php','users.php','users.php?source=add_user','profile.php');
      $class='';
      
         foreach($arrayPages as $page)
         {
             if($pageName == $page)
             {
                 $class = 'active';
             }
             
         }
      */
      
         
            ?>
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li  class="<?php echo $class; ?>">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                     <li class="action-link">
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li class="<?php echo $class; ?>" >
                                <a href="./posts.php">View Posts</a>
                            </li>
                            <li class="<?php echo $class; ?>">
                                <a class='active' href="./posts.php?source=add_post">Add posts</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo $class; ?>">
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i>Categories</a>
                    </li>
                   
                    <li  class="" >
                        <a class="<?php echo $class; ?>" href="./comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    <li  class="action-link">
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Users<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                            <li class="">
                                <a href="./users.php">View All Users</a>
                            </li>
                            <li class="">
                                <a href="./users.php?source=add_user">Add Users</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo $class; ?>">
                        <a href="./profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
      
            <!-- /.navbar-collapse -->
        </nav>
        
        