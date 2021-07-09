<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
  <?php  include "admin/functions.php"; ?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1><strong>Contact</strong></h1>
                   
                   <?php 
                  
                    
                    ////// §§§§§§ SMTP ISSUE  §§§§§ ///////
                    
                   if(isset($_POST['submit']))
                   {
                       $message = $_POST['text'];
                       $subject = wordwrap($_POST['subject'],70);
                       $to_me = "sefrou1516@gmail.com";
                       $header = "From: ".$_POST['email'];
                      
                       if(empty($subject || $message || $header))
                       {
                           echo "<p style=\"color:red;\">Error : Some field is empty please check that you filled out all the fields !<p>";
                       }
                       else{
                           mail($to_me,$subject,$message,$header);
                       }
                   }
        
                  
                   ?>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your registration email">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                        </div>
                         <div class="form-group">
                          <label for="subject" class="sr-only">Type your Idea</label>
                           <textarea placeholder='Type your suggetion' name='text' rows='5' cols='65'> Type something...
                           </textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
