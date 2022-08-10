$(document).ready(function () {
	$("#logOut").click(function () {
		bootbox.confirm({
			message: "Apakah anda yakin ingin keluar?",
			buttons: {
				cancel: {
					label: '<i class="icon icon-times"></i> Tidak',
				},
				confirm: {
					label: '<i class="icon icon-check"></i> Ya',
				},
			},
			callback: function (result) {
				if (result) {
					$.ajax({
						url: baseUrl + "login/logout",
						type: "GET",
						success: function (data) {
							window.location.href = baseUrl + "home";
						},
					});
				}
			},
		});
	});

	$(function () {
		$.ajax({
			url: baseUrl + "profile/notifikasiPelamar",
			method: "POST",
			// data:{view:view},
			dataType: "json",
			success: function (data) {
				if (data.notif > 0) {
					$("span.notif-pelamar")
						.addClass("badge badge-danger navbar-badge")
						.append(data.notif);
				}
			},
		});
	});

	$(".resetNotifUser").on("click", function () {
		$.ajax({
			url: baseUrl + "profile/removeNotifikasiPelamar",
			method: "POST",
			data: { status: "0" },
			dataType: "json",
			success: function (data) {},
		});
	});
});

$("#updateProfileForm").on("submit", function (e) {
	e.preventDefault();
	Swal.fire({
		title: "Apakah anda yakin ingin menyimpan data?",
		text: "",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya!",
		cancelButtonText: "Tidak!",
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: baseUrl + "profile/update_profile/" + id,
				type: "POST",
				data: new FormData(this),
				processData: false,
				cache: false,
				contentType: false,
				success: function (data) {
					if (data == "true") {
						Swal.fire(
							"Disimpan!",
							"Data anda berhasil disimpan.",
							"success"
						).then((result) => {
							window.location.href = baseUrl + "Profile/lihat_profile/" + id;
						});
					} else if (data == "false") {
						Swal.fire(
							"Format file tidak sesuai",
							"Format file harus <b>PDF</b> dan <i>max 2 MB</i>",
							"error"
						);
					} else {
						Swal.fire("Data gagal disimpan", "", "error");
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					Swal.fire("Data gagal disimpan", "", "error");
					// console.log(thrownError);
				},
			});
		} else if (result.dismiss) {
			Swal.fire("Data gagal disimpan", "", "error");
		}
	});
});

$("#apply-btn").click(function () {
	Swal.fire({
		title: "Apakah anda yakin ingin melamar?",
		text: "Pastikan profil anda terbaru",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya!",
		cancelButtonText: "Tidak!",
	}).then((result) => {
		if (result.isConfirmed) {
			if (checkUserProfile != "0") {
				$.ajax({
					url: baseUrl + "lowongan/applyJob/" + idLowongan,
					type: "POST",
					success: function (data) {
						if (data == "true") {
							Swal.fire("Berhasil!", "Lamaran anda terkirim!", "success").then(
								(result) => {
									location.reload();
								}
							);
						} else if (data == "failed") {
							Swal.fire("Gagal!", "Silahkan login untuk melamar", "error").then(
								(result) => {
									window.location.href = baseUrl + "Login";
								}
							);
						}
					},
				});
			} else {
                Swal.fire("Gagal Melamar", "Mohon lengkapi profile anda", "error");
            }
		}
	});
});

if ($(".email-terkirim")[0]) {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener("mouseenter", Swal.stopTimer);
			toast.addEventListener("mouseleave", Swal.resumeTimer);
		},
	});

	Toast.fire({
		icon: "success",
		title: "Email terkirim",
	});
}

// $('.pencarian-lowongan').on('submit', function(e){
//     e.preventDefault()
//     var dataform = new FormData(this);
//     $.ajax({
//         url: baseUrl+'lowongan/search',
//         type: "POST",
//         data: new FormData(this),
//         processData: false,
//         cache: false,
//         contentType: false,
//         success: function(data){
//         },
//         error: function (xhr, ajaxOptions, thrownError) {

//         }
//     })
// });

$(function () {
	$.ajax({
		url: baseUrl + "home/autocompleteLokasi",
		datatype: "JSON",
		type: "GET",
		success: function (result) {
			var data = JSON.parse(result);
			$("#auto-complete-lokasi").autocomplete({
				source: data,
			});
		},
	});

	$.ajax({
		url: baseUrl + "home/autocompleteKategori",
		datatype: "JSON",
		type: "GET",
		success: function (result) {
			var data = JSON.parse(result);
			$("#auto-complete-kategori").autocomplete({
				source: data,
			});
		},
	});

	var tipe = ["Full Time", "Part Time", "Internship", "Freelance"];
	$("#auto-complete-tipe")
		.autocomplete({
			source: tipe,
			minLength: 0,
			minChars: 0,
			max: 12,
			autoFill: true,
			mustMatch: true,
			matchContains: false,
			scrollHeight: 220,
		})
		.on("focus", function (event) {
			var self = this;
			$(self).autocomplete("search", "");
		});
});

$("#fotoUpload").on("change", function () {
	if ($("#fotoUpload".value != "")) {
		$(".uploadFoto").show();
	} else {
		$(".uploadFoto").hide();
	}
});

$("#buttonUploadFoto").on("click", function () {
	var file_data = $("#fotoUpload").prop("files")[0];
	var form_data = new FormData();
	var old_foto = $("#oldFoto").val();
	form_data.append("file", file_data);
	form_data.append("old_foto", old_foto);
	$.ajax({
		url: baseUrl + "profile/uploadFoto/" + id,
		dataType: "text",
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: "post",
		success: function (data) {
			if (data == "true") {
				Swal.fire("Disimpan!", "Foto berhasil diupdate.", "success").then(
					(result) => {
						window.location.href = baseUrl + "Profile/lihat_profile/" + id;
					}
				);
			} else if (data == "error") {
				Swal.fire("Data gagal disimpan", "Format foto tidak sesuai", "error");
			} else {
				Swal.fire(data, "", "error");
			}
		},
	});
});
