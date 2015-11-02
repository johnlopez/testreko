<?php 
class InstitucionComponent extends CApplicationComponent
{    
   public $vista;
   
   public $id;
   public $nombre;
   public $vision;
   public $mision;
   public $acreditada;
   public $fechaInicioAcreditacion;
   public $fechaTerminoAcreditacion;
   public $descripcion;

   public function init(){
       
   }
   public function obtenerInstitucionUsuario($nuevoUsuarioId) {
       
       $comando = Yii::app()->db->createCommand("CALL sp_components_obtener_institucion_usuario(:nuevoUsuarioId)");
       $comando->bindParam(':nuevoUsuarioId',$nuevoUsuarioId);
       
//       UNA SOLA INSTITUCION
//       $comando->execute();
//       $this->vista =  Yii::app()->db->createCommand("select @vista as result;")->queryScalar();
//       return $comando;       
       $resultado = $comando->queryAll();
       return $resultado;
   }
   public function getInstitucionUsuario()
   {
        $id = Yii::app()->user->getId();     
//        UNA SOLA INSTITUCION
//        $this->obtenerInstitucionUsuario($id);
//        $vistas = $this->vista;
        
        $vistas = $this->obtenerInstitucionUsuario($id);
        return($vistas);
   }
   
    public function setInstitucionSession(
            $nuevoInstitucionId,
            $nuevoInstitucionNombre,
            $nuevoInstitucionVision,
            $nuevoInstitucionMision,
            $nuevoInstitucionAcreditada,
            $nuevoInstitucionFechaInicioAcreditacion,
            $nuevoInstitucionFechaTerminoAcreditacion,
            $nuevoInstitucionDescripcion
    )
   {
       $this->id = $nuevoInstitucionId;
       $this->nombre = $nuevoInstitucionNombre;
       $this->vision = $nuevoInstitucionVision;
       $this->mision = $nuevoInstitucionMision;
       $this->acreditada = $nuevoInstitucionAcreditada;
       $this->fechaInicioAcreditacion = $nuevoInstitucionFechaInicioAcreditacion;
       $this->fechaTerminoAcreditacion = $nuevoInstitucionFechaTerminoAcreditacion;
   }
  
} 
