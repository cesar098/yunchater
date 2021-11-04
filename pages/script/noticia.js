function init() {
	mostrarform(false);
	$("#formulario").on("submit", function (e) {
		guardar(e);
	})
	listar();
	$("#imagenmuestra").hide();
}

//Función limpiar
function limpiar() {
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#imagenmuestra").attr("src", "");
	$("#imagenactual").val("");
	$("#imagen").val("");
	$("#idnoticia").val("");
}

//Función mostrar formulario
function mostrarform(flag) {
	limpiar();
	if (flag) {
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled", false);
		$("#btnagregar").hide();
	}
	else {
		$("#imagenmuestra").hide();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

function guardar(e) {
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled", true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/noticia.php?op=guardar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function (datos) {
			mostrarform(false);
			listar();
			alert(datos);
		}
	});
	limpiar();
}

function cancelarform() {
	limpiar();
	mostrarform(false);
}


function listar() {
	var cardta;
	$.ajax({
		url: "../ajax/noticia.php?op=listar",
		type: "POST",
		success: function (datos) {
			console.log(datos);
			cardta = datos;
			$("#listado").html(datos);
		}
	});
}

function mostrar(idnoticia) {
	mostrarform(true);
	$("#cartas").hide();
	$.post("../ajax/noticia.php?op=mostrar", { idnoticia: idnoticia }, function (data, status) {
		console.log(data);
		data = JSON.parse(data);
		$("#nombre").val(data.nombre);
		$("#descripcion").val(data.descripcion);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src", "../img/" + data.foto);
		$("#imagenactual").val(data.foto);
		$("#idnoticia").val(data.idnoticia);

	})
}

init();