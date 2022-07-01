<?php 
// menampilkan DB skripsi
$ambilSkripsi = $conn->query("SELECT * FROM tb_skripsi ORDER BY id_skripsi DESC") or die(mysqli_error($conn));

?>
<h1 class="mt-4">Data Skripsi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">data skripsi</li>
</ol>
<div class="col-md-6">
    <a href="?p=skripsi&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Skripsi</a>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Skripsi
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tahun terbit</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($pecahSkripsi = $ambilSkripsi->fetch_assoc()) {
                    
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pecahSkripsi['judul_skripsi']; ?></td>
                        <td><?= $pecahSkripsi['pengarang_skripsi']; ?></td>
                        <td><?= $pecahSkripsi['tahun_skripsi']; ?></td>
                        <td><?= $pecahSkripsi['jumlah_skripsi']; ?></td>
                        <td>
                            <a href="?p=skripsi&aksi=ubah&id=<?= $pecahSkripsi['id_skripsi']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="?p=skripsi&aksi=hapus&id=<?= $pecahSkripsi['id_skripsi']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Yakin ?')"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>