<?php
require_once "../conex/Conexion.php";
class Profesor{
    
    //profesores
    public function insertarprof($nombre,$materia,$grado,$comunidad,$unidad,$foto,$descripcion)
    {
        $id_distrito = $this->dodble($unidad,$comunidad);
        echo $id_distrito;
        $sql="INSERT INTO profesor (nombre, materia, grado, descripcion,imagen, id_distrito) VALUES ('$nombre','$foto','$descripcion', '$foto' , $id_distrito)";
        return ejecutarConsulta($sql);

        /*$idprof= ejecutarConsulta_retornarID($sql);

        $num_elementos=0;
        $sw=true;
        $num_horarios=0;
        $num=0;
        $conta=1;
        while ($num_elementos < count($dias))
        {
            $sql_detalle = ($dias[$num_elementos]=="Lunes")? "INSERT INTO horario(dia,idprofesor, hora) VALUES('$dias[$num_elementos]','$idprof', '$lunesr1[$num]')" : "";
            ($sql_detalle=="")? :
                ejecutarConsulta($sql_detalle) or $sw = false;
            $sql_detalle = ($dias[$num_elementos]=="Martes")? "INSERT INTO horario(dia,idprofesor, hora) VALUES('$dias[$num_elementos]','$idprof','$lunesr2[$num]')" :"";
            ($sql_detalle=="")? :
                ejecutarConsulta($sql_detalle) or $sw = false;
            $sql_detalle = ($dias[$num_elementos]=="Miercoles")? "INSERT INTO horario(dia,idprofesor, hora) VALUES('$dias[$num_elementos]','$idprof', '$lunesr3[$num]')" : "";
            ($sql_detalle=="")? :
                ejecutarConsulta($sql_detalle) or $sw = false;
            $sql_detalle = ($dias[$num_elementos]=="Jueves")? "INSERT INTO horario(dia,idprofesor, hora) VALUES('$dias[$num_elementos]','$idprof', '$lunesr4[$num]')" : "";
            ($sql_detalle=="")? :
                ejecutarConsulta($sql_detalle) or $sw = false;
            $sql_detalle = ($dias[$num_elementos]=="Viernes")?"INSERT INTO horario(dia,idprofesor, hora) VALUES('$dias[$num_elementos]','$idprof','$lunesr5[$num]')":"";
            ($sql_detalle=="")? :
                ejecutarConsulta($sql_detalle) or $sw = false;
            
                
            $num_elementos=$num_elementos + 1;
            $conta = $conta + 1;*/

    }

    public function editarprof($idprofesor,$nombre,$materia,$grado,$comunidad,$unidad,$foto,$descripcion)
    {
        $id_distrito = $this->dodble($unidad,$comunidad);

        $sql="UPDATE profesor SET nombre='$nombre', imagen='$foto', descripcion='$descripcion', materia='$materia', grado='$grado', id_distrito='$id_distrito' WHERE id='$idprofesor'";
        return ejecutarConsulta($sql);
    }
    public function listahora(){
        $sql="SELECT h.idprofesor, h.idhorario, h.dias,h.hora, p.nombre, p.foto, p.seccion as descripcion FROM profesor p, horario h WHERE p.idprofesor=h.idprofesor";
        return ejecutarConsulta($sql);
    }

    public function mostrarprof($idprofesor){
        $sql="SELECT * FROM profesor WHERE id='$idprofesor'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listarprof2(){
        $sql="SELECT * FROM profesor";
        return ejecutarConsulta($sql);
    }

    //noticias
    public function insertarnot($nombre,$foto,$descripcion)
    {
        $sql="INSERT INTO noticia (titulo, descripcion, imagen) VALUES ('$nombre','$descripcion','$foto')";
        return ejecutarConsulta($sql);
    }
    public function editarnot($idnoticia,$nombre,$foto,$descripcion)
    {
        $sql="UPDATE noticia SET titulo='$nombre', imagen='$foto', descripcion='$descripcion' WHERE id='$idnoticia'";
        return ejecutarConsulta($sql);
    }

    public function listarnot(){
        $sql="SELECT * FROM noticia";
        return ejecutarConsulta($sql);
    }
    public function mostrarnot($idnoticia){
        $sql="SELECT * FROM noticia WHERE id='$idnoticia'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function mostrarind(){
        $sql="SELECT * FROM noticia ORDER BY (id) desc LIMIT 3";
        return ejecutarConsulta($sql);
    }

    //administracion (Trabajadores)
    public function insertaradm($nombre,$cargo,$unidad,$comunidad,$imagen)
    {
        $id_distrito = $this->dodble($unidad,$comunidad);

        $sql="INSERT INTO junta (nombre, cargo, imagen, id_distrito) VALUES ('$nombre','$cargo','$imagen', '$id_distrito')";
        return ejecutarConsulta($sql);
    }
    public function editaradm($idadministracion,$nombre,$cargo,$unidad,$comunidad,$imagen)
    {
        $id_distrito = $this->dodble($unidad,$comunidad);

        $sql="UPDATE junta SET nombre='$nombre', imagen='$imagen', cargo='$cargo', id_distrito='$id_distrito' WHERE id='$idadministracion'";
        return ejecutarConsulta($sql);
    }
    public function listaradm(){
        $sql="SELECT * FROM junta";
        return ejecutarConsulta($sql);
    }

    public function dodble($unidad,$comunidad){
        $doble = $this->comprueba_duplicados($unidad);
        $id_distrito = 1;
        if($doble==0){
            $distrito = "INSERT INTO distrito (unidad, comunidad) VALUES ('$unidad', '$comunidad')";
            return $id_distrito = ejecutarConsulta_retornarID($distrito);
        }else {
            $distrito = "SELECT id FROM distrito WHERE unidad = $unidad";
            return $id_distrito = ejecutarConsulta($distrito); 
        }
    }
    public function mostraradm($idadministracion){
        $sql="SELECT * FROM administracion WHERE idadministracion='$idadministracion'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //administrador (hermana)
    public function insertarAD($logina,$clavea)
    {
        $sql="INSERT INTO administrador (usuario, password) VALUES ('$logina','$logina')";
        return ejecutarConsulta($sql);
    }

//libro
    //libro registro de libro y materia
    public function insertarlibro($titulo,$materia,$archivo,$foto,$descripcion){

    	/*
        $doble=$this->comprueba_duplicados($materia);
    	if($doble==0){
    	   $sql="INSERT INTO materia (nombre) VALUES ('$materia')";
    	   $idmateria =ejecutarConsulta_retornarID($sql);
    	}
        else{
    	   $sql="SELECT * FROM materia WHERE (nombre='$materia')";
    	   $idmateria=ejecutarConsultaSimpleFila($sql);
    	}
        */	
    	$sql="INSERT INTO investigacion (titulo, materia, archivo, descripcion, imagen) VALUES ('$titulo','$materia','$archivo','$descripcion','$foto')";
    	return ejecutarConsulta($sql);
    }

    public function listarlibro(){
        $sql="SELECT * FROM investigacion";
        return ejecutarConsulta($sql);
    }

    public function editlibro($idlibro,$titulo,$materia,$archivo,$foto,$descripcion){
        $sql = "UPDATE investigacion SET titulo='$titulo', materia='$materia', archivo='$archivo', descripcion='$descripcion', imagen='$imagen' WHERE id='$idlibro'";
        return ejecutarConsulta($sql);
    }
    public function deletlibro($idlibro){
        $sql = "DELETE FROM investigacion WHERE id='$idlibro'";
        return ejecutarConsulta($sql);
    }
	//comprobar duplicados en materia
    public function comprueba_duplicados($materia)
    {
        $resultado=0;
        $sql="SELECT COUNT(id) FROM distrito WHERE (unidad='$materia')";
        $resultado = ejecutarConsultaSimpleFila($sql);
        return $resultado["COUNT(id)"];
    }
}
?>