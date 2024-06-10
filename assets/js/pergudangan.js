const flashData = $('.flashdata').data("flashdata");


$('#select2').select2()

console.log(`flash ${flashData}`);

if (flashData) {

	Swal.fire({
		title: "Sukses!",
		text: flashData,
		icon: "success"
	  });
	
}

