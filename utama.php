<?php  
session_start();
include 'library/koneksi.php';

$barang = mysqli_query($conn, "SELECT * FROM tbl_barang");
$dataBar = mysqli_num_rows($barang);

$kategori = mysqli_query($conn, "SELECT * FROM tbl_kategori");
$dataKat  = mysqli_num_rows($kategori);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<?php 
	if($_SESSION['level'] == 'kasir'){
		echo "<a href='logout.php'>logout</a>";
	}else{
		echo '
		<a href="pages">admin panel</a>
		<a href="logout.php">logout</a>
		';
	}
	?>
	<h1>Halo selamat datang <i><?= $_SESSION['username'] ?></i></h1>

	<h2>Data Seluruh</h2>

	<ul>
		<li><h4>Barang : <?= $dataBar ?></h4></li>
		<li><h4>Kategori : <?= $dataKat ?></h4></li>
	</ul>
	
</body>
</html>