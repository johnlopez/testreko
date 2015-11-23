<?php

/**
 * This is the model class for table "archivo".
 *
 * The followings are the available columns in table 'archivo':
 * @property integer $id
 * @property string $nombre
 * @property string $mime_type
 * @property integer $tamano
 * @property string $ruta
 * @property integer $usuario_id
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $fecha_acceso
 * @property string $fecha_eliminacion
 * @property integer $lectura
 * @property integer $escritura
 * @property integer $descarga
 * @property integer $eliminacion
 * @property integer $contenedor_id
 * @property string $contenedor_tabla
 */
class Archivo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'archivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tamano, usuario_id, lectura, escritura, descarga, eliminacion, contenedor_id', 'numerical', 'integerOnly'=>true),
			array('nombre, contenedor_tabla', 'length', 'max'=>255),
			array('mime_type, ruta, fecha_creacion, fecha_modificacion, fecha_acceso, fecha_eliminacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, mime_type, tamano, ruta, usuario_id, fecha_creacion, fecha_modificacion, fecha_acceso, fecha_eliminacion, lectura, escritura, descarga, eliminacion, contenedor_id, contenedor_tabla', 'safe', 'on'=>'search'),
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
			'mime_type' => 'Mime Type',
			'tamano' => 'Tamano',
			'ruta' => 'Ruta',
			'usuario_id' => 'Usuario',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'fecha_acceso' => 'Fecha Acceso',
			'fecha_eliminacion' => 'Fecha Eliminacion',
			'lectura' => 'Lectura',
			'escritura' => 'Escritura',
			'descarga' => 'Descarga',
			'eliminacion' => 'Eliminacion',
			'contenedor_id' => 'Contenedor',
			'contenedor_tabla' => 'Contenedor Tabla',
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
		$criteria->compare('mime_type',$this->mime_type,true);
		$criteria->compare('tamano',$this->tamano);
		$criteria->compare('ruta',$this->ruta,true);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('fecha_acceso',$this->fecha_acceso,true);
		$criteria->compare('fecha_eliminacion',$this->fecha_eliminacion,true);
		$criteria->compare('lectura',$this->lectura);
		$criteria->compare('escritura',$this->escritura);
		$criteria->compare('descarga',$this->descarga);
		$criteria->compare('eliminacion',$this->eliminacion);
		$criteria->compare('contenedor_id',$this->contenedor_id);
		$criteria->compare('contenedor_tabla',$this->contenedor_tabla,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Archivo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
