<?php

class ModulohasrepositorioController extends Controller
{
	public function actionAsignarrepositoriomodulo()
	{
                $objetoModeloArray = Array();
                $preselectedCategories = Array();
                $modelo = new ModuloHasRepositorio();
                if(isset($_POST['moduloId'])){
                    $moduloId = $_POST['moduloId'];
                }
                if(isset($_GET['moduloId'])){
                    $moduloId = $_GET['moduloId'];
                }
                
                // Llamando a la tabla de copia de archivos --------------------
                if(isset($_GET['listadoAsignarRepositorio'])){
                    $listaRepositorioId = Array();
                    var_dump($_GET['listadoAsignarRepositorio']);
//                    $archivos = Yii::app()->ArchivoComponent->listaArchivosCopiaRepositorio($_GET['listadoAsignarRepositorio']);
                    $listaRepositorioId = $_GET['listadoAsignarRepositorio'];
                    $archivos = Yii::app()->ArchivoComponent->listaArchivosCopiaRepositorio($listaRepositorioId);
                    //var_dump($archivos);
                    foreach($archivos as $archivo)
                    {
                        echo $archivo['nombre_old']."<br>";
                    }
                    
                    Yii::app()->ArchivoComponent->agregarArchivoCopiaRepositorio($archivos);
                }                
                // Llamando a la tabla de copia de archivos---------------------
                
                $listado = $modelo->listaModuloRepositorio($moduloId);
                
                foreach($listado as $item){
                    $tmpObj = new ModuloHasRepositorio('myscenario');
                    if((int) $item['modulo_id']!=0)
                    {
                        $preselectedCategories[] = (int) $item['repositorio_id'];
                    }
                    else{
                        $preselectedCategories[] = 0;
                    }
                    
                    $tmpObj->repositorio_id = (int)$item['repositorio_id'];
                    $tmpObj->modulo_id = (int)$item['modulo_id'];
                    $objetoModeloArray[]= $tmpObj;
                }
                                    
		$this->render('asignarrepositoriomodulo',array(
                        'modelo'=>$modelo,
                        'objeto'=>$objetoModeloArray,
                        'seleccionados'=>$preselectedCategories,
                        'moduloId'=>$moduloId,
                ));
	}
        
        public function actionAsignarRepositorios() {                     

            $repositorio_modulo = new ModuloHasRepositorio();
            $listadoAsignarRepositorio = Array();
            $listadoDesAsignarRepositorio = Array();


            $listadoTotal = unserialize($_POST['datos-repositorio_id-list']);
            foreach(unserialize($_POST['datos-repositorio_id-select']) as $repositorios) {   
                $listadoOriginal[] = $repositorios;
            }

            $moduloId = $_POST['datos-modulo-id'];    
            var_dump($moduloId);
            $repositorioId = Array(); 

            if(isset($_POST['repositorio_id'])) {    
                $repositorioId = $_POST['repositorio_id'];                
                for( $i=0; $i < count($listadoOriginal); $i++) {
                    if( in_array( $listadoOriginal[$i],$repositorioId ) ) {
                            $listadoAsignarRepositorio[] = $listadoOriginal[$i];
                        }
                    else {
                            $listadoDesAsignarRepositorio[] = $listadoOriginal[$i];
                        }
                }

                if( count($listadoAsignarRepositorio) ){
                    $repositorio_modulo->asignaRepositorioModulo($listadoAsignarRepositorio, $moduloId);                               
                }

                if( count( $listadoDesAsignarRepositorio) )
                    $repositorio_modulo->desasignaInstitucionRepositorio($listadoDesAsignarRepositorio, $moduloId);        
            }
            else{
                $repositorio_modulo->desasignaModuloRepositorio($listadoOriginal,$moduloId);                
            }


            $this->redirect(array("asignarrepositoriomodulo",
                                'moduloId'=>$moduloId,
                                'listadoAsignarRepositorio'=>$listadoAsignarRepositorio,
            ));

        }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}