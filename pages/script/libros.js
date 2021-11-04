//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	Listar();
	$("#formulario").on("submit",function(e)
	{
		guardar(e);	
	})

	$("#imagenmuestra").hide();
}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#materia").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#imagen").val("");
	$("#archivo").val("");
	$("#archivoactual").val("");
	$("#idbiblioteca").val("");
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
		$("#imagenmuestra").hide();
		$("#archivomuestra").hide();
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
		url: "../ajax/biblioteca.php?op=guardar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          alert(datos);	          
	          Listar();
	          mostrarform(false);
	    }
	});
	limpiar();
}

function cancelarform()
{
	limpiar();
	mostrarform(false);
}
function Listar(){
	mostrarform(false);
	$.ajax({
		url: "../ajax/biblioteca.php?op=listar",
	    type: "POST",
	    success: function(datos)
	    {
	    	console.log(datos);
	    	$("#listado").html(datos);
	    }
	});
}

function descargar($idlibro){
	$.POST("../ajax/biblioteca.php?op=descargar",{idlibro: idlibro}, function(data,status){
		console.log(data);
		data=JSON.parse(data);
		confirm("desea descargar: "+ data.nombre);

	});
}

init();