<?php 
require_once "../modelo/Profesor.php";

$profesor=new Profesor();

$idbiblioteca=isset($_POST["idbiblioteca"])? limpiarCadena($_POST["idbiblioteca"]):"";
$titulo=isset($_POST["nombre"])?mb_strtoupper(limpiarCadena($_POST["nombre"]),'utf-8'):"";
$archivo=isset($_POST["archivo"])? mb_strtoupper(limpiarCadena($_POST["archivo"]),'utf-8'):"";
$descripcion=isset($_POST["descripcion"])? mb_strtoupper(limpiarCadena($_POST["descripcion"]),'utf-8'):"";
$foto=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$materia=isset($_POST["materia"])? mb_strtoupper(limpiarCadena($_POST["materia"]),'utf-8'):"";

switch ($_GET['op']) {
	case 'guardar':
		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
			$foto = $_POST["imagenactual"];
		}else{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
				$foto = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/" . $foto);
			}
		}
		$target_path = "document/";
		$target_path = $target_path . basename( $_FILES['archivo']['name']); 
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], "../".$target_path)) {
		    echo "El archivo ".  basename( $_FILES['archivo']['name']). 
		    " ha sido subido";
		    $archivo=basename( $_FILES['archivo']['name']);
		} else{
		    echo "Ha ocurrido un error, trate de nuevo!";
		}
		if (empty($idbiblioteca)) {
				$rspta=$profesor->insertarlibro($titulo,$materia,$archivo,$foto,$descripcion);
				echo $rspta?"libro registrado": "Libro no registrado";
			
		}
		else{
			$rspta=$profesor->editlibro($idbiblioteca,$titulo,$materia,$archivo,$foto,$descripcion);
		echo $rspta ? "Profesor actualizado": "Profesor no se pudo actualizar";
		}
	break;
	case 'listar':
		$rpsta=$profesor->listarlibro();
		$data=array();
		while ($reg=$rpsta->fetch_object()){
			$listado='
			<div class="box">
          	<img src="../img/'.$reg->foto.'" alt="">
          	<h2>'.$reg->titulo.'</h2>
          	<p>'.$reg->materia.'</p>
          	<a href="../document/'.$reg->archivo.'" class="btn btn-warning" download="'.$reg->archivo.'">Download</a>
        	</div>';
        echo $listado;
		}
	break;

}
?>