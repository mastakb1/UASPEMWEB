<?php 
$id_transaksi = $_GET['id'];
$id_judul = $_GET['judul'];
$id_tgl_kembali = $_GET['tgl_kembali'];
$lambat = $_GET['lambat'];

// jika skripsi yang di pinjam tidak di kembalikan, lewat dari 7 hari (terlambat) tidak bisa meminjam skripsi lagi kecuali skripsi yang dipinjam dikembalikan terlebih dahulu
if($lambat > 3) {
	echo "<script>alert('Pinjam skripsi tidak dapat di perpanjang, karena lebih dari 7 hari... kembalikan skripsi terlebih dahulu, lalu pinjam lagi.');window.location='?p=transaksi';</script>";
} else {
	$pecah_tgl_kembali = explode('-', $id_tgl_kembali);
	$next7Hari = mktime(0,0,0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0] + 7, $pecah_tgl_kembali[2]);
	$hari_next = date('d-m-Y', $next7Hari);

	$sql = $conn->query("UPDATE tb_transaksi SET tgl_kembali = '$hari_next' WHERE id_transaksi = $id_transaksi") or die(mysqli_error($conn));

	if($sql) {
		echo "<script>alert('Perpanjang jangka waktu skripsi berhasil.');window.location='?p=transaksi';</script>";
	} else {
		echo "<script>alert('Perpanjang gagal.');window.location='?p=transaksi';</script>";
	}
}

?>