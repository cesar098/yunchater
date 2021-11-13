<?php
require_once "../conex/Conexion.php";
class Profesor{
    
    //profesores
    public function usere($clavea,$logina){
        $sql = "INSERT INTO users (nombr, passw) VALUES('$logina','$clavea');";
        return ejecutarConsulta_retornarID($sql);
    }

    public function comprueba_user($logina){
        $resultado = 0;
        $sql = "SELECT COUNT(id) FROM users WHERE nombr = '$logina'";
        $resultado = ejecutarConsultaSimpleFila($sql);
        return $resultado["COUNT(id)"];
    }

    public function insertarprof($nombre,$materia,$grado,$comunidad,$unidad,$foto,$descripcion,$clavea,$logina)
    {
        $id_distrito = $this->dodble($unidad,$comunidad);
        $id_users = $this->usere($clavea,$logina);
        $sql="INSERT INTO profesor (nombre, materia, grado, descripcion,imagen, id_distrito,id_users) VALUES ('$nombre','$materia','$grado','$descripcion', '$foto' , $id_distrito,$id_users)";
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

    public function edituser($user,$clavea,$logina){
        $sql = "SELECT * FROM profesor p, users u where id= $user AND p.id_users=u.id";
        $id_use = ejecutarConsultaSimpleFila($sql);
        $re = id_users["id_users"];
        $sql2 = "UPDATE user SET nombr='$logina', passw= '$clavea' WHERE id='$re'";
        ejecutarConsulta($sql2);
        return $id_use['id_users'];
    }
    public function editarprof($idprofesor,$nombre,$materia,$grado,$comunidad,$unidad,$foto,$descripcion,$clavea,$logina)
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
        $sql="SELECT * FROM profesor p, distrito d WHERE p.id_distrito=d.id AND p.id='$idprofesor'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listarprof2(){
        $sql="SELECT p.id, p.nombre, p.materia, p.grado, p.descripcion, p.imagen, d.unidad, d.comunidad FROM profesor p, distrito d WHERE d.id=p.id_distrito"; 
        return ejecutarConsulta($sql);
    }
    public function delete($idprofesor){
        $sql = "DELETE FROM profesor WHERE id='$idprofesor'";
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
    public function insertaradm($nombre,$cargo,$unidad,$comunidad,$foto)
    {
        $id_distrito = $this->dodble($unidad,$comunidad);
        
        $sql="INSERT INTO junta (nombre, cargo, imagen, id_distrito) VALUES ('$nombre','$cargo','$foto', '$id_distrito')";
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

    public function eliminaradm($idadministracion){
        $sql= "DELETE FROM junta WHERE id='$idadministracion'";
        return ejecutarConsulta($sql);
    }

    public function dodble($unidad,$comunidad){
        $doble = $this->comprueba_duplicados($unidad);
        if($doble==0){
            $distrito = "INSERT INTO distrito (unidad, comunidad) VALUES ('$unidad', '$comunidad')";
            return $id_distrito = ejecutarConsulta_retornarID($distrito);
        }else {
            $distrito = "SELECT id FROM distrito WHERE unidad = $unidad";
            $id_re = ejecutarConsultaSimpleFila($distrito);
            //$id_re1 = mysqli_fetch_assoc($id_re);
            $id_distrito=$id_re["id"]; 
            return $id_distrito;
        }
    }
    public function mostraradm($idadministracion){
        $sql="SELECT * FROM junta a, distrito d WHERE a.id_distrito=d.id AND a.id='$idadministracion'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //administrador (hermana)
    public function insertarAD($logina,$clavea)
    {
        $sql="INSERT INTO administrador (usuario, password) VALUES ('$logina','$logina')";
        return ejecutarConsulta($sql);
    }

    public function verificaradm($logina,$clavea){
        $sql = "SELECT * FROM users WHERE nombr = '$logina' AND pass = '$clavea'";
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