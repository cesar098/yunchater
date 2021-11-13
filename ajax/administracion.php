<?php 
require_once "../modelo/Profesor.php";

$profesor=new Profesor();

$idadministracion=isset($_POST["idadministracion"])? limpiarCadena($_POST["idadministracion"]):"";
$nombre=isset($_POST["nombre"])?mb_strtoupper(limpiarCadena($_POST["nombre"]),'utf-8'):"";
$cargo=isset($_POST["cargo"])? mb_strtoupper(limpiarCadena($_POST["cargo"]),'utf-8'):"";
$unidad=isset($_POST["unidad"])? mb_strtoupper(limpiarCadena($_POST["unidad"]),'utf-8'):"";
$comunidad=isset($_POST["comunidad"])? mb_strtoupper(limpiarCadena($_POST["comunidad"]),'utf-8'):"";
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
		if (empty($idadministracion)) {

			$rspta=$profesor->insertaradm($nombre,$cargo,$unidad,$comunidad,$foto);
			echo $rspta?"Administrador registrado": "Administrador no registrado";
		}
		else{
			$rspta=$profesor->editaradm($idadministracion,$nombre,$cargo,$unidad,$comunidad,$foto);
		echo $rspta? "Administrador actualizado": "Administrador no se pudo actualizar";
		}
	break;
	case'listar':
		$rpsta=$profesor->listaradm();
		$data=array();
		while ($reg=$rpsta->fetch_object()){
			$listado='<div class="card col-md-3 col-sm-6 ">
			<div><a  onclick="mostrar('.$reg->id.')"><span class="fas fa-edit" style="float:height"></span> </a>
						<a  onclick="eliminar('.$reg->id.')"><span class="fas fa-eraser" style="float:right; color:red"></span> </a>
						</div>
					<div class="prof">
        	
			<div class="foto">
				<img src="../img/'.$reg->imagen.'" class="perfil">
			</div>
			<div class="contenido">
				<p>'.$reg->nombre.'</p>
				<p>'.$reg->cargo.'</p>
			</div>
			</div>
		</div>';
    	echo $listado;
		}
	break;
	case 'mostrar':
		$sql=$profesor->mostraradm($idadministracion);
		echo json_encode($sql);
	break;
	case 'eliminar':
		$sql=$profesor->eliminaradm($idadministracion);
		echo json_encode($sql);
	break;
		
}
?>