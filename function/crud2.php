<?php
include_once('db_func.php');
$id = $_GET['id']?? '';
$act = $_GET['act'] ?? '';

$data = [];
$where = '';
if($id!=''){
	$where = " $pk = $id";
	$sql = "SELECT * FROM $tabel WHERE $where";
	$data = select($sql);
	$data = $data[0];	
}
switch($act){
    case 'tolak':
        $tolak = "UPDATE tblreq SET proses='Ditolak' where $where";
        $q1 = mysqli_query($konn, $tolak);
		header('Location:../admin/dashboard.php');
		break;
	case 'add':
	case 'terima':
        $terima = "UPDATE tblreq SET proses='Diterima' where $where";
		$q1 = mysqli_query($konn, $terima);
        header('Location:?');
	default:
		buatTabel();
}
?>