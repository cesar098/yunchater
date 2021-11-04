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
	    	console.log(datos);
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

init();