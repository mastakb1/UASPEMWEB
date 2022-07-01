<?php 
$tampilNamaSkripsi = $conn->query("SELECT * FROM tb_skripsi ORDER BY id_skripsi") or die(mysqli_error($conn));

$tampilNamaAnggota = $conn->query("SELECT * FROM tb_anggota ORDER BY npm") or die(mysqli_error($conn));

// $sql = $conn->query("SELECT * FROM tb_skripsi INNER JOIN tb_anggota ON tb_skripsi.id_skripsi = tb_anggota.id_anggota") or die(mysqli_error($conn));

$tgl_pinjam = date('d-m-Y');
$tujuh_hari = mktime(0,0,0, date('n'), date('j') + 7, date('Y'));
$kembali = date('d-m-Y', $tujuh_hari);

if(isset($_POST['tambah'])) {
    
    $tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($_POST['tgl_kembali']);
    
    // $nama_skripsi = $_POST['skripsi'];
    // $pecahB = explode(".", $nama_skripsi);
    // $judul = $pecahB[0];
    $nama_skripsi = $_POST['skripsi'];
    $pecahB = explode(".", $nama_skripsi);
    $id = $pecahB[0];
    $judul = $pecahB[1];
    // var_dump($id); 
    // var_dump($judul); die;

    // $nama_anggota = $_POST['nama'];
    // $pecahN = explode(".", $nama_anggota);
    // $npm = $pecahN[0];
    $nama_anggota = $_POST['nama'];
    $pecahN = explode(".", $nama_anggota);
    $npm = $pecahN[0];
    $nama = $pecahN[1];

    $sql = $conn->query("SELECT * FROM tb_skripsi WHERE judul_skripsi = '$judul'") or die(mysqli_error($conn));
    while($data = $sql->fetch_assoc()) {
        $sisa = $data['jumlah_skripsi'];

        if($sisa == 0) {
            echo "<script>alert('Skripsi tidak tersedia, Transaksi tidak dapat dilakukan. silahkan tambahkan stok skripsi dulu.');window.location='?p=transaksi&aksi=tambah';</script>";
        } else {
            $conn->query("INSERT INTO tb_transaksi VALUES(null, '$id', '$npm', '$npm', '$tgl_pinjam', '$tgl_kembali', 'pinjam')") or die(mysqli_error($conn));
            $conn->query("UPDATE tb_skripsi SET jumlah_skripsi = (jumlah_skripsi-1) WHERE id_skripsi = '$id'") or die(mysqli_error($conn));
            echo "<script>alert('Data transaksi berhasil ditambahkan.');window.location='?p=transaksi&aksi=tambah';</script>";
        }
    }
}


?>

<h1 class="mt-4">Tambah Data Transaksi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">tambah data transaksi</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    
    <div class="form-group">
        <label class="small mb-1" for="nama_skripsi">Skripsi</label>
        <select name="skripsi" id="nama_skripsi" class="form-control">
            <option value="">-- Pilih Skripsi --</option>
            <?php 
            while ($pecahSkripsi = $tampilNamaSkripsi->fetch_assoc()) {
            echo "<option value='$pecahSkripsi[id_skripsi].$pecahSkripsi[judul_skripsi]'>$pecahSkripsi[judul_skripsi]</option>";
            
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Nama</label>
        <select name="nama" id="nama_anggota" class="form-control">
            <option value="">-- Pilih Anggota --</option>
            <?php 
            while ($pecahAnggota = $tampilNamaAnggota->fetch_assoc()) {
            echo "<option value='$pecahAnggota[id_anggota].$pecahAnggota[nama_anggota]'>$pecahAnggota[npm] - $pecahAnggota[nama_anggota]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tgl_pinjam">Tanggal Pinjam</label>
        <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="" value="<?= $tgl_pinjam ?>">
    </div>
    <div class="form-group">
        <label for="tgl_kembali">Tanggal Kembali</label>
        <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="" value="<?= $kembali ?>">
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
    </div>
	</form>
</div>