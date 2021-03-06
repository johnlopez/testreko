<?php

/**
 * This is the model class for table "link_interes".
 *
 * The followings are the available columns in table 'link_interes':
 * @property integer $id
 * @property string $titulo
 * @property string $nombre
 * @property string $url
 * @property string $descripcion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $fecha_acceso
 * @property integer $tipo_herramienta_id
 */
class LinkInteres extends CActiveRecord
{
	public $lastInsertLinkId;
        
	public function tableName()
	{
		return 'link_interes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_herramienta_id', 'required'),
			array('tipo_herramienta_id', 'numerical', 'integerOnly'=>true),
			array('titulo, nombre', 'length', 'max'=>45),
			array('url', 'length', 'max'=>250),
			array('descripcion, fecha_creacion, fecha_modificacion, fecha_acceso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, nombre, url, descripcion, fecha_creacion, fecha_modificacion, fecha_acceso, tipo_herramienta_id', 'safe', 'on'=>'search'),
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
			'titulo' => 'Titulo',
			'nombre' => 'Nombre',
			'url' => 'Url',
			'descripcion' => 'Descripcion',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
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
	 * @return LinkInteres the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function agregarLinkInteres($titulo,$nombre,$url,$descripcion,$repositorioId,$recursoTabla)
        {
            $comando = Yii::app()->db->createCommand("CALL sp_repositorio_agregar_link_interes( 
                :nuevoTitutlo,
                :nuevoNombre,
                :nuevoUrl,
                :nuevoDescripcion,  
                :nuevoRepositorioId,
                :nuevoRecursoTabla,
                @last_insert_link_id)");
            
            $comando->bindParam(':nuevoTitutlo',$titulo);
            $comando->bindParam(':nuevoNombre',$nombre);
            $comando->bindParam(':nuevoUrl',$url);
            $comando->bindParam(':nuevoDescripcion',$descripcion);
            $comando->bindParam(':nuevoRepositorioId',$repositorioId);
            $comando->bindParam(':nuevoRecursoTabla',$recursoTabla);

            
            $comando->execute();
            $this->lastInsertLinkId = Yii::app()->db->createCommand("select @last_insert_link_id as result;")->queryScalar();
            
        }
        
        public function modificarLinkInteres($id,$titulo,$nombre,$url,$descripcion,$repositorioId)
        {
            $comando = Yii::app()->db->createCommand("CALL sp_repositorio_actualizar_link_interes( 
                :nuevoId,
                :nuevoTitutlo,
                :nuevoNombre,
                :nuevoUrl,
                :nuevoDescripcion,  
                :nuevoRepositorioId,
                @last_insert_link_id)");
            
            $comando->bindParam(':nuevoId',$id);
            $comando->bindParam(':nuevoTitutlo',$titulo);
            $comando->bindParam(':nuevoNombre',$nombre);
            $comando->bindParam(':nuevoUrl',$url);
            $comando->bindParam(':nuevoDescripcion',$descripcion);
            $comando->bindParam(':nuevoRepositorioId',$repositorioId);

            
            $comando->execute();
            $this->lastInsertLinkId = Yii::app()->db->createCommand("select @last_insert_link_id as result;")->queryScalar();
            
        }
        
        public function eliminarFisicoLink($id) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_repositorio_eliminado_fisico_link_interes(:id)");
            $comando->bindParam(':id', $id);
            $comando->execute();
            return $comando;
        }
        
        public function listarLinkInteresPorRepositorio($idRepositorio) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_repositorio_lista_link_interes(:id)");
            $comando->bindParam(':id', $idRepositorio);
            return $comando->queryAll();
        }
        
        
}
