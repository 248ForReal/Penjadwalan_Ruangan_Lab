<?php 
$id = $_GET['id']??'';
$act = $_GET['act']??'';
// ambil data
$data =[];
$where = '';
if($id!=''){
	$where = " $pk = $id";
	$sql = "SELECT * FROM $tabel WHERE $where";
	$data = select($sql);
	$data = $data[0];	
}
switch($act){
	case 'tolak':
		delete($tabel,$where);
		header('Location:?');
		break;
	case 'add':
	case 'terima':
		buatForm($data);		
		if(isset($_POST['data'])){
			$data = $_POST['data'];
			save($tabel,$data,$where);
			header('Location:?');
		}
		break;
	default:
		buatTabel();
}