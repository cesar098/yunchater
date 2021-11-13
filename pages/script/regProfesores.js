function init(){
	mostrarform(false);
	$("#formulario").on("submit",function(e)
	{
		guardar(e);	
	})
	$("#imagenmuestra").hide();
	
	listar();
}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#imagen").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#idprofesor").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#cartas").show();
		$("#imagenmuestra").hide();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

function guardar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/profesor.php?op=guardar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
			console.log(datos);
	        mostrarform(false);
			listar();
	        alert(datos);	  
	    }
	});
	limpiar();        
}

function cancelarform()
{
	limpiar();
	mostrarform(false);
}

function mostrar(idprofesor)
{
	mostrarform(true);
	$("#cartas").hide();
	$.post("../ajax/profesor.php?op=mostrar",{idprofesor : idprofesor}, function(data, status)
	{
		console.log(data);
		data = JSON.parse(data);
		$("#nombre").val(data.nombre);
		$("#descripcion").val(data.descripcion);
		$("#materia").val(data.materia);
		$("#grado").val(data.grado);
		$("#unidad").val(data.unidad);
		$("#comunidad").val(data.comunidad);

		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../img/"+data.imagen);
		$("#imagenactual").val(data.imagen);
 		$("#idprofesor").val(data.id);

 	})
}

function listar(){

var cardta;
	$.ajax({
		url: "../ajax/profesor.php?op=listar",
	    type: "POST",
	    success: function(datos)
	    {
	    	//console.log(datos);
	    	cardta = datos;
	    	$("#cartas").html(datos);
	    }
	});
}

function hora(){
	$.ajax({
		url:"../ajax/profesor.php?op=listahora",
		type: "POST",
		success: function(datos){
			console.log(datos);
			
		}
	})
}

function eliminar(idprofesor) {
	let reel = confirm("¿Está Seguro de desea eliminar?");
	if (reel) {
		console.log(idprofesor);
		$.post("../ajax/profesor.php?op=eliminar", { idprofesor: idprofesor }, function (e) {
			alert(e);
		});
	}
}

$("#user-login").hide();

$("#checkb").change(function (e) {
	if (e.target.checked) {
		$("#user-login").show();
	} else {
		$("#user-login").hide();
	}
})
init();