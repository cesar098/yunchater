function init() {
	mostrarform(false);
	$("#formulario").on("submit", function (e) {
		guardar(e);
	})
	$("#imagenmuestra").hide();
	listar();
	seccion();
}

//Función limpiar
function limpiar() {
	$("#nombre").val("");
	$("#cargo").val("");
	$("#unidad").val("");
	$("#comunidad").val("");
	$("#imagen").val("");
	$("#imagenmuestra").attr("src", "");
	$("#imagenactual").val("");
	$("#idadministracion").val("");
}

//Función mostrar formulario
function mostrarform(flag) {
	limpiar();
	if (flag) {
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled", false);
		$("#btnagregar").hide();
		$("#listado").hide();
	}
	else {
		$("#imagenmuestra").hide();
		$("#formularioregistros").hide();
		$("#listado").show();
		$("#btnagregar").show();
	}
}

function seccion(){
	$.post("../ajax/profesor.php?op=sessionv", function(data){
		console.log(data);
	})
}

function guardar(e) {
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled", true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/administracion.php?op=guardar",
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
		url: "../ajax/administracion.php?op=listar",
		type: "POST",
		success: function (datos) {
			console.log(datos);
			cardta = datos;
			$("#listado").html(datos);
		}
	}); 
}

function mostrar(idadministracion) {
	mostrarform(true);
	console.log(idadministracion);
	$.post("../ajax/administracion.php?op=mostrar", { idadministracion: idadministracion }, function (data, status) {
		console.log(data);
		data = JSON.parse(data);
		$("#nombre").val(data.nombre);
		$("#cargo").val(data.cargo);
		$("#unidad").val(data.unidad);
		$("#comunidad").val(data.comunidad);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src", "../img/" + data.imagen);
		$("#imagenactual").val(data.imagen);
		$("#idadministracion").val(data.id);

	})
}

function eliminar(idprofesor) {
	let reel = confirm("¿Está Seguro de desea eliminar?");
	if (reel) {
		console.log(idprofesor);
		$.post("../ajax/administracion.php?op=eliminar", { idprofesor: idprofesor }, function (e) {
			alert(e);
		});
	}
}

init();