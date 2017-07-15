<?php
	if(isset($_GET['act']) && isset($_GET['key'])) {
		require_once ('../../db.php');
		$act = $_GET['act'];
		$key = $_GET['key'];
		if($act == 'konfirmasi') {
			$sql_update = "UPDATE pesanan SET pembayaran=2 WHERE key_konfirmasi='$key'";
	  		$db->query($sql_update);
	  		header('location: ../dashboard.php?act=lihat&key='.$key);
		}
		if($act == 'batal') {
			$sql = "DELETE FROM pesanan WHERE key_konfirmasi='$key'";
			$result = mysqli_query($db,$sql);
			header('location: ../dashboard.php?msg=hapus-pesanan');
		}
	}
?>