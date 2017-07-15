<?php
	if(isset($_POST['konfirmasi'])){
		require_once ('../../db.php');
	  $errors= array();
	  $dir = '../../images/konfirmasi/';
	  $file_name = $_FILES['bukti']['name'];
	  $file_size =$_FILES['bukti']['size'];
	  $file_tmp =$_FILES['bukti']['tmp_name'];
	  $file_type=$_FILES['bukti']['type'];
	  $file_ext=strtolower(end(explode('.',$_FILES['bukti']['name'])));
	  
	  $expensions= array("jpeg","jpg","png");
	  
	  if(in_array($file_ext,$expensions)=== false){
	     $errors[]="Tipe file file yang diperbolehkan hanya JPEG dan PNG.";
	  }
	  
	  if($file_size > 5120000){
	     $errors[]='Maksimal ukuran file 5 MB';
	  }
	  
	  $id = $_POST['id_pesanan'];
  	$sql = "SELECT * FROM pesanan WHERE id='$id'";
		$result = mysqli_query($db,$sql);
		$row = $result->fetch_assoc();
		$key_konfirmasi = $row['key_konfirmasi'];

	  if(empty($errors)==true){
	  	$new_file_name = $key_konfirmasi.".".$file_ext;
	  	$sql_update = "UPDATE pesanan SET pembayaran=1, foto_konfirmasi='$new_file_name' WHERE key_konfirmasi='$key_konfirmasi'";
	  	$db->query($sql_update);
			move_uploaded_file($file_tmp,$dir."".$new_file_name);
			header('location: ../../konfirmasi.php?key='.$key_konfirmasi);
	  }else{
			header('location: ../../konfirmasi.php?key="$key_konfirmasi"&msg=error');
	  }
	}
?>