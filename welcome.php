<?php
   include('session.php');
?>
<html>
   <head>
      <title>Profile</title>

      <!--ESTILOS-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="styles.css">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   </head>
   
   <body>
      <h1 style="color: white;">Welcome
         <i>
            <h2>
               <?php 
                  while ($row = $ses_sql->fetch()) {
                     echo $row['user']."<br>";
                     echo $row['password']."<br>";
                     $comando = 'console.log('. json_encode($row['user']) .');';
                     echo '<script>'. $comando . '</script>';
                  }
               ?>
            </h2>
         </i>
      </h1> 
      <h2><a href = "logout.php" style="color: red;">Sign Out</a></h2>
   </body>
   
</html>