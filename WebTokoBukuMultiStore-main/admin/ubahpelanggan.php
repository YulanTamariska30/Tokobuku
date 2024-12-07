<h2>Ubah Pelanggan</h2>

<?php  

	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id];'");
	$pecah = $ambil->fetch_assoc();

?>

<script type="text/javascript">
  // Fungsi untuk validasi kolom "Telepon"
  function validateInput() {
    var teleponInput = document.getElementById('telepon').value;
    var regex = /^[0-9]+$/;  // Regex untuk memastikan hanya angka

    if (!regex.test(teleponInput)) {
      alert("Mohon untuk memasukkan angka saja di kolom telepon!");
      return false;  // Mencegah pengiriman form
    }
    return true;  // Mengizinkan pengiriman form
  }
</script>

<form method="post" onsubmit="return validateInput()">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" class="form-control" name="password" value="<?php echo $pecah['password_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Gmail</label>
		<input type="text" class="form-control" name="gmail" value="<?php echo $pecah['gmail_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" class="form-control" name="telepon" id="telepon" value="<?php echo $pecah['telepon_pelanggan']; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
	if (isset($_POST['ubah'])) {
		$koneksi->query("UPDATE pelanggan SET gmail_pelanggan='$_POST[gmail]', password_pelanggan='$_POST[password]', nama_pelanggan='$_POST[nama]', telepon_pelanggan='$_POST[telepon]' WHERE id_pelanggan='$_GET[id]'");

		echo "<script> alert('Pelanggan Terubah'); </script>";
		echo "<script> location='index.php?hal=pelanggan'; </script>";
	}
?>