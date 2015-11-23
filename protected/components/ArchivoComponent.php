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
            $command = Yii::app()->db->createCommand("CALL sp_components_agregar_archivo_herramienta(
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
    
    public function agregarArchivo($nuevoArchivoPost,$nuevoHerramienta) 
    {        
        $archivo = CUploadedFile::getInstancesByName('images');
        foreach ($archivo as $archi){
                   $nombre = $archi->name;
                   $tipo = $archi->type;
                   $tamano = $archi->size;
        }  
        $conexion = Yii::app()->db;

        $institucionNombre = Yii::app()->session['institucionNombre'];
        $repositorio = Yii::app()->session['repositorio'];
        $usuarioId=Yii::app()->user->getId(); 
        $herramientaNombre = $nuevoHerramienta->nombre;
        $herramientaId = $nuevoHerramienta->id;
        $herramientaTabla = $nuevoHerramienta->tableSchema->name;
        $ruta = '/reko-archivos/'.$institucionNombre.'/'.'repositorio-id-'.$repositorio->id.'/'.$herramientaTabla.'/'.$herramientaTabla.'-id-'.$herramientaId.'/';
        $carpeta = Yii::getPathOfAlias('webroot').$ruta;
//      Si no existe la carpeta se crea
        if(!is_dir($carpeta))
        {
            mkdir($carpeta,0,true);
            chmod($carpeta,0755);
        }
        foreach($archivo as $image=>$i)
        {
            $aleatorio = rand(100000,999999);
            //nombre de la imagen
            $img = $aleatorio."-".$i->name;
            
            $this->agregarArchivoProcedure(
                    $img,
                    $tipo,
                    $tamano,
                    $ruta,
                    $usuarioId,
                    $herramientaId,
                    $herramientaTabla
            );            
            $i->saveAs($carpeta.$img);                                
        }        
        return "Erramienta Subida".$herramientaTabla;
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
    
}
?>
