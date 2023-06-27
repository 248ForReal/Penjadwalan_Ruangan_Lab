<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "manajemen_lab";

$koneksi    = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'tolak') {
    $id         = $_GET['id_req'];
    $sql1       = "UPDATE tblreq SET proses = 'ditolak'  where id_req = '$id' ";
    $q1         = mysqli_query($koneksi, $sql1);
}
if ($op == 'terima') {
    $id         = $_GET['id_req'];
    $sql1       = "UPDATE tblreq SET proses = 'diterima'  where id_req = '$id' ";
    $q1         = mysqli_query($koneksi, $sql1);
}
?>
<div class="card-header text-white bg-dark m-2">
<i class="fa-sharp fa-solid fa-clipboard"></i>
    Daftar Request Ruangan
            </div>
                <div class="card-body m-2">
                <table class="table" id="daftar-saya">
                    <thead>
                        <tr style="background-color: #ef9521;">
                            
                            <th scope="col"></th>
                            <th scope="col">NAMA</th>
                            <th scope="col">HARI</th>
                            <th scope="col">JAM</th>
                            <th scope="col">RUANGAN</th>
                            <th scope="col">KELAS</th>
                            <th scope="col">PROSES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "SELECT * FROM tblreq 
                        LEFT JOIN tblkelas on
                        id_kelas = kelas
                        LEFT JOIN tblruangan on 
                        id_ruangan = ruangan 
                        LEFT JOIN tblhari on 
                        id_hari = hari
                        LEFT JOIN waktu on 
                        id_waktu = jam
                        order by proses asc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id_req'];
                            $nama       = $r2['nama'];
                            $hari        = $r2['nama_hari'];
                            $jam       = $r2['waktu'];
                            $kelas    = $r2['nama_kelas'];
                            $ruangan      = $r2['nama_ruangan'];
                            $proses     = $r2['proses'];

                            if($r2['proses']=='diterima'){
                                echo '<tr class="table-success">';
                            }else if($r2['proses']=='ditolak'){
                                echo '<tr class="table-danger">';
                            }else if($r2['proses']=='diproses'){
                                echo '<tr class="table-info">';
                            }

                        ?>
                                <?php
                                if($r2['proses']=='diterima'){
                                    echo '<td scope="row"><i class="fa-sharp fa-solid fa-check"></i></td>';
                                }else if($r2['proses']=='ditolak'){
                                    echo '<td scope="row"><i class="fa-sharp fa-solid fa-xmark"></i></td>';
                                }else if($r2['proses']=='diproses'){
                                    echo '<td scope="row"><i class="fa-sharp fa-solid fa-question"></i></td>';
                                }
                                ?>      
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $hari ?></td>
                                <td scope="row"><?php echo $jam ?></td>
                                <td scope="row"><?php echo $ruangan ?></td>
                                <td scope="row"><?php echo $kelas ?></td>
                                <td scope="row"><?php echo $proses ?></td>
                                <?php
                                if($r2['proses']== 'diproses'){
                                    ?>
                                <td scope="row">
                                    <a href="dashboard.php?hal=request&op=terima&id_req=<?php echo $id ?>"><button type="button" class="btn btn-success btn-sm">TERIMA</button></a>
                                    <a href="dashboard.php?hal=request&op=tolak&id_req=<?php echo $id ?>"><button type="button" class="btn btn-danger btn-sm">TOLAK</button></a>
                                </td>
                                <?php
                                }
                                ?>
                                
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
                </div>

