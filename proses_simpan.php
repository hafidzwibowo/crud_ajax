<?php
// Include / load file koneksi.php
include "koneksi.php";

// Ambil data yang dikirim dari form
$id = $_POST['id']; // Ambil data id dan masukkan ke variabel id
$dataset_name = $_POST['dataset_name']; // Ambil data nama dan masukkan ke variabel nama
$status = $_POST['status']; // Ambil data jenis_kelamin dan masukkan ke variabel jenis_kelamin
$user_id = $_POST['user_id']; // Ambil data telp dan masukkan ke variabel telp
$directory_path = $_POST['directory_path']; // Ambil data alamat dan masukkan ke variabel alamat
// $foto = $_FILES['foto']['name'];
// $tmp = $_FILES['foto']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
// $fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
// $path = "foto/".$fotobaru;

// Proses upload
// Cek apakah gambar berhasil diupload atau tidak
if(move_uploaded_file($tmp, $path)){ // Jika proses upload sukses
	// Proses simpan ke Database
	$sql = $pdo->prepare("INSERT INTO dataset VALUES(:id,:dataset_name,:status,:user_id,:directory_path)");
	$sql->bindParam(':id', $id);
	$sql->bindParam(':dataset_name', $dataset_name);
	$sql->bindParam(':status', $status);
	$sql->bindParam(':user_id', $user_id);
	$sql->bindParam(':directory_path', $directory_path);
	// $sql->bindParam(':foto', $fotobaru);
	$sql->execute(); // Eksekusi query insert
	
	// Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
	ob_start();
	include "view.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil disimpan', // Set pesan
		'html'=>$html // Set html
	);
}else{ // Jika proses upload gagal
	$response = array(
		'status'=>'gagal', // Set status
		'pesan'=>'Gambar gagal untuk diupload', // Set pesan
	);
}

echo json_encode($response); // konversi variabel response menjadi JSON
?>
