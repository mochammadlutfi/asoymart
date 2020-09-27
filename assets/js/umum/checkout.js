$(document).ready(function () {
    var wizard = $("#wizard").steps({
		headerTag: "h4",
		bodyTag: "section",
		transitionEffect: "fade",
		autoFocus: true,
		enablePagination: false,
		enableAllSteps: false,
		enableKeyNavigation: false,
		onStepChanged: function (event, currentIndex, newIndex) {
		}
	});
	$("#btn-next").on("click", function() {
		wizard.steps('next');
		$(this).addClass('hide');
		$('#btn-bayar').removeClass('hide');
	});

	$("form#checkout").submit(function (e) {
		e.preventDefault();
		var formData = new FormData($('form#checkout')[0]);
		$.ajax({
			url: laroute.route('checkout.simpan'),
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){
				Swal.fire({
					title: 'Tunggu Sebentar...',
					text: ' ',
					imageUrl: laroute.url('assets/img/loading.gif', ['']),
					showConfirmButton: false,
					allowOutsideClick: false,
				});
			},
			success: function (response) {
				$('.is-invalid').removeClass('is-invalid');
				if (response.fail == false) {
					Swal.fire({
						title: "Berhasil",
						text: "Alamat Berhasil Diperbaharui!",
						timer: 3000,
						showConfirmButton: false,
						icon: 'success'
					});
				} else {
					Swal.close();
					for (control in response.errors) {
						$('#field-' + control).addClass('is-invalid');
						$('#error-' + control).html(response.errors[control]);
					}
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				Swal.close();
				alert('Error adding / update data');
			}
		});
	});
});