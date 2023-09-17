function tabChange(param) {
	$("#page").val(param);
	menuActive = $("#page").val();
	var menu = ["Daftar_Informasi", "Jenis_Informasi", "Kategori_Informasi"];
	for (let i = 0; i < menu.length; i++) {
		if (menu[i] === param) {
			$("#pagination_link_" + param).css({
				display: "block",
				float: "right",
			});
			load_data(1, {}, param);
		} else {
			$("#pagination_link_" + menu[i]).css({
				display: "none",
			});
		}
	}
}
function add() {
	$("#modal_title").text(`Tambah ${menuActive.replaceAll("_", " ")}`);
	$("#param").val("add");
	$("#modal_form_" + menuActive.toLowerCase()).modal("show");
}

function load_data(page, data = {}, type) {
	_ajax(camelCase(type) + "/get_data/" + page, data, function (res) {
		$("#result-table-" + type).html(res.result_table);
		$("#pagination_link_" + type).html(res.pagination_link);
	});
}

function cari(e, val) {
	if (e.keyCode == 13) {
		console.log(menuActive, val);
		load_data(
			1,
			{
				search: true,
				any: val,
			},
			menuActive
		);
	}
}
$(`#modal_form_${menuActive.toLowerCase()}`).on("hide.bs.modal", function () {
	document.getElementById(`form_input_${menuActive.toLowerCase()}`).reset();
	$(`form_input_${menuActive.toLowerCase()}`).validate().resetForm();
	// $("#result_image").attr("src", "<?= base_url() ?>" + "assets/no_image.png");
});
