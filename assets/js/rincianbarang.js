$(document).ready(function() {
	$.fn.modal.Constructor.prototype._enforceFocus = function() {};
     $('.select2').select2();

	 getDataBarang();


	 $('#harga').on('keyup', function () {
		let jumlah = $('#jumlah').val();
		let harga = $('#harga').val();
		let hasil = jumlah * harga;
		$('#total').val(hasil);
	 });



	 function refreshdatabarang() {
		$('#selectnamabarang option').remove();
	 }

	 function getDataBarang() {
		$.ajax({
			type: "GET",
			url: `${path}pergudangan/getdatabarang/`,
			dataType: "json",
			success: function (response) {
				$.each(response, function (i, v) { 
					 console.log(v.nama_barang);
					 $('#selectnamabarang').append($(`<option>`, {
						value: v.id,
						text : v.nama_barang
					 }));
				});
			}
		});
	 }

	$('#tambahBarang').on('click', function (e) {

			e.preventDefault();

			(async () => {
				const { value: url } = await Swal.fire({
				  input: "text",
				  inputLabel: "Nama Barang",
				  inputPlaceholder: "Masukkan Nama Barang"
				});
				if (url) {

					$.ajax({
						type: "POST",
						url: `${path}pergudangan/addbarang/`,
						data: {
							[csrfName]: csrfHash,
							nama_barang : url
						},
						dataType: "json",
						success: function (e) {
							Swal.fire({
								icon: "success",
								title: "data disimpan",
								showConfirmButton: false,
								timer: 1500
							  });
							  refreshdatabarang();
							  getDataBarang();
						}
					});
				}
			  })()


	});


});
