<?php
require("function/db_func.php");
if(isset($_POST['login'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$sql= $konn->query("SELECT * FROM user WHERE username = '$user'and password = '$pass'");
    $row = $sql->fetch_assoc();
	if($sql->num_rows > 0){
		session_start();
		$_SESSION['login'] = $user;
        $_SESSION['fullname'] = $row['fullname'];
		$_SESSION['kelas'] = $row['kelas'];
		$_SESSION['nim'] = $row['nim'];
		if($row['id_level'] == 1){
			header('location:admin/dashboard.php');
		} else if ($row['id_level'] == 2){
			header('location:user/dashboard.php');
		}
		
	} else{
		header('location:index.php?error');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="csslogin/loginn.css">
</head>


<body>

	
	<div class="wrapper">
	
		
		<div class="filter">
			
		
		
		<div class="box-login">
				<div class="login-title">
					<h1 style=" color: #4f4f4f; ">Jadwal Lab</h1>
					<h3>Login</h3>
					<p style="color: #ef8521">Tahun Ajaran 2022/2023</p>
				</div>
				<form method="post" class="input-login">
				<label for="username">Username</label>
					<input type="text" name="user" id="username" required class="input-field" placeholder="masukkan username">
					<label for="password">Password</label>
					<input type ="password" name="pass" id="password" required class="input-field" placeholder="password">
					<input type="checkbox" onclick="myFunction()" title="Show password here">
					<i class="fa-solid fa-eye"></i>
					<script>
                        function myFunction(){
                            var x = document.getElementById("password");
                            if(x.type === "password"){
                                x.type = "text";
                            }
                            else{
                                x.type = "password";
                            }
                        }
                    </script>
					<?php
							if(isset($_GET['error'])){
	  					echo "<p style='color:red; font-size:.8em; margin-top:.5rem'>* Username atau password salah!</p>";
					}
					?>
					<div class="btn-click">

						<button type="submit"  class="btn subt" name="login"><i class="fa-solid fa-right-to-bracket"></i>    Login</button>

						<a href="regis.php" class="btn back"><i class="fa-solid fa-address-card"></i>   Regist</a>
					</div>			
				</form>
			</div>
		</div>
		</div>


</body>
</html>