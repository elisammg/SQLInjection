<?php
   include('connection.php');
   $user = $_POST['user'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM usuarios WHERE user = '$user' and password = '$password'";

   $result = mysqli_query($db,$sql);
   $fila = mysqli_fetch_array($result);
   
    if(isset($fila)){
        echo 'Bienvenido';
    } else {
        echo 'Falló';
    }
?>
<!-- <html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome</h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html> -->