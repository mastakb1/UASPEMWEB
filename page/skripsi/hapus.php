<?php 
// menangkap id_skripsi di url
$id_skripsi = $_GET['id'];

$conn->query("DELETE FROM tb_skripsi WHERE id_skripsi = $id_skripsi") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=skripsi';</script>";

?>