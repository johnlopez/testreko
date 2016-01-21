<?php

/**
 * This is the model class for table "foro".
 *
 * The followings are the available columns in table 'foro':
 * @property integer $id
 * @property string $tema
 * @property string $descripcion
 * @property string $conclusion
 * @property integer $leido
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $fecha_eliminacion
 * @property string $fecha_acceso
 * @property integer $tipo_herramienta_id
 */
class Foro extends CActiveRecord
{
	public $lastInsertForoId;
        
	public function tableName()
	{
		return 'foro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('leido, tipo_herramienta_id', 'numerical', 'integerOnly'=>true),
			array('tema, descripcion, conclusion, fecha_creacion, fecha_modificacion, fecha_eliminacion, fecha_acceso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tema, descripcion, conclusion, leido, fecha_creacion, fecha_modificacion, fecha_eliminacion, fecha_acceso, tipo_herramienta_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tema' => 'Tema',
			'descripcion' => 'Descripcion',
			'conclusion' => 'Conclusion',
			'leido' => 'Leido',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'fecha_eliminacion' => 'Fecha Eliminacion',
			'fecha_acceso' => 'Fecha Acceso',
			'tipo_herramienta_id' => 'Tipo Herramienta',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tema',$this->tema,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('conclusion',$this->conclusion,true);
		$criteria->compare('leido',$this->leido);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('fecha_eliminacion',$this->fecha_eliminacion,true);
		$criteria->compare('fecha_acceso',$this->fecha_acceso,true);
		$criteria->compare('tipo_herramienta_id',$this->tipo_herramienta_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Foro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function agregarForo($tema,$descripcion,$conclusion,$repositorioId,$recursoTabla) {
            
           try{     
                $comando = Yii::app()->db->createCommand("CALL sp_repositorio_agregar_foro(
                         :nuevoTema,
                         :nuevoDescripcion,
                         :nuevoConclusion,
                         :nuevoRepositorioId,
                         :nuevoRecursoTabla,
                         @last_insert_foro_id)");

                $comando->bindParam(':nuevoTema', $tema);
                $comando->bindParam(':nuevoDescripcion', $descripcion);
                $comando->bindParam(':nuevoConclusion', $conclusion);
                $comando->bindParam(':nuevoRepositorioId', $repositorioId);
                $comando->bindParam(':nuevoRecursoTabla', $recursoTabla);

                $comando->execute();
                $this->lastInsertForoId = Yii::app()->db->createCommand("select @last_insert_foro_id as result;")->queryScalar();
                return $comando;
                echo 'Se ha agregado con exito';
                
           }
           
            catch (Exception $e){
               echo  $e->getMessage();
            }
        }
        
         public function modificarForo($id,$repositorioId,$tema,$descripcion,$conclusion) {
            
           try{     
                $comando = Yii::app()->db->createCommand("CALL sp_repositorio_actualizar_foro(
                         :nuevoId,
                         :nuevoRepositorioId,
                         :nuevoTema,
                         :nuevoDescripcion,
                         :nuevoConclusion,
                         @last_insert_foro_id)");

                $comando->bindParam(':nuevoId', $id);
                $comando->bindParam(':nuevoRepositorioId', $repositorioId);
                $comando->bindParam(':nuevoTema', $tema);
                $comando->bindParam(':nuevoDescripcion', $descripcion);
                $comando->bindParam(':nuevoConclusion', $conclusion);
                


                $comando->execute();
                $this->lastInsertForoId = Yii::app()->db->createCommand("select @last_insert_foro_id as result;")->queryScalar();
                return $comando;
                echo 'Se ha modificado con exito';
                
           }
           
            catch (Exception $e){
               echo  $e->getMessage();
            }
        }
        
        public function eliminarFisicoForo($idForo) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_repositorio_eliminado_fisico_foro(:id)");
            $comando->bindParam(':id', $idForo);
            $comando->execute();
            return $comando;
        }
        
        public function listarForosPorRepositorio($idRepositorio) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_repositorio_lista_foros(:id)");
            $comando->bindParam(':id', $idRepositorio);
            return $comando->queryAll();
        }
        
        public function getIP() {
            
            return CHttpRequest::getUserHostAddress();
        }
}
