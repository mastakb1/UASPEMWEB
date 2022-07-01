<?php 
$id_transaksi = $_GET['id'];
$id_judul_skripsi = $_GET['judul'];

$conn->query("UPDATE tb_transaksi SET status = 'kembali' WHERE id_transaksi = $id_transaksi") or die(mysqli_error($conn));

$conn->query("UPDATE tb_skripsi SET jumlah_skripsi = (jumlah_skripsi+1) WHERE judul_skripsi = '$id_judul_skripsi'") or die(mysqli_error($conn));

	echo "<script>alert('Proses, kembalian skripsi berhasil.');window.location='?p=transaksi';</script>";

?>