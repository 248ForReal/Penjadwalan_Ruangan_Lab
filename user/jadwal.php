<?php
include_once('../function/db_func.php');
?>
<body>
    <div class="wrapper">
        <div class="main-content">
        <div class="card-header text-white bg-dark m-3">
        <i class="fa-sharp fa-solid fa-list"></i>
            JADWAL PEMAKAIAN LAB KOMPUTER GEDUNG U
        </div>
        <div class="card-body m-3">
            <form action="" method="get">
            <div class="input-group">
                    <label class="input-group-text" for="inputGroupSelect01"><i class="fa-sharp fa-solid fa-magnifying-glass m-2"></i> Hari</label>
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
                            <button class="btn btn-info" type="submit" id="button-addon2">Pilih</button>                    </div>
                </div>
            </form>
                <div class="card-body m-3">
                <table class="table table-bordered table-hover bg-white">
                        <br>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>HARI</th>
                            <th>JAM</th>
                            <th>KELAS</th>
                            <th>RUANGAN</th>

                        </tr>
                        </thead>
                        <?php


                        if (isset($_GET['hari'])) {
                            $a = $_SESSION['kelas'];
                            $hari=trim($_GET['hari']);
                            $sql="SELECT * FROM tblreq 
                            LEFT JOIN tblkelas on
                            id_kelas = kelas
                            LEFT JOIN tblruangan on 
                            id_ruangan = ruangan 
                            LEFT JOIN tblhari on 
                            id_hari = hari
                            LEFT JOIN waktu on 
                            id_waktu = jam
                            where hari='$hari' and kelas ='$a' and proses = 'diterima' order by kelas asc";
                        }else {
                            $sql="SELECT * FROM tblreq 
                            LEFT JOIN tblkelas on
                            id_kelas = kelas
                            LEFT JOIN tblruangan on 
                            id_ruangan = ruangan 
                            LEFT JOIN tblhari on 
                            id_hari = hari
                            LEFT JOIN waktu on 
                            id_waktu = jam
                            where proses = 'diterima' order by hari asc";
                        }


                        $hasil=mysqli_query($kon,$sql);
                        $no=0;
                        while ($data = mysqli_fetch_array($hasil)) {
                            $no++;

                            ?>
                            <tbody>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $data["nama_hari"]; ?></td>
                                <td><?php echo $data["waktu"];   ?></td>
                                <td><?php echo $data["nama_kelas"];   ?></td>
                                <td><?php echo $data["nama_ruangan"];   ?></td>
                            </tr>
                            </tbody>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                    


                </div>
                
           </div>
           

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
