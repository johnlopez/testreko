<?php

/**
 * This is the model class for table "glosario_termino_definicion".
 *
 * The followings are the available columns in table 'glosario_termino_definicion':
 * @property integer $id
 * @property string $termino
 * @property string $definicion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $fecha_acceso
 * @property string $fecha_eliminacion
 * @property integer $glosario_id
 */
class GlosarioTerminoDefinicion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'glosario_termino_definicion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('glosario_id', 'numerical', 'integerOnly'=>true),
			array('termino', 'length', 'max'=>45),
			array('definicion, fecha_creacion, fecha_modificacion, fecha_acceso, fecha_eliminacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, termino, definicion, fecha_creacion, fecha_modificacion, fecha_acceso, fecha_eliminacion, glosario_id', 'safe', 'on'=>'search'),
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
			'termino' => 'Termino',
			'definicion' => 'Definicion',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'fecha_acceso' => 'Fecha Acceso',
			'fecha_eliminacion' => 'Fecha Eliminacion',
			'glosario_id' => 'Glosario',
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
		$criteria->compare('termino',$this->termino,true);
		$criteria->compare('definicion',$this->definicion,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('fecha_acceso',$this->fecha_acceso,true);
		$criteria->compare('fecha_eliminacion',$this->fecha_eliminacion,true);
		$criteria->compare('glosario_id',$this->glosario_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GlosarioTerminoDefinicion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function listaGlosarioTerminoDefinicion ($nuevoGlosarioId) {        
            $command = Yii::app()->db->createCommand("CALL sp_repositorio_lista_glosario_termino_definicion(:nuevoGlosarioId)");
            $command->bindParam(':nuevoGlosarioId',$nuevoGlosarioId);   
            $resultado = $command->queryAll();        
            return $resultado;       
        }
        
        public function agregarGlosarioTerminoDefinicion (
            $nuevoGlosarioId,
            $nuevoTermino,
            $nuevoDefinicion                  
        )
        {
            $command = Yii::app()->db->createCommand("CALL sp_repositorio_agregar_glosario_termino_definicion(
                :nuevoGlosarioId,
                :nuevoTermino,
                :nuevoDefinicion    
            )");
            $command->bindParam(':nuevoGlosarioId',$nuevoGlosarioId);
            $command->bindParam(':nuevoTermino',$nuevoTermino);
            $command->bindParam(':nuevoDefinicion',$nuevoDefinicion);
            $command->execute();
            return $command;
        }
}
