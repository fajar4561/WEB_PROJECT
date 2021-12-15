<?php 
session_start();
//Definisi koneksi
include '../koneksi.php';
////
$username = $_POST['username'];
$password = $_POST['password'];

$login = $koneksi->query("SELECT * from pegawai where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0)
{
	$data = mysqli_fetch_assoc($login);
	if ($data['jabatan']=="Admin")
	{
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Admin";

		header("location:../admin/index.php");
	}
	else if ($data['jabatan']== "Pimpinan") 
			{
				$_SESSION['username'] = $username;
				$_SESSION['jabatan'] = "Pimpinan";

				header("location:../pimpinan/index");

			}
	}
else
	{
		echo "<script>alert('Silahkan Cek Username dan Password Pastikan Benar');</script>";
		echo "<script>location='../pelanggan/';</script>";
	}


?>