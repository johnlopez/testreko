<?php

/**
 * This is the model class for table "aula".
 *
 * The followings are the available columns in table 'aula':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 */
class Aula extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aula';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, descripcion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, descripcion', 'safe', 'on'=>'search'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aula the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function listarRolesPorUsuario($id) {
          
            $comando = Yii::app()->db->createCommand("CALL sp_aula_listar_roles_por_usuario(:nuevoId)");
            $comando->bindParam(':nuevoId', $id);
            return $comando->queryAll();
        }
        
        public function listarProgramasPorRol($id,$id2) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_aula_listar_programas_por_rol(:nuevoId,:id_usuario)");
            $comando->bindParam(':nuevoId', $id);
            $comando->bindParam(':id_usuario', $id2);
            return $comando->queryAll();
        }
        
        public function listarModulosPorPrograma($id) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_aula_listar_modulos_por_programa(:nuevoId)");
            $comando->bindParam(':nuevoId', $id);
            return $comando->queryAll();
        }
        
        public function listarSeccionesPorModulo($id) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_aula_listar_secciones_por_modulo(:nuevoId)");
            $comando->bindParam(':nuevoId', $id);
            return $comando->queryAll();
        }
        
         public function listarModulosNoAsignadosAPrograma($idRol,$idUsuario) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_aula_listar_modulos_no_asignados_a_programa(:nuevoIdRol,:nuevoIdUsuario)");
            $comando->bindParam(':nuevoIdRol', $idRol);
            $comando->bindParam(':nuevoIdUsuario', $idUsuario);
            return $comando->queryAll();
        }
        
        
}
