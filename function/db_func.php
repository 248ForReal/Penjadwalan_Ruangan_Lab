<?php 
$konn = mysqli_connect(
			'localhost', 	//server location/ip/host
			'root', 		//user 
			'',		//password
			'manajemen_lab'			//nama db
		);

function execute($sql){
	global $konn;
	$hasil = $konn->query($sql);
	if($hasil)
		return $hasil;
	else
		echo $konn->error;
}

function select($tabel){
	$c = strtoupper(substr(trim($tabel),0,6));
	$sql = "SELECT * FROM $tabel";
	if($c=='SELECT'){
		$sql = $tabel;
	}
	
	$hasil = execute($sql);
	$data = $hasil->fetch_all(MYSQLI_ASSOC);
	return $data;
}

function insert($tabel,$data){	
	$sql = "INSERT INTO $tabel SET ";
	foreach($data as $index=>$value){
		$sql.="$index = '$value',";
	}
	$sql  = substr($sql,0,-1);
	execute($sql);
}

function update($tabel,$data,$where){	
	$sql = "UPDATE $tabel SET ";
	foreach($data as $index=>$value){
		$sql.="$index = '$value',";
	}
	$sql  = substr($sql,0,-1);
	$sql .=' WHERE '.$where;
	execute($sql);
}

function save($tabel,$data,$where=''){	
	$sql = "";
	foreach($data as $index=>$value){
		$sql.="$index = '$value',";
	}
	$sql  = substr($sql,0,-1);
	if($where ==''){
		$sql = "INSERT INTO $tabel SET $sql";
	}
	else{
		$sql = "UPDATE $tabel SET $sql WHERE $where";
	}	
	execute($sql);
}


function delete($tabel,$where=''){	
	$sql = "DELETE FROM $tabel ".($where==''?'':'WHERE '.$where);
	//echo $sql;
	execute($sql);
}

function tabel_act($data,$nama,$title,$pk){
	//echo $pk;
	echo '<table class="table">';
	echo '<tr>';
	foreach($nama as $k=>$m){
		echo '<th>'.$m.'</th>';
	}
	echo '</tr>';
	foreach($data as $m){
		echo '<tr>';
		foreach($nama as $k=>$i){
			echo '<td>'.$m[$k].'</td>';
		}
		echo '<td>
		<a href="?act=terima&id='.$m[$pk].'" class="btn btn-success">Terima</a>
		<a href="?act=tolak&id='.$m[$pk].'" class="btn btn-danger">Tolak</a>
		</td>';
		echo '</tr>';
	}
	echo '</table>';
	
}
function tabel($data,$nama,$title,$pk){
	//echo $pk;
	echo '<table class="table">';
	echo '<tr>';
	foreach($nama as $k=>$m){
		echo '<th>'.$m.'</th>';
	}
	echo '</tr>';
	foreach($data as $m){
		echo '<tr>';
		foreach($nama as $k=>$i){
			echo '<td>'.$m[$k].'</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
	
}

function inputan($data,$id,$label,$type='text'){
	?>
	<div class="mb-3">
	  <label class="form-label"><?=$label?></label>
	  <input type="<?=$type?>" class="form-control" 
		     placeholder="Isikan <?=$label?>"
			 name="data[<?=$id?>]"
			 value="<?=$data[$id]??''?>"
			 >
	</div>
	<?php
}
function berkas($label){
	?>
	<div class="mb-3">
	  <label class="form-label"><?=$label?></label>
	  <input type="file" class="form-control" 
		     placeholder="Isikan <?=$label?>"
			 name="berkas"
			 >
	</div>
	<?php
}

function logout(){

	session_start();
	session_destroy();
	header('location: ../login.php');

}