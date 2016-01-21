<?php

/**
 * This is the model class for table "configuracion_foro".
 *
 * The followings are the available columns in table 'configuracion_foro':
 * @property integer $id
 * @property integer $cantidad_post
 * @property integer $foro_id
 */
class ConfiguracionForo extends CActiveRecord
{
	public $llaveConfiguracionForo;
  
	public function tableName()
	{
		return 'configuracion_foro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('foro_id', 'required'),
			array('cantidad_post, foro_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cantidad_post, foro_id', 'safe', 'on'=>'search'),
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
			'cantidad_post' => 'Cantidad Post',
			'foro_id' => 'Foro',
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
		$criteria->compare('cantidad_post',$this->cantidad_post);
		$criteria->compare('foro_id',$this->foro_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConfiguracionForo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function agregarConfiguracion($cantidadPost,$foroId) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_repositorio_agregar_configuracion_foro(:cantidad_post,:foro_id, @llave_id)");
            $comando->bindParam(':cantidad_post', $cantidadPost);
            $comando->bindParam(':foro_id', $foroId);
            $this->llaveConfiguracionForo = Yii::app()->db->createCommand("select @llave_id as result;")->queryScalar();
            $comando->execute();   
        }
        
        public function listarConfiguracionPorForo($idForo) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_repositorio_listar_configuracion_por_foro(:foroId)");
            $comando->bindParam(':foroId', $idForo);
            return $comando->queryAll();
        }
        
        public function eliminarFisicoConfiguracionForo($idForos) {
            
            try{
                $comando = Yii::app()->db->createCommand("CALL sp_repositorio_eliminado_fisico_configuracion_foro(:id_foro)");
                $comando->bindParam('id_foro', $idForos);
                $comando->execute();
                echo 'eliminado';
            }
            
            catch(Exception $e){
                "Error desde modelo: ".$e->getMessage();
            }
        }
        
        public function configurarMaximoDePost($param) {
            
        }
}
