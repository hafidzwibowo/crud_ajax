<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th class="text-center">NO</th>
			<th class="text-center">FOTO</th>
			<th>img_id</th>
			<th>dataset_id</th>
			<th>validate</th>
			<th>Uploader</th>
			<th>Path</th>
			<th colspan="2" class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
		</tr>
		<?php
		// Include / load file koneksi.php
		include "koneksi.php";
		$dataset_id=$_GET['dataset_id'];
		// Buat query untuk menampilkan semua data siswa
		$sql = $pdo->prepare("SELECT * FROM image_data WHERE dataset_id=:dataset_id");
		$sql->bindParam(":dataset_id",$dataset_id,PDO::PARAM_STR);
		$sql->execute(); // Eksekusi querynya
		
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		?>
			<tr>
				<td class="align-middle text-center"><?php echo $no; ?></td>
				<td class="align-middle text-center">
					<img src="foto/<?php echo $data['file_name']; ?>" width="80" height="80">
				</td>
				<td class="align-middle"><?php echo $data['img_id']; ?></td>
				<td class="align-middle"><?php echo $data['dataset_id']; ?></td>
				<td class="align-middle"><?php echo $data['validate']; ?></td>
				<td class="align-middle"><?php echo $data['userid']; ?></td>
				<td class="align-middle"><?php echo $data['file_name']; ?></td>
				
				<td class="align-middle text-center">
					<a href="javascript:void();" data-toggle="modal" data-target="#form-modal" onclick="edit(<?php echo $no; ?>);" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
				<td class="align-middle text-center">
					<a href="javascript:void();" data-toggle="modal" data-target="#delete-modal" onclick="hapus(<?php echo $no; ?>);" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></a>
				</td>
			</tr>
			<!--
			-- Membuat sebuah textbox hidden yang akan digunakan untuk form ubah
			-->
			<input type="hidden" id="file_name-value-<?php echo $no; ?>" value="<?php echo $data['file_name']; ?>">
			<input type="hidden" id="img_id-value-<?php echo $no; ?>" value="<?php echo $data['nama']; ?>">
			<input type="hidden" id="userid-value-<?php echo $no; ?>" value="<?php echo $data['telp']; ?>">
			<input type="hidden" id="validate-value-<?php echo $no; ?>" value="<?php echo $data['alamat']; ?>">
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
	var file_name = $("#file_name-value-" + no).val();
	var img_id = $("#img_id-value-" + no).val(); // Ambil nis dari input type hidden
	var userid = $("#userid-value-" + no).val(); // Ambil nama dari input type hidden
	var validate = $("#validate-value-" + no).val();
	
	// Set value dari textbox nis yang ada di form
	// Set textbox nis menjadi Readonly
	$("#img_id").val(img_id).attr("readonly","readonly");
	
	$("#file_name").val(file_name); // Set value dari textbox nama yang ada di form
	$("#userid").val(userid); // Set value dari textbox nama yang ada di form
	$("#validate").val(validate); // Set value dari textbox nama yang ada di form

}

// Fungsi ini akan dipanggil ketika tombol hapus diklik
function hapus(no){
	var nis = $("#nis-value-" + no).val(); // Ambil nis dari input type hidden
	
	// Set textbox hidden nis yang ada di modal dialog hapus
	$("#data-nis").val(nis);
}
</script>
