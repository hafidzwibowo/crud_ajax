<div>
<?php
		// Include / load file koneksi.php
	include "koneksi.php";
	$dataset_id=$_GET['dataset_id'];
	//$img_id=$_GET['img_id'];
		// Buat query untuk menampilkan semua data siswa
	$sl = $pdo->prepare("SELECT img_id FROM image_data WHERE dataset_id='$dataset_id' ORDER BY img_id DESC LIMIT 1");
		// $sql->bindParam(":dataset_id",$dataset_id,PDO::PARAM_STR);
	$sl->execute(); // Eksekusi querynya
		// $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	while($daa = $sl->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		$prev=$daa['img_id'];
	}

	$sq = $pdo->prepare("SELECT img_id FROM image_data WHERE img_id<$img_id AND dataset_id='$dataset_id' ORDER BY img_id ASC LIMIT 1");
	$sq->execute(); // Eksekusi querynya
	while($dat = $sq->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		$next=$dat['img_id'];
	}
$nextbtn=(isset($dataset_id,$next))?"<a href='view3.php?dataset_id=$dataset_id?img_id=$next'>Next</a>":"";
$prevbtn=(isset($dataset_id,$prev))?"<a href='view3.php?dataset_id=$dataset_id?img_id=$prev'>Prev</a>":"";
echo $prevbtn." ".$nextbtn;
?>

<?php
include "koneksi.php";
$img_id=$_GET['img_id'];
$sql = $pdo->prepare("SELECT * FROM image_data WHERE img_id=:$img_id");
		$sql->bindParam(":img_id",$img_id,PDO::PARAM_INT);
		$sql->execute();
while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		?>
	<img src="foto/<?php echo $data['file_name']; ?>" width="80" height="80">
}
</div>