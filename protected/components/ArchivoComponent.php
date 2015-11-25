<?php 
class ArchivoComponent extends CApplicationComponent
{    
    public $vista;
    public $lastInsertArchivoId;

    public function init(){
       
    }
    
    public function agregarArchivoProcedure(                
            $nuevoArchivoNombre,
            $nuevoArchivoMimeType,
            $nuevoArchivoTamano,
            $nuevoArchivoRuta,
            $nuevoArchivoUsuarioId,
            $nuevoArchivoContenedorId,
            $nuevoArchivoContenedorTabla
    ) 
    {            
            $command = Yii::app()->db->createCommand("CALL sp_components_agregar_archivo(
            :nuevoArchivoNombre,
            :nuevoArchivoMimeType,
            :nuevoArchivoTamano,
            :nuevoArchivoRuta,
            :nuevoArchivoUsuarioId,
            :nuevoArchivoContenedorId,
            :nuevoArchivoContenedorTabla,
            
            @last_insert_archivo_id
            )"
            );                   
            $command->bindParam(':nuevoArchivoNombre',$nuevoArchivoNombre);
            $command->bindParam(':nuevoArchivoMimeType',$nuevoArchivoMimeType);
            $command->bindParam(':nuevoArchivoTamano',$nuevoArchivoTamano);
            $command->bindParam(':nuevoArchivoRuta',$nuevoArchivoRuta);
            $command->bindParam(':nuevoArchivoUsuarioId',$nuevoArchivoUsuarioId);
            $command->bindParam(':nuevoArchivoContenedorId',$nuevoArchivoContenedorId);
            $command->bindParam(':nuevoArchivoContenedorTabla',$nuevoArchivoContenedorTabla);           
            $command->execute();
            $this->lastInsertArchivoId = Yii::app()->db->createCommand("select @last_insert_archivo_id as result;")->queryScalar();

            return $command;
    }
    
    public function agregarArchivo($nuevoContenedor) // nuevo Contenedor es el modelo de una tabla SQL que pueda poseer un archivo
    {        
        $archivo = CUploadedFile::getInstancesByName('images'); // clase Yii que detecta un nuevo archivo subido
        foreach ($archivo as $archi){
                   $nombre = $archi->name; 
                   $tipo = $archi->type;
                   $tamano = $archi->size;
        }  
        $usuarioId=Yii::app()->user->getId(); // usuario actualmente logueado
        $contenedorId = $nuevoContenedor->id;
        $contenedorTabla = $nuevoContenedor->tableSchema->name; // Tabla SQL asociada al modelo de nuevo contenedor
        $ruta = $this->crearRutaContenedor($nuevoContenedor); // Ruta base de la carpeta de archivos
        $carpeta = Yii::getPathOfAlias('webroot').$ruta; // Carpeta Real en disco
        
        if(!is_dir($carpeta)) // Si no existe la carpeta se crea
        {
            mkdir($carpeta,0,true);
            chmod($carpeta,0755);
        }
        foreach($archivo as $image=>$i)
        {
            $aleatorio = rand(100000,999999);
            $img = $aleatorio."-".$i->name; //numero aleatorio mas nombre de la imagen
            
            $this->agregarArchivoProcedure(
                    $img,
                    $tipo,
                    $tamano,
                    $ruta,
                    $usuarioId,
                    $contenedorId,
                    $contenedorTabla
            );            
            $i->saveAs($carpeta.$img);                                
        }        
        return "Contenedor Subida: ".$contenedorTabla;
    }
    
    public function listarArchivo($nuevoContenedor) {  
            
            $nuevoContenedorId = $nuevoContenedor->id;
            $nuevoContenedorTabla = $nuevoContenedor->tableSchema->name;            
        
            $command = Yii::app()->db->createCommand("CALL sp_component_lista_archivos(:nuevoContenedorId,:nuevoContenedorTabla)");
            $command->bindParam(':nuevoContenedorId',$nuevoContenedorId);	
            $command->bindParam(':nuevoContenedorTabla',$nuevoContenedorTabla);	

            $resultado = $command->queryAll();        
            return $resultado;       
    }
    
    public function crearRutaContenedor($nuevoContenedor){
        
        $contenedorTabla = $nuevoContenedor->tableSchema->name;        
        // Ruta Para Herramientas
        if(
            $contenedorTabla == 'trabajo_grupal' || 
            $contenedorTabla == 'foro'||
            $contenedorTabla == 'evaluacion' ||
            $contenedorTabla == 'recepcion_trabajo' ||
            $contenedorTabla == 'archivo_recurso' ||
            $contenedorTabla == 'contenido_libre' ||
            $contenedorTabla == 'autoevaluacion' ||
            $contenedorTabla == 'evaluacion_no_objetiva' ||
            $contenedorTabla == 'link_interes' ||
            $contenedorTabla == 'glosario' ||
            $contenedorTabla == 'proyecto'               
        )
        {
            $institucionNombre = Yii::app()->session['institucionNombre'];
            $repositorio = Yii::app()->session['repositorio'];                        
            $contenedorId = $nuevoContenedor->id;
            $ruta = '/reko-archivos/'.$institucionNombre.'/'.'repositorio-id-'.$repositorio->id.'/'.$contenedorTabla.'/'.$contenedorTabla.'-id-'.$contenedorId.'/';            
            return $ruta;
        }        
        // A continuacion agregar rutas para otras tablas que se relacionen con archivo...
    }
    
    public function descargarArchivo($nuevoArchivo){        
        $archivo = $nuevoArchivo;
        if( file_exists( YiiBase::getPathOfAlias('webroot').$archivo->ruta.$archivo->nombre) ){
                    Yii::app()->getRequest()->sendFile( $archivo->nombre, file_get_contents(YiiBase::getPathOfAlias('webroot').$archivo->ruta.$archivo->nombre ) );
        }
    }
    
    public function eliminarArchivo($nuevoArchivo){
        
        $archivo = $nuevoArchivo;                
        $archivoId = $archivo->id;
        unlink(Yii::getPathOfAlias('webroot').$archivo->ruta.$archivo->nombre); 

        $command = Yii::app()->db->createCommand("CALL sp_components_eliminar_archivo(:archivoId)");
        $command->bindParam(':archivoId',$archivoId);	
        $command->execute();

    }
    
}
?>
