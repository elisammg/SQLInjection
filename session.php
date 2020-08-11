<?php
   include('connection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = $conn->query("SELECT * FROM usuarios WHERE user = '$user_check' ");
   
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>