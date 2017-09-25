<?php

require_once 'db.php';

class Educacion extends db
{

  function __construct()
  {
    parent::__construct();
  }
//Bugs
  public function ActualizarEducacion($año_inicio,$año_final,$empresa,$texto, $id_educacion){
            $sql="UPDATE estudios SET año_inicio='".$año_inicio."', año_finalizacion='".$año_final."', empresa='".$empresa."', texto='".$texto."' WHERE id_estudios=".$id_educacion;
            $actualizarreserva=$this->realizarConsulta($sql);
            if ($actualizarreserva=!false) {
              return true;
            }else {
              return false;
            }
          }
  function mostrarEducacion(){
                //Construimos la consulta
                $sql="SELECT * FROM estudios";
                //Realizamos la consulta
                $resultado=$this->realizarConsulta($sql);
                if($resultado!=null){
                  //Montamos la tabla de resultado
                  $tabla=[];
                  while($fila=$resultado->fetch_assoc()){
                    $tabla[]=$fila;
                  }
                  return $tabla;
                }else{
                  return null;
                }
              }

          function borrarEstudio($id){
                    $sql="DELETE FROM estudios WHERE id_estudios=".$id."";
                    echo $sql;
                    $borrarestudio=$this->realizarConsulta($sql);
                    if ($borrarestudio=!NULL) {
                      return true;
                    }else {
                      return false;
                    }
                  }


}


 ?>
