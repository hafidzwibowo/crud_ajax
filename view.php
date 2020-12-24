<div class="table-responsive">
	<form action="index.php" method="get">
		<label>Cari No Rekam Medis:</label>
		<input type="text" name="cari">
		<input type="submit" value="Cari">
	</form>
	<table class="table table-bordered">
		<tr>
			<th class="text-center">NO</th>
			<!-- <th class="text-center">FOTO</th> -->
			<th>No Rekam Medis</th>
			<th>Nama Dataset</th>
			<th>Status</th>
			<th>Uploader</th>
			<th>ALAMAT</th>
			<th colspan="3" class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
		</tr>
		<?php
		// Include / load file koneksi.php
		include "koneksi.php";
		
		if(isset($_GET['cari'])){
			$cari = $_GET['cari'];
			//$data = mysql_query("select * from mhs where nama like '%".$cari."%'");			
			$sql = $pdo->prepare("SELECT * FROM dataset WHERE medic_record like '%".$cari."%'");	
			$sql->execute(); // Eksekusi querynya
		}else{
			$sql = $pdo->prepare("SELECT * FROM dataset");
			$sql->execute(); // Eksekusi querynya
		
		}
		// Buat query untuk menampilkan semua data siswa
		// $sql = $pdo->prepare("SELECT * FROM siswa");
		// $sql->execute(); // Eksekusi querynya
		
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		?>
			<tr>
				<td class="align-middle text-center"><?php echo $no; ?></td>
				<!-- <td class="align-middle text-center">
					<img src="foto/<?php echo $data['foto']; ?>" width="80" height="80">
				</td> -->
				<td class="align-middle"><?php echo $data['id']; ?></td>
				<td class="align-middle"><?php echo $data['dataset_name']; ?></td>
				<td class="align-middle"><?php echo $data['status']; ?></td>
				<td class="align-middle"><?php echo $data['user_id']; ?></td>
				<td class="align-middle"><?php echo $data['directory_path']; ?></td>
				<td class="align-middle text-center">
					<a href="javascript:void();" data-toggle="modal" data-target="#form-modal" onclick="edit(<?php echo $no; ?>);" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
				<td class="align-middle text-center">
					<a href='index2.php?dataset_id=<?php echo $data['id']; ?>' class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> 
				</td>
				
				<td class="align-middle text-center">
					<a href="javascript:void();" data-toggle="modal" data-target="#delete-modal" onclick="hapus(<?php echo $no; ?>);" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></a>
				</td>
			</tr>
			<!--
			-- Membuat sebuah textbox hidden yang akan digunakan untuk form ubah
			-->
			<input type="hidden" id="id-value-<?php echo $no; ?>" value="<?php echo $data['id']; ?>">
			<input type="hidden" id="dataset_name-value-<?php echo $no; ?>" value="<?php echo $data['dataset_name']; ?>">
			<input type="hidden" id="status-value-<?php echo $no; ?>" value="<?php echo $data['status']; ?>">
			<input type="hidden" id="user_id-value-<?php echo $no; ?>" value="<?php echo $data['user_id']; ?>">
			<input type="hidden" id="directory_path-value-<?php echo $no; ?>" value="<?php echo $data['directory_path']; ?>">
		<?php
			$no++; // Tambah 1 setiap kali looping
		}
		?>
	</table>
</div>

<script>
// Fungsi ini akan dipanggil ketika tombol edit diklik
function edit(no){
	$("#btn-simpan").hide(); // Sembunyikan tombol simpan
	$("#btn-ubah, #checkbox_foto").show(); // Munculkan tombol ubah dan checkbox foto
	
	// Set judul modal dialog menjadi Form Ubah Data
	$("#modal-title").html("Form Ubah data");
	
	var nis = $("#id-value-" + no).val(); // Ambil nis dari input type hidden
	var nama = $("#dataset_name-value-" + no).val(); // Ambil nama dari input type hidden
	var jeniskelamin = $("#status-value-" + no).val(); // Ambil jenis kelamin dari input type hidden
	var telp = $("#user_id-value-" + no).val(); // Ambil telp dari input type hidden
	var alamat = $("#directory_path-value-" + no).val(); // Ambil alamat dari input type hidden
	
	// Set value dari textbox nis yang ada di form
	// Set textbox nis menjadi Readonly
	$("#id").val(id).attr("readonly","readonly");
	
	$("#dataset_name").val(dataset_name); // Set value dari textbox nama yang ada di form
	$("#status").val(status); // Set value dari textbox nama yang ada di form
	$("#user_id").val(user_id); // Set value dari textbox nama yang ada di form
	$("#directory_path").val(directory_path); // Set value dari textbox nama yang ada di form
	// $("#foto").val("");
}

// Fungsi ini akan dipanggil ketika tombol hapus diklik
function hapus(no){
	var nis = $("#id-value-" + no).val(); // Ambil nis dari input type hidden
	
	// Set textbox hidden nis yang ada di modal dialog hapus
	$("#data-id").val(id);
}
</script>
