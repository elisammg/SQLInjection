<?php
   


   include("connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
		$user = $_POST['user'];
		$password = $_POST['password'];
      
		$sql = "SELECT * FROM usuarios WHERE user = '{$user}'";

		/* $result = mysqli_query($db,$sql); */
      	/* $row = mysqli_fetch_array($result); */
		/* var_dump($result); */

		$result = $db->query($sql);
		echo ($sql);
		echo "<br>";
		var_dump(isset($result));
		echo "<br>";
		/* if ($result->num_rows >= 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			echo "id: " . $row["id"]. " - user: " . $row["user"]. " " . $row["password"]. "<br>";
		  }
		} else {
		  echo "0 results";
		} */

		if ($result === TRUE) {
			echo "New record created successfully";
		  } else {
			echo "Error: " . $sql . "<br>" . $db->error;
		  }




		/* if(!$result){
			var_dump(mysqli_error($db));
			exit;
		}
		echo "<br>";
		$count = mysqli_num_rows($result); */
      	// If result matched $user and $password, table row must be 1 row
		/* if($count == 1) {
			$_SESSION['login_user'] = $user;
			
			header("location: welcome.php");
		}else {
			$error = "Your Login Name or Password is invalid";
			echo ($error);
		} */
		//if(isset($result)) {
			/* $_SESSION['login_user'] = $user; */
			/* echo "$sql <br>";
			echo ($row[1]);
			echo "<br>";
			echo ($user); */
			/* echo "<br>";
			echo ($row['password']);
			echo "<br>";
			echo ($password); */
			/* header("location: welcome.php"); */
		/* }else {
			$error = "Your Login Name or Password is invalid";
			echo "<script>alert('$error');</script>"; 
			echo ($error);

			echo "$sql <br>";
			echo ($row['user']);
			echo "<br>";
			echo ($user);
		} */
   }
?>