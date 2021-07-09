<div class="fixed col-md-4" >
               <div style='position:fixed;width:25%;'>
                   
             
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- search form -->
                    <!-- /.input-group -->
                </div>
                
                       
                       
                <?php
         if(!isset($_SESSION['username']))
         {
            ?>       
                       
                        <!-- LOGIN -->
                        
              <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-groupe">
                        <input placeholder="Username" type="text" class="form-control" name="username">
                    </div><br>
                    <div class="input-group">
                        <input name="password" placeholder="Password" type="password" class="form-control">
                        <span class="input-group-btn">
                            <input class="btn btn-primary" value="Submit" name="login" type="submit">
                        </span>
                        
                    </div>
                  </form><br>
                  <p>If you haven't an account <a href='./registration.php'>Sign Up</a> for free</p>
                </div>
             <?php } ?>
       
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
               <?php 
$query = "SELECT * FROM categories ";//$connection->prepare($query);$sql->execute();
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($result))//$row = $sql->fetchALL(PDO::FETCH_ALL);rowCount();  
{
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];
                    ?>
<li><a href="./category.php?c_id=<?php echo $cat_id;?>"><?php echo $cat_title; ?></a></li>                    
     
<?php    } ?>         
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
             
             
                  <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
</div>
     