<?php

/**
 * This is the model class for table "recepcion_trabajo".
 *
 * The followings are the available columns in table 'recepcion_trabajo':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $fecha_eliminacion
 * @property string $fecha_acceso
 */
class RecepcionTrabajo extends CActiveRecord
{
        public $lastInsertRecepcionTrabajoId;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recepcion_trabajo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'length', 'max'=>45),
			array('descripcion, fecha_creacion, fecha_modificacion, fecha_eliminacion, fecha_acceso,entrega_publica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, fecha_creacion, fecha_modificacion, fecha_eliminacion, fecha_acceso, entrega_publica', 'safe', 'on'=>'search'),
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
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'fecha_eliminacion' => 'Fecha Eliminacion',
			'fecha_acceso' => 'Fecha Acceso',
                        'entrega_publica'=> 'Entrega Publica',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('fecha_eliminacion',$this->fecha_eliminacion,true);
		$criteria->compare('fecha_acceso',$this->fecha_acceso,true);
                $criteria->compare('entrega_publica',$this->entrega_publica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RecepcionTrabajo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function agregarRecepcionTrabajoRepositorioTroncal(
                $nuevoRepositorioId,
                $nuevoRecepcionTrabajo                
        )
        {
            $nuevoRecepcionTrabajoId = $nuevoRecepcionTrabajo->id;
            $nuevoRecepcionTrabajoNombre = $nuevoRecepcionTrabajo->nombre; 
            $nuevoRecepcionTrabajoDescripcion = $nuevoRecepcionTrabajo->descripcion;
            $nuevoRecepcionTrabajoEntregaPublica = $nuevoRecepcionTrabajo->entrega_publica;
            $nuevoRecursoTabla = $nuevoRecepcionTrabajo->tableSchema->name;
            $command = Yii::app()->db->createCommand("CALL sp_repositorio_agregar_recepcion_trabajo_repositorio_troncal(
                :nuevoRepositorioId,
                :nuevoRecepcionTrabajoNombre,
                :nuevoRecepcionTrabajoDescripcion,
                :nuevoRecursoTabla,
                :nuevoRecepcionTrabajoEntregaPublica,
                @last_insert_recepcion_trabajo_id)"
            );     
            $command->bindParam(':nuevoRepositorioId',$nuevoRepositorioId);
            $command->bindParam(':nuevoRecepcionTrabajoNombre',$nuevoRecepcionTrabajoNombre);
            $command->bindParam(':nuevoRecepcionTrabajoDescripcion',$nuevoRecepcionTrabajoDescripcion);
            $command->bindParam(':nuevoRecursoTabla',$nuevoRecursoTabla);
            $command->bindParam(':nuevoRecepcionTrabajoEntregaPublica',$nuevoRecepcionTrabajoEntregaPublica);
            
            $command->execute();
            $this->lastInsertRecepcionTrabajoId = Yii::app()->db->createCommand("select @last_insert_recepcion_trabajo_id as result;")->queryScalar();
            
            return $command;
        }
        
        public function listaRecepcionTrabajoRepositorioTroncal($nuevoRepositorioId) {        
            $command = Yii::app()->db->createCommand("CALL sp_repositorio_lista_recepcion_trabajo_repositorio_troncal(:nuevoRepositorioId)");
            $command->bindParam(':nuevoRepositorioId',$nuevoRepositorioId);	
            $resultado = $command->queryAll();        
            return $resultado;       
        }
        public function modificarRecepcionTrabajoRepositorio(
                    $nuevoRecepcionTrabajoId,
                    $nuevoRepositorioId,
                    $nuevoRecepcionTrabajoNombre,
                    $nuevoRecepcionTrabajoDescripcion
        )
        {
            $command = Yii::app()->db->createCommand("CALL sp_repositorio_modificar_recepcion_trabajo_repositorio_troncal(
                :nuevoRecepcionTrabajoId,
                :nuevoRepositorioId,
                :nuevoRecepcionTrabajoNombre,
                :nuevoRecepcionTrabajoDescripcion,                
                @last_insert_recepcion_trabajo_id
            )");              
            $command->bindParam(':nuevoRecepcionTrabajoId',$nuevoRecepcionTrabajoId);
            $command->bindParam(':nuevoRepositorioId',$nuevoRepositorioId);
            $command->bindParam(':nuevoRecepcionTrabajoNombre',$nuevoRecepcionTrabajoNombre);
            $command->bindParam(':nuevoRecepcionTrabajoDescripcion',$nuevoRecepcionTrabajoDescripcion);
            $command->execute();
            $this->lastInsertRecepcionTrabajoId = Yii::app()->db->createCommand("select @last_insert_recepcion_trabajo_id as result;")->queryScalar();

            return $command;
        }
}
