<?php
// Include / load file koneksi.php
include "koneksi.php";

// Ambil data yang dikirim dari form
$id = $_POST['id']; // Ambil data id dan masukkan ke variabel id
$dataset_name = $_POST['dataset_name']; // Ambil data dataset_name dan masukkan ke variabel dataset_name
$satatus = $_POST['jenis_kelamin']; // Ambil data jenis_kelamin dan masukkan ke variabel jenis_kelamin
$user_id = $_POST['telp']; // Ambil data telp dan masukkan ke variabel telp
$directory_path = $_POST['directory_path']; // Ambil data alamat dan masukkan ke variabel alamat

// Cek apakah user ingin mengubah fotonya atau tidak
/* if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
	// Ambil data foto yang dipilih dari form
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$foto;
	
	// Set path folder tempat menyimpan fotonya
	$path = "foto/".$fotobaru;

	// Proses upload
	// Cek apakah gambar berhasil diupload atau tidak
	if(move_uploaded_file($tmp, $path)){ // Jika proses upload sukses
		// Query untuk menampilkan data siswa berdasarkan id yang dikirim
		$sqlcek = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
		$sqlcek->bindParam(':id', $id);
		$sqlcek->execute(); // Eksekusi / Jalankan query
		$data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek
		
		// Cek apakah file foto sebelumnya ada di folder foto
		if(is_file("foto/".$data['foto'])) // Jika foto ada
			unlink("foto/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto
		
		// Proses ubah ke Database
		$sql = $pdo->prepare("UPDATE dataset SET dataset_name=:dataset_name, jenis_kelamin=:jk, telp=:telp, alamat=:alamat, foto=:foto WHERE id=:id");
		$sql->bindParam(':dataset_name', $dataset_name);
		$sql->bindParam(':jk', $jenis_kelamin);
		$sql->bindParam(':telp', $telp);
		$sql->bindParam(':alamat', $alamat);
		$sql->bindParam(':foto', $fotobaru);
		$sql->bindParam(':id', $id);
		$sql->execute(); // Eksekusi query insert
		
		// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
		ob_start();
		include "view.php";
		$html = ob_get_contents();
		ob_end_clean();
		
		// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
		$response = array(
			'status'=>'sukses', // Set status
			'pesan'=>'Data berhasil diubah', // Set pesan
			'html'=>$html // Set html
		);
	}else{ // Jika proses upload gagal
		$response = array(
			'status'=>'gagal', // Set status
			'pesan'=>'Gambar gagal untuk diupload', // Set pesan
		);
	}
}else{ */ // Jika user tidak menceklis checkbox yang ada di form, lakukan :
	// Proses ubah ke Database
	$sql = $pdo->prepare("UPDATE dataset SET dataset_name=:dataset_name, status=:status, user_id=:user_id, directory_path=:directory_path WHERE id=:id");
	$sql->bindParam(':dataset_name', $dataset_name);
	$sql->bindParam(':status', $status);
	$sql->bindParam(':user_id', $user_id);
	$sql->bindParam(':directory_path', $directory_path);
	$sql->bindParam(':id', $id);
	$sql->execute(); // Eksekusi query insert
	
	// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
	ob_start();
	include "view.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil diubah', // Set pesan
		'html'=>$html // Set html
	);
// }

echo json_encode($response); // konversi variabel response menjadi JSON
?>
