<?php

/**
 * This is the model class for table "modulo".
 *
 * The followings are the available columns in table 'modulo':
 * @property integer $id
 * @property string $nombre
 * @property string $codigo
 * @property string $descripcion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property integer $estado_modulo_id
 * @property integer $entidad_id
 * @property integer $institucion_id
 */
class Modulo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'modulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estado_modulo_id, entidad_id, institucion_id', 'numerical', 'integerOnly'=>true),
			array('nombre, codigo', 'length', 'max'=>45),
			array('descripcion, fecha_creacion, fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, codigo, descripcion, fecha_creacion, fecha_modificacion, estado_modulo_id, entidad_id, institucion_id', 'safe', 'on'=>'search'),
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
			'codigo' => 'Codigo',
			'descripcion' => 'Descripcion',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'estado_modulo_id' => 'Estado Modulo',
			'entidad_id' => 'Entidad',
			'institucion_id' => 'Institucion',
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
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('estado_modulo_id',$this->estado_modulo_id);
		$criteria->compare('entidad_id',$this->entidad_id);
		$criteria->compare('institucion_id',$this->institucion_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Modulo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function listaModulosInstitucion($nuevoInstitucionId) {        
            $command = Yii::app()->db->createCommand("CALL sp_repositorio_lista_modulos_institucion(:nuevoInstitucionId)");
            $command->bindParam(':nuevoInstitucionId',$nuevoInstitucionId);	
            $resultado = $command->queryAll();        
            return $resultado;       
        }           
}
