<?php
include 'dir.php';
include '../koneksi.php';

# Auto generated kode pegawai
$quer = mysqli_query($koneksi, "SELECT max(kode_pegawai) as kodeTerbesar FROM pegawai ");
$dat = mysqli_fetch_array($quer);
$kodePegawai = $dat['kodeTerbesar'];
$urutan = (int) substr($kodePegawai, 3, 3);
$urutan++;
$huruf='STF';
$kodePegawai = $huruf. sprintf("%03s", $urutan);

# Deklarasi Variable

$kode = '$kodePegawai'; // kode pegawai
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$agama = $_POST['agama'];
$tmptlahir = $_POST['tmptlahir'];
$tgl = $_POST['tgllahir'];
$tgllahir = date("Y-m-d",strtotime($tgl));
$alamat = $_POST['alamat'];
// Simpan Foto
$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, "../fotopegawai/".$foto);

$jabatan = $_POST['jabatan'];
$email = $_POST['email'];
$telpon = $_POST['telpon'];
$username = $_POST['username'];
$password = $_POST['password'];


// lihat data pegawai apakah sudah ada data yang sama .
$ambil = $koneksi->query("SELECT * FROM pegawai WHERE username='$username'"); // username yang sama
$yangcocok = $ambil->num_rows;
$ambil2 = $koneksi->query("SELECT * FROM pegawai WHERE nama='$nama'"); // nama yang sama
$yangcocok2 = $ambil2->num_rows;
$ambil3 = $koneksi->query("SELECT * FROM pegawai WHERE email='$email'"); // email yang sama
$yangcocok3 = $ambil3->num_rows;

if ($yangcocok==1) { // apabila username sudah terdaftar
    echo "<script>alert('username Sudah Terdaftar Silahkan Periksa kembali');</script>";
    echo "<script>window.location=history.go(-1);</script>";  // kembali ke halaman sebelumnya 
}
elseif ($yangcocok2==1) { // apabila nama sudah terdaftar
    echo "<script>alert('nama Sudah Terdaftar Silahkan Periksa kembali');</script>";
    echo "<script>window.location=history.go(-1);</script>";    
}
elseif ($yangcocok3==1) { // apabila email sudah terdaftar
    echo "<script>alert('alamat email Sudah Terdaftar Silahkan Periksa kembali');</script>";
    echo "<script>window.location=history.go(-1);</script>";    
}
else { // selain itu simpan data baru
    $koneksi->query("INSERT INTO pegawai 
        (id,kode_pegawai,nama,kelamin,agama,tmptlahir,tgllahir,alamat,jabatan,email,telpon,username,password,foto)
        VALUES (null,
        '$kode',
        '$nama',        
        '$kelamin',
        '$agama',
        '$tmptlahir',
        '$tgllahir',
        '$alamat',
        '$jabatan',
        '$email',
        '$telpon',
        '$username',
        '$password',
        '$foto')");


    echo "<script>alert('Data Berhasil ditambahkan');</script>";
    echo "<script>location='../$dir/data-pegawai';</script>";   
}

 ?>