<?php 
require_once "../modelo/Profesor.php";

$profesor=new Profesor();

$idprofesor=isset($_POST["idprofesor"])? limpiarCadena($_POST["idprofesor"]):"";
$nombre=isset($_POST["nombre"])?mb_strtoupper(limpiarCadena($_POST["nombre"]),'utf-8'):"";
$materia=isset($_POST["materia"])?mb_strtoupper(limpiarCadena($_POST["materia"]),'utf-8'):"";
$grado=isset($_POST["grado"])?mb_strtoupper(limpiarCadena($_POST["grado"]),'utf-8'):"";
$comunidad=isset($_POST["comunidad"])?mb_strtoupper(limpiarCadena($_POST["comunidad"]),'utf-8'):"";
$unidad=isset($_POST["unidad"])?mb_strtoupper(limpiarCadena($_POST["unidad"]),'utf-8'):"";
$descripcion=isset($_POST["descripcion"])? mb_strtoupper(limpiarCadena($_POST["descripcion"]),'utf-8'):"";
$foto=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";


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
		if (empty($idprofesor)) {
		$rspta=$profesor->insertarprof($nombre,$materia,$grado,$comunidad,$unidad,$foto,$descripcion);
		echo $rspta?"Profesor registrado": "Profesor no registrado";
		
		}
		else{
			$rspta=$profesor->editarprof($idprofesor,$nombre,$materia,$grado,$comunidad,$unidad,$foto,$descripcion);
			echo $rspta? "Profesor actualizado": "Profesor no se pudo actualizar";
		}
	break;
	case 'listar':
		$rpsta=$profesor->listarprof2();
		$datos[] = array();
		while ($reg=$rpsta->fetch_object()){
				$listsaa = '
				<div class="card col-md-3 col-sm-6"> 
						<div><a  onclick="mostrar('.$reg->id.')"><span class="fas fa-edit" style="float:height"></span> </a>
						<a  onclick="eliminar('.$reg->id.')"><span class="fas fa-eraser" style="float:right; color:red"></span> </a>
						</div>
					<div class="prof">
						<div class="foto">
							<img src="../img/'.$reg->imagen.'" class="perfil">
						</div>
						<div class="contenido">
						<p>'.$reg->nombre.'</p>
						<p>'.$reg->descripcion.'</p>
						<p>'.$reg->cargo.'</p>
						<p>'.$reg->materia.'</p>
						</div>
					</div>
				</div>
				';
			//$nuev=preg_replace('/\\\\\"/', "\"", $listsaa);
			//$datos[] = array(
			//	'nombre' =>$reg->nombre , 
			//	'seccion'=>$reg->seccion,
			//	'foto'=>$reg->foto
			//);
			echo ($listsaa);
		}
	break;
	case 'mostrar':
		$rpsta=$profesor->mostrarprof($idprofesor);
		echo json_encode($rpsta);
	break;
}
?>