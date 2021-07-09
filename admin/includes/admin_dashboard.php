                 <!-- /.row -->         
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                  
                    $query = "SELECT * FROM posts";
                    $result = mysqli_query($connection,$query);
                    $post_count = mysqli_num_rows($result);
                    
                    ?>
                    
                  <div class='huge'><?php echo $post_count ; ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                  
                    $query = "SELECT * FROM comments ";
                    $result = mysqli_query($connection,$query);
                    $comment_count = mysqli_num_rows($result);
                    
                    ?>
                    
                     <div class='huge'><?php echo $comment_count; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                      <?php 
                  
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($connection,$query);
                    $user_count = mysqli_num_rows($result);
                    
                    ?>
                    <div class='huge'><?php echo $user_count; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <?php 
                  
                    $query = "SELECT * FROM categories";
                    $result = mysqli_query($connection,$query);
                    $categorie_count = mysqli_num_rows($result);
                    
                    ?>
                    <div class='huge'><?php echo $categorie_count; ?></div>
                           <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
               <?php 
                  
            $query_pending = "SELECT * FROM comments WHERE comment_status='Pending...'";
            $pending_result = mysqli_query($connection,$query_pending);
            $pending_comment_count = mysqli_num_rows($pending_result);

            $query_unaproved = "SELECT * FROM comments WHERE comment_status='Unapproved'";
            $unaproved_result = mysqli_query($connection,$query_unaproved);
            $unapproved_comment_count = mysqli_num_rows($unaproved_result);
                    
            $query_drafted = "SELECT * FROM posts WHERE post_status='drafted'";
            $drafted_result = mysqli_query($connection, $query_drafted );
            $drafted_post_count = mysqli_num_rows($drafted_result);        
               
            $query_role = "SELECT * FROM users WHERE user_role='Subscriber'";
            $result_role = mysqli_query($connection,$query_role);
            $subscriber_count = mysqli_num_rows($result_role);   
               

               ?>
                <!-- /.row -->
                
              <div class="row">
                  
                  <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            <?php
            $array_data = array('All Posts'=>$post_count,'Drafted Posts'=>$drafted_post_count,'Comments'=>$comment_count,'Pending Comments'=>$pending_comment_count,'Unaproved comments'=>$unapproved_comment_count,'users'=>$user_count,'Subscribers'=>$subscriber_count,'categories'=>$categorie_count);
            foreach($array_data as $key=>$value)
            {
                echo "['$key', $value,],";
            }
            
            
            ?>
       //   ['Posts', 1000,],

        ]);

        var options = {
          chart: {
            title: 'Statistics',
            subtitle: 'Cms chart',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
                  
               <div id="columnchart_material" style="width: auto; height: 500px;"></div>     
               
              </div>             
              
           
            
           
          
         
        
       
      
     
    
   
  