<?php 
class Validar extends CApplicationComponent
{    
   public $vista;

   public function init(){
       
   }
   public function obtenerPrivilegio($id,$nombreModulo,$nombreControlador,$nombreAction) {
       
       $comando = Yii::app()->db->createCommand("CALL validar_privilegio_usuario(:id,:nombreModulo,:nombreControlador,:nombreAction,@vista)");
       $comando->bindParam(':id',$id);
       $comando->bindParam(':nombreModulo',$nombreModulo );
       $comando->bindParam(':nombreControlador',$nombreControlador);
       $comando->bindParam(':nombreAction',$nombreAction);
       $comando->execute();
       $this->vista =  Yii::app()->db->createCommand("select @vista as result;")->queryScalar();
       return $comando;
   }
   public function validarAcceso()
   {
       $id = Yii::app()->user->getId();
       $nombreModulo = Yii::app()->controller->module->id;
       $nombreControlador = Yii::app()->controller->id;
       $nombreAction = Yii::app()->controller->action->id;
       
       $this->obtenerPrivilegio($id, $nombreModulo, $nombreControlador, $nombreAction);
       $vistas = $this->vista;
        return(       
                array(
                        array('allow',
				'actions'=>array(
                                                    $vistas,                                                    
                                    ),
				'roles'=>array(Yii::app()->controller->module->id),
			),
			array('deny',
				'users'=>array('*'),
			),
		)
        );
   }
   public function comprobarRuta()
   {
        echo Yii::app()->user->getId(); 
        echo "<br>";
        echo Yii::app()->controller->module->id;
        echo "<br>";
        echo Yii::app()->controller->id;
        echo "<br>";
        echo Yii::app()->controller->action->id;
        echo "<br>";  
   }
} 

