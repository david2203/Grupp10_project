<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
    <script src="../JavaScript/Js.js" defer></script>

    
</head>
<body>

<header id="header">

    <div id="header-name">
      <h1>Millhouse</h1>  

      <div class="container test">
        
        
        <div id="nav-bar">
          <ul>
            <a class="nav-bar-b" href="javascript:void(0);" class="icon">
              <i class="fa fa-bars"></i>
            </a>
          </ul>
            <div class="container hidden">

              <ul>
                <a class="nav-bar-a" href="../views/homepage.php">Start</a>
                <a class="nav-bar-a" href="../views/login.php">Login</a>
                <a class="nav-bar-a" href="../views/viewPosts.php">Posts</a>
              </ul>
            </div>

        </div> <!-- #nav-bar -->      
      </div> <!-- .container -->
    </div> <!-- #header-name -->
     
</header>


<?php
session_start();

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
  echo '<h1>Welcome '.$_SESSION['sess_user_name'].'</h1>';

  if(isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin") {
    echo "Du är inloggad som <b>Admin</b><br />";

    echo 'Do you want to publish something? <a href="posts.php">Click here!</a> <br>';
  }
    echo 'Do you want to see all existing posts? <a href="viewPosts.php">Click here!</a>';
        


  echo '<h4><a href="../includes/handleLogout.php">Logout</a></h4>';
} else { 
  echo "Vänligen logga in igen <a href='login.php'>login</a>";
}
?>
   


   <footer id="footer">
     <div id="footer-container">

       <div class="info-company">

         <section class="about-us">
           <h3 id="footer-headline">About us</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
         </section>

         
         <section class="contact">
           <h3 id="footer-headline">Contact</h3> 
           <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
         </section>

         <section class="social-media">
           <h3 id="footer-headline">Follow us</h3>
          <i class="fab fa-instagram-square"></i>
           <i class="fab fa-facebook"></i>
           <i class="fab fa-twitter"></i>
           <i class="fab fa-youtube"></i>
           <i class="fab fa-linkedin"></i>
         </section>



       </div>
     </div>


  </footer>


</body>
</html>