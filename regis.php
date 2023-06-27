<?php
require("function/db_func.php");
$sukses = '';
if(isset($_POST['regis'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$nim = $_POST['nim'];
    $fullname = $_POST['fullname'];
    $level = $_POST['level'];
	$kelas = $_POST['kelas'];
	$sql= $konn->query("SELECT * FROM user WHERE kelas = '$kelas'");
    $row = $sql->fetch_assoc();
	if($sql->num_rows > 0){
		header('location:regis.php?error');
		
	} else{
		$sql = "INSERT into user(username,password,nim,fullname,kelas,id_level) values ('$user','$pass','$nim','$fullname','$kelas','$level')";
        $q1 = mysqli_query($konn, $sql);
        if ($q1) {
            $sukses = "Berhasil Registrasi";
        } else {
            $error  = "Gagal Merequest";
        }
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>REGISTRASI</title>
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

	<link rel="stylesheet" type="text/css" href="csslogin/loginn.css">
</head>
<body>
	<div class="wrapper">
        <div class="filter">
		<div class="box-login">
				<div class="login-title">
					<h3>Registrasi</h3>
				
				</div>
				<form method="post" class="input-login">
				<?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:3;url=index.php");
                }
                ?>
				<?php
				if(isset($_GET['error'])){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <div>
                        <i class="fa-sharp fa-solid fa-skull-crossbones"></i>
                            Kelas Kamu Sudah Memiliki Akun
                        </div>
                    </div>
                    <?php
                    header("refresh:3;url=regis.php");
                }
				?>
					<label for="nim">Nomor Induk Mahasiswa (NIM)</label>
					<input type="text" name="nim" id="nim" required class="input-field">
					<label for="fullname">Nama Lengkap</label>
					<input type="text" name="fullname" id="fullname" required class="input-field">
					<label for="kelas">Kelas</label>
                    <select class="form-select" id="kelas" name="kelas">
                        <?php
                            //Membuat koneksi ke database akademik
                            $kon = mysqli_connect("localhost",'root',"","manajemen_lab");
                            if (!$kon){
                                die("Koneksi database gagal:".mysqli_connect_error());
                            }
                                
                            //Perintah sql untuk menampilkan semua data pada tabel jurusan
                                $sql="select * from tblkelas";

                                $hasil=mysqli_query($kon,$sql);
                                $no=0;
                                while ($data = mysqli_fetch_array($hasil)) {
                                $no++;
                                $ket="";
                                        if (isset($_GET['kelas'])) {
                                            $kelas = trim($_GET['kelas']);

                                            if ($kelas==$data['id_kelas'])
                                            {
                                                $ket="selected";
                                            }
                                        }
                                        ?>
                                <option value="<?php echo $data['id_kelas'];?>"><?php echo $data['nama_kelas'];?></option>
                            <?php 
                                }
                            ?>
                    </select><br>
					<label for="username">Username</label>
					<input type="text" name="user" id="username" required class="input-field">
					<label for="password">Password</label>
					<input type="password" name="pass" id="password" required class="input-field">
					<input type="hidden" name="level" id="password" value="2">
					
					<div class="btn-click">
						<button type="submit" class="btn subt" name="regis"> <i class="fa-solid fa-address-card"></i> Regist</button>

						<a href="index.php" class="btn back"><i class="fa-solid fa-backward-step"></i> Kembali</a>
					</div>			
				</form>
			</div>
		</div>
        </div>

</body>
</html>