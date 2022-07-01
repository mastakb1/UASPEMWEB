<?php 

// menangkap id_skripsi di url
$id_skripsi = $_GET['id'];

// menampilkan data db sesuai id_skripsi
$sql = $conn->query("SELECT * FROM tb_skripsi WHERE id_skripsi = $id_skripsi") or die(mysqli_error($conn));
$pecahSql = $sql->fetch_assoc();

$tahun = $pecahSql['tahun_skripsi'];

if(isset($_POST['ubah'])) {
	$judul = htmlspecialchars($_POST['judul_skripsi']);
	$penulis = htmlspecialchars($_POST['pengarang_skripsi']);
	$tahun_skripsi = htmlspecialchars($_POST['tahun_skripsi']);
	$lokasi = htmlspecialchars($_POST['lokasi']);
	$tgl_input = htmlspecialchars($_POST['tgl_input']);
	$jumlah_skripsi = htmlspecialchars($_POST['jumlah_skripsi']);

    if(empty($judul && $penulis && $tahun_skripsi && $lokasi && $tgl_input && $jumlah_skripsi)) {
        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=skripsi';</script>";
    }

	$sql = $conn->query("UPDATE tb_skripsi SET judul_skripsi = '$judul', pengarang_skripsi = '$penulis', tahun_skripsi = '$tahun_skripsi', lokasi = '$lokasi', tgl_input = '$tgl_input', jumlah_skripsi = '$jumlah_skripsi' WHERE id_skripsi = $id_skripsi") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Data Berhasil Diubah.');window.location='?p=skripsi';</script>";
	} else {
		echo "<script>alert('Data Gagal Diubah.');window.location='?p=skripsi';</script>";
	}
}

?>

<h1 class="mt-4">Ubah Data Skripsi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">ubah data skripsi</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="judul_skripsi">Judul Skripsi</label>
        <input class="form-control" id="judul_skripsi" name="judul_skripsi" type="text" placeholder="Masukan judul skripsi" value="<?= $pecahSql['judul_skripsi']; ?>" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="pengarang_skripsi">Penulis</label>
        <input class="form-control" id="pengarang_skripsi" name="pengarang_skripsi" type="text" value="<?= $pecahSql['pengarang_skripsi']; ?>" placeholder="Masukan penulis skripsi"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="tahun_skripsi">Tahun Terbit</label>
        <select name="tahun_skripsi" id="tahun_skripsi" class="form-control">
        	<option value="">-- Pilih Tahun --</option>
        	<?php 
        	// menampilkan tahun terbit dari tahun 2010- hingga tahun 2022
        	$tahun = date('Y');

        	for ($i = $tahun - 12; $i <= $tahun ; $i++) { ?>
        		<option value="<?= $i ?>" <?php if($pecahSql['tahun_skripsi'] == $i){echo "selected";} ?> ><?= $i ?></option>
        	<?php
        	}
        	?>
        </select>
    </div>
    <div class="form-group">
    	<label for="lokasi">Lokasi</label>
    	<select name="lokasi" id="lokasi" class="form-control">
    		<option value="">-- Pilih Rak --</option>
    		<option value="Rak 1" <?php if($pecahSql['lokasi'] == 'Rak 1'){echo "selected";} ?> >Rak 1</option>
    		<option value="Rak 2" <?php if($pecahSql['lokasi'] == 'Rak 2'){echo "selected";} ?> >Rak 2</option>
    		<option value="Rak 3" <?php if($pecahSql['lokasi'] == 'Rak 3'){echo "selected";} ?> >Rak 3</option>
    	</select>
    </div>
    <div class="form-group">
    	<label for="tgl_input">Tanggal Input</label>
    	<input type="date" name="tgl_input" id="tgl_input" class="form-control" value="<?= $pecahSql['tgl_input']; ?>">
    </div>
	<div class="form-group">
        <label class="small mb-1" for="jumlah_skripsi">Jumlah Skripsi</label>
        <input class="form-control" id="jumlah_skripsi" name="jumlah_skripsi" type="text" value="<?= $pecahSql['jumlah_skripsi']; ?>" placeholder="Masukan jumlah skripsi"/>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
    </div>
	</form>
</div>