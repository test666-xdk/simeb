<?php
include_once '../includes/header.php';
include_once '../includes/sidebar.php';
include_once '../config/class-mebel.php';

$mebel = new Mebel();

// Hapus
if(isset($_GET['status'])){
	// Mengecek nilai parameter GET 'status' dan menampilkan alert yang sesuai menggunakan JavaScript
	if($_GET['status'] == 'inputsuccess'){
		echo "<script>alert('Data Mebel berhasil ditambahkan.');</script>";
	} else if($_GET['status'] == 'editsuccess'){
		echo "<script>alert('Data Mebel berhasil diubah.');</script>";
	} else if($_GET['status'] == 'deletesuccess'){
		echo "<script>alert('Data Mebel berhasil dihapus.');</script>";
	} else if($_GET['status'] == 'deletefailed'){
		echo "<script>alert('Gagal menghapus data Mebel. Silakan coba lagi.');</script>";
	}
}

$res = $mebel->getAllMebel();
?>
<div class="container">
  <div class="card p-3">
    <h4>Daftar Mebel</h4>
    <table class="table table-striped">
      <thead><tr><th>#</th><th>Nama</th><th>Harga</th><th>Jumlah pesan</th><th>kategori</th><th>Aksi</th></tr></thead>
      <tbody>
        <?php $i=1; while($row = $res->fetch_assoc()): ?>
          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo htmlspecialchars($row['nama_mebel']);?></td>
            <td><?php echo number_format($row['harga'],0,',','.');?></td>
            <td><?php echo $row['jumlah_pesan'];?></td>
            <td><?php echo $row['nama_kategori'];?></td>
            <td>
             <a href="daftar-mebel.php?hapus=<?php echo $row['id_mebel']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
             <i class="bi bi-trash"></i> Hapus
              </a>
             </div>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
<div clas="card-footer">
 <button type="button" class="btn btn-primary" onclick="window.location.href='input-mebel.php'">
  <i class="bi bi-plus-lg"></i> Tambah Mebel
</button>
</div>
<br>
<div>
  <button type="button" class="btn btn-primary" onclick="window.location.href='input-mebel.php'">
  <i class="bi bi-plus-lg"></i> edit Mebel
<?php include_once '../includes/footer.php'; ?>