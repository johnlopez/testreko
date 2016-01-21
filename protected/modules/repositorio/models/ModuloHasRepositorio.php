<?php

/**
 * This is the model class for table "modulo_has_repositorio".
 *
 * The followings are the available columns in table 'modulo_has_repositorio':
 * @property integer $modulo_id
 * @property integer $repositorio_id
 */
class ModuloHasRepositorio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'modulo_has_repositorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modulo_id, repositorio_id', 'required'),
			array('modulo_id, repositorio_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('modulo_id, repositorio_id', 'safe', 'on'=>'search'),
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
			'modulo_id' => 'Modulo',
			'repositorio_id' => 'Repositorio',
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

		$criteria->compare('modulo_id',$this->modulo_id);
		$criteria->compare('repositorio_id',$this->repositorio_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ModuloHasRepositorio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function asignaRepositorioModulo($listaRepositorioId,$nuevoModuloId) {
            $lista = implode(',', $listaRepositorioId);
            var_dump($lista);
            $listaLargo = count($listaRepositorioId);        

            $command = Yii::app()->db->createCommand("CALL sp_repositorio_asignar_repositorio_a_modulo(:listaRepositorioId,:listaLargo,:nuevoModuloId)");
            $command->bindParam(':listaRepositorioId',$lista);
            $command->bindParam(':listaLargo',$listaLargo);
            $command->bindParam(':nuevoModuloId',$nuevoModuloId);
            $resultado = $command->execute();        
            return $resultado;
        }
        
        public function listaModuloRepositorio($nuevoModuloId) {        
            $command = Yii::app()->db->createCommand("CALL sp_repositorio_lista_modulo_repositorio(:nuevoModuloId)");
            $command->bindParam(':nuevoModuloId',$nuevoModuloId);	
            $resultado = $command->queryAll();        
            return $resultado;       
        }
        
        public function desasignaModuloRepositorio($listaModuloRepositorio,$nuevoModuloId) {
            $lista = implode(',', $listaModuloRepositorio);
            var_dump($lista);
            $listaLen = count($listaModuloRepositorio);        

            $command = Yii::app()->db->createCommand("CALL sp_repositorio_desasignar_repositorio_a_modulo(:listaRepositorioId,:listaLargo,:nuevoModuloId)");
            $command->bindParam(':listaRepositorioId',$lista);
            $command->bindParam(':listaLargo',$listaLen);
            $command->bindParam(':nuevoModuloId',$nuevoModuloId);
            $resultado = $command->execute();        
            return $resultado;
        }
        
        public function listaModuloRepositorioAula($nuevoModuloId) {        
            $command = Yii::app()->db->createCommand("CALL sp_repositorio_lista_modulo_repositorio_aula(:nuevoModuloId)");
            $command->bindParam(':nuevoModuloId',$nuevoModuloId);	
            $resultado = $command->queryAll();        
            return $resultado;       
        }
}
