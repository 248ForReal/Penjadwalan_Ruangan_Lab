<?php
include_once('../function/db_func.php');
$nim = '';
$nama = '';
$error = '';
$sukses = '';

if(isset($_POST['simpan'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $ruangan = $_POST['ruangan'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $proses = $_POST['aksi'];

    $sql= $konn->query("SELECT * FROM tblreq WHERE ruangan = '$ruangan' and hari = '$hari' and jam = '$jam' and proses ='diterima' ");
    $row = $sql->fetch_assoc();
	if($sql->num_rows > 0){
		header('location:dashboard.php?hal=request&error');	
	} else{
		$sql = "INSERT into tblreq(nim,nama,kelas,ruangan,hari,jam,proses) values ('$nim','$nama','$kelas','$ruangan','$hari','$jam','$proses')";
        $q1 = mysqli_query($konn, $sql);
        if ($q1) {
            $sukses = "Data berhasil di request";
        } else {
            $error  = "Gagal Merequest";
        }
	}
}
?>
<div class="card-header text-white bg-dark m-3">
<i class="fa-sharp fa-solid fa-pen-to-square"></i>
    Request
    </div>
    <div class="card-body m-3">
        <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=dashboard.php?hal=request");
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:2;url=dashboard.php?hal=request");
                }
                ?>
                <?php
				if(isset($_GET['error'])){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <div>
                        <i class="fa-sharp fa-solid fa-skull-crossbones"></i>
                             JADWAL SUDAH ADA !!
                        </div>
                    </div>
                    <?php
                    header("refresh:2;url=dashboard.php?hal=request");
                    }
					?>
        <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control" id="nim" name="nim" value="<?php echo $_SESSION['nim'] ?>" >                        
                    </div>
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control" id="nama" name="nama" value="<?php echo $_SESSION['fullname'] ?>" >                        
                    </div>
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control" id="kelas" name="kelas" value="<?php echo $_SESSION['kelas'] ?>" >
                    </div>          

                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Ruangan</label>
                    <select class="form-select" id="inputGroupSelect01" name="ruangan">
                        <?php
                            //Membuat koneksi ke database akademik
                            $kon = mysqli_connect("localhost",'root',"","manajemen_lab");
                            if (!$kon){
                                die("Koneksi database gagal:".mysqli_connect_error());
                            }
                                
                            //Perintah sql untuk menampilkan semua data pada tabel jurusan
                                $sql="select * from tblruangan";

                                $hasil=mysqli_query($kon,$sql);
                                $no=0;
                                while ($data = mysqli_fetch_array($hasil)) {
                                $no++;
                                $ket="";
                                        if (isset($_GET['ruangan'])) {
                                            $kelas = trim($_GET['ruangan']);

                                            if ($kelas==$data['id_ruangan'])
                                            {
                                                $ket="selected";
                                            }
                                        }
                                        ?>
                                <option value="<?php echo $data['id_ruangan'];?>"><?php echo $data['nama_ruangan'];?></option>
                            <?php 
                                }
                            ?>
                    </select>
                    </div>
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Hari</label>
                    <select class="form-select" id="inputGroupSelect01" name="hari">
                        <?php
                            //Membuat koneksi ke database akademik
                            $kon = mysqli_connect("localhost",'root',"","manajemen_lab");
                            if (!$kon){
                                die("Koneksi database gagal:".mysqli_connect_error());
                            }
                                
                            //Perintah sql untuk menampilkan semua data pada tabel jurusan
                                $sql="select * from tblhari";

                                $hasil=mysqli_query($kon,$sql);
                                $no=0;
                                while ($data = mysqli_fetch_array($hasil)) {
                                $no++;
                                $ket="";
                                        if (isset($_GET['hari'])) {
                                            $kelas = trim($_GET['hari']);

                                            if ($kelas==$data['id_hari'])
                                            {
                                                $ket="selected";
                                            }
                                        }
                                        ?>
                                <option value="<?php echo $data['id_hari'];?>"><?php echo $data['nama_hari'];?></option>
                            <?php 
                                }
                            ?>
                    </select>
                    </div>
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Jam</label>
                    <select class="form-select" id="inputGroupSelect01" name="jam">
                        <?php
                            //Membuat koneksi ke database akademik
                            $kon = mysqli_connect("localhost",'root',"","manajemen_lab");
                            if (!$kon){
                                die("Koneksi database gagal:".mysqli_connect_error());
                            }
                                
                            //Perintah sql untuk menampilkan semua data pada tabel jurusan
                                $sql="select * from waktu";

                                $hasil=mysqli_query($kon,$sql);
                                $no=0;
                                while ($data = mysqli_fetch_array($hasil)) {
                                $no++;
                                $ket="";
                                        if (isset($_GET['jam'])) {
                                            $kelas = trim($_GET['jam']);

                                            if ($kelas==$data['id_waktu'])
                                            {
                                                $ket="selected";
                                            }
                                        }
                                        ?>
                                <option value="<?php echo $data['id_waktu'];?>"><?php echo $data['waktu'];?></option>
                            <?php 
                                }
                            ?>
                    </select>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="aksi" name="aksi" value="diproses">
                        </div>
                    </div>
                    
                    
                    <div class="col-12 justify-content-md-end">
                        <input type="submit" name="simpan" value="simpan" class="btn btn-primary" />
                    </div>
            </form>
    </div>

    <div class="card-header text-white bg-dark m-2">
    <i class="fa-sharp fa-solid fa-inbox"></i>
    History Request Ruangan
            </div>
                <div class="card-body m-2">
                <table class="table" id="daftar-saya">
                    <thead>
                        <tr>
                            
                            <th scope="col">NAMA</th>
                            <th scope="col">HARI</th>
                            <th scope="col">JAM</th>
                            <th scope="col">KELAS</th>
                            <th scope="col">RUANGAN</th>
                            <th scope="col">PROSES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = $_SESSION['fullname'];
                        $sql2   = "SELECT * FROM tblreq 
                        LEFT JOIN tblkelas on
                        id_kelas = kelas
                        LEFT JOIN tblruangan on 
                        id_ruangan = ruangan 
                        LEFT JOIN tblhari on 
                        id_hari = hari
                        LEFT JOIN waktu on 
                        id_waktu = jam
                        where nama = '$a'
                        order by proses asc";
                        $q2     = mysqli_query($konn, $sql2);
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id1         = $r2['id_req'];
                            $nama1       = $r2['nama'];
                            $hari1        = $r2['nama_hari'];
                            $jam1       = $r2['waktu'];
                            $kelas1    = $r2['nama_kelas'];
                            $ruangan1      = $r2['nama_ruangan'];
                            $proses1     = $r2['proses'];

                            if($r2['proses']=='diterima'){
                                echo '<tr class="table-success">';
                            }else if($r2['proses']=='ditolak'){
                                echo '<tr class="table-danger">';
                            }else if($r2['proses']=='diproses'){
                                echo '<tr class="table-info">';
                            }

                        ?>
                                
                                <td scope="row"><?php echo $nama1 ?></td>
                                <td scope="row"><?php echo $hari1 ?></td>
                                <td scope="row"><?php echo $jam1 ?></td>
                                <td scope="row"><?php echo $kelas1 ?></td>
                                <td scope="row"><?php echo $ruangan1 ?></td>
                                <td scope="row"><?php echo $proses1 ?></td>
                                
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
                </div>