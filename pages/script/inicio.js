function init(){
	
	Listar();
	$("#imagenmuestra").hide();
}

function Listar(){
	$.ajax({
		url: "ajax/noticia.php?op=mostrarindex",
	    type: "POST",
	    success: function(datos)
	    {
	    	console.log(datos);
	    	$("#listado").html(datos);
	    }
	});
}


init();