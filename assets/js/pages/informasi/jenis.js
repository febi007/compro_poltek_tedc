$(`#form_input_${menuActive.toLowerCase()}`).validate({
	rules: {
		name: {
			required: true,
			remote: {
				url: base_url + `${camelCase(menuActive)}/isExist`,
				type: "post",
				data: {
					param: function () {
						return $("#param").val();
					},
				},
			},
		},
	},
	messages: {
		name: {
			required: "Form Tidak Boleh Kosong",
			remote: "Nama Sudah Digunakan",
		},
	},
	errorElement: "div",
	errorPlacement: handleError(),
	submitHandler: function (form) {
		_ajax(
			`${camelCase(menuActive)}/simpan`,
			$(`#form_input_${menuActive.toLowerCase()}`).serialize(),
			function (res) {
				if (res.status) {
					load_data(1, {}, "Jenis_Informasi");
					notif("success");
					$(`#modal_form_${menuActive.toLowerCase()}`).modal("hide");
					$(`#form_input_${menuActive.toLowerCase()}`)[0].reset();
					$("#param").val("add");
				} else {
					notif("failed");
				}
			}
		);
	},
});
function edit(id) {
	_ajax(`${camelCase(menuActive)}/edit`, { id: id }, function (res) {
		if (res.status) {
			$("#modal_title").text(`Edit ${menuActive.replaceAll("_", " ")}`);
			$(`#modal_form_${menuActive.toLowerCase()}`).modal("show");
		} else {
			notif("failed");
		}
	});
}
