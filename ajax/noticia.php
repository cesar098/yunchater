<?php 
require_once "../modelo/Profesor.php";

$profesor=new Profesor();

$idnoticia=isset($_POST["idnoticia"])? limpiarCadena($_POST["idnoticia"]):"";
$nombre=isset($_POST["nombre"])?mb_strtoupper(limpiarCadena($_POST["nombre"]),'utf-8'):"";
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
		if (empty($idnoticia)) {
		$rspta=$profesor->insertarnot($nombre,$foto,$descripcion);
		echo $rspta?"Noticia registrado": "Noticia no registrado $nombre, $$descripcion";
		}
		else{
			$rspta=$profesor->editarnot($idnoticia,$nombre,$foto,$descripcion);
			echo $rspta ? "Noticia actualizado": "Noticia no actualizada";
		}
	break;
	case 'listar':
		$rpsta=$profesor->listarnot();
		$data=array();
		while ($reg=$rpsta->fetch_object()){
			$listado='
			<div class="box">
			<div>
				<button class="btn btn-danger" onclick="mostrar('.$reg->id.')"> </button>
			</div>
          	<img src="../img/'.$reg->imagen.'" alt="">
          	<h2>'.$reg->titulo.'</h2>
          	<p>'.$reg->descripcion.'</p>
        	</div>';
        echo $listado;
		}
	break;

	case 'mostrar':
		$rpsta=$profesor->mostrarnot($idnoticia);
		echo json_encode($rpsta);
	break;

	case 'mostrarindex':
		$rpsta=$profesor->mostrarind();
		while ($reg=$rpsta->fetch_object()) {
			$lista='
			<div class="col-12 noticia">
				<div class="row" id="listado">
					<div class="col-md-4 col-sm-12 foto">
						<img src="img/'.$reg->foto.'" class="img-fluid">
					</div>
					<div class="col-md-8 col-sm-12 infnot">
						<div class="titno">
							<p>'.$reg->nombre.'</p>
						</div>
						<div class="noti">
							<p>'.$reg->descripcion.'.</p>
						</div>
					</div>
				</div>	
			</div>';
			echo $lista;
		}
	break;
}
?>