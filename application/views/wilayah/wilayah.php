<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Data seluruh wilayah indonesia dari mulai provinsi, kabupaten, kecamatan dan desa. By : http://kang-cahya.com" />
	<meta name="author" content="Cahya Dyazin" />

	<title>Wilayah Indonesia</title>
	<link rel="icon" type="image/png" href="<?php echo $path; ?>/favicon.png">




	</head>
	<body align="center">
		<h1>Data Seluruh wilayah di indonesia</h1>
		
		<p>Provinsi :</p>
		<select name="prov" class="form-control" id="provinsi">
			<option>- Select Provinsi -</option>
			<?php foreach($provinsi as $prov){
				echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
			} ?>
		</select>
		
		<p>Kabupaten :</p>
		<select name="kab" class="form-control" id="kabupaten">
			<option value=''>Select Kabupaten</option>
		</select>
		
		<p>Kecamatan :</p>
		<select name="kec" class="form-control" id="kecamatan">
			<option>Select Kecamatan</option>
		</select>
		
		<p>Desa :</p>
		<select name="des" class="form-control" id="desa">
			<option>Select Desa</option>
		</select>


		

		<p>Kabupaten :</p>
		<select name="kab" class="form-control" id="kabupaten1">
			<option value=''>Select Kabupaten</option>
		</select>
		
		<p>Kecamatan :</p>
		<select name="kec" class="form-control" id="kecamatan1">
			<option>Select Kecamatan</option>
		</select>
		
		<p>Desa :</p>
		<select name="des" class="form-control" id="desa1">
			<option>Select Desa</option>
		</select>


		<hr>
		<footer>2015 | Codeigniter 3 | By, <a href="http://kang-cahya.com" rel="dofollow">Cahya Dyazin</a></footer>
	</body>
</html>