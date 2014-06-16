<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>Facebook - Login W/ AJAX</title>
          <link rel="stylesheet" href="assets/css/style.css"/>
    </head>
     <body>
        <div class="container">

            <h1><a href="">Facebook - Login W/ AJAX</a></h1>
            
        <?php
        if ( isset($_SESSION['fb-user']) ) {
            $user = $_SESSION['fb-user'];
        ?>
            <div>
               <p>Hey, Good to see you <a href="<?php echo $user['link'] ?>"><?php echo $user['first_name']; ?></a>!</p>
            </div> 
        <?php
            } else {
        ?>
            <div>
               <p>Hey there, Login with your Facebook</p>
            </div>
            <a class="fsl fsl-facebook" href="#" id="login">
               <span class="fa-facebook fa-icons fa-lg"></span>
               <span class="sc-label">Login W/ Facebook</span>
            </a>    

        <?php  
        }
        ?>              
        </div>
         <div id="fb-root"></div>
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
         <script src="assets/js/script.js"></script>
    </body>
</html>