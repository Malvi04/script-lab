<?php  
include 'library/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM tbl_users WHERE username='$username'";
$hasil = mysqli_query($conn, $query);
$data = mysqli_fetch_array($hasil);
$cek = mysqli_num_rows($hasil);

if($cek > 0){

	if(password_verify($password, $data['password'])){

		session_start();
		//memangil session
		$_SESSION['id'] = $data['id'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['level'] = $data['level'];

		header("location:utama.php");
	}
	else{

		echo "<script>
				alert('username atau password salah!');
				history.go(-1);
			  </script>";
	}
}
else{
	echo "<script>
			alert('username atau password belum terdaftar!');
			history.go(-1);
		  </script>";
}


?>