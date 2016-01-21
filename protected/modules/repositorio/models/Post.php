<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $id
 * @property string $mensaje
 * @property integer $leido
 * @property string $ip
 * @property string $host
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $fecha_eliminacion
 * @property string $fecha_acceso
 * @property integer $post_id
 * @property integer $foro_id
 */
class Post extends CActiveRecord
{
        public $llaveIdPost;
        private $_elements = array();


        public function tableName()
	{
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, foro_id', 'required'),
			array('id, leido, post_id, foro_id', 'numerical', 'integerOnly'=>true),
			array('ip, host', 'length', 'max'=>45),
			array('mensaje, fecha_creacion, fecha_modificacion, fecha_eliminacion, fecha_acceso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mensaje, leido, ip, host, fecha_creacion, fecha_modificacion, fecha_eliminacion, fecha_acceso, post_id, foro_id', 'safe', 'on'=>'search'),
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
			'mensaje' => 'Mensaje',
			'leido' => 'Leido',
			'ip' => 'Ip',
			'host' => 'Host',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'fecha_eliminacion' => 'Fecha Eliminacion',
			'fecha_acceso' => 'Fecha Acceso',
			'post_id' => 'Post',
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
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('leido',$this->leido);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('host',$this->host,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('fecha_eliminacion',$this->fecha_eliminacion,true);
		$criteria->compare('fecha_acceso',$this->fecha_acceso,true);
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('foro_id',$this->foro_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function agregarPost($mensaje,$ip,$host,$postId,$foroId,$usuarioId,$rolUsuarioId) {
            
            try{
                $comando = Yii::app()->db->createCommand("CALL sp_repositorio_agregar_post(:mensaje,:ip,:host,:post_id,:foro_id,:usuario_id,:rol_usuario_id,@llave_id)");

                $comando->bindParam(':mensaje', $mensaje);
                $comando->bindParam(':ip', $ip);
                $comando->bindParam(':host', $host);
                $comando->bindParam(':post_id', $postId);
                $comando->bindParam(':foro_id', $foroId);
                $comando->bindParam(':usuario_id', $usuarioId);
                $comando->bindParam(':rol_usuario_id', $rolUsuarioId);
                

                $comando->execute();
                echo 'post agregado con exito !!!';
                $this->llaveIdPost = Yii::app()->db->createCommand("select @llave_id as result;")->queryScalar();
            }
            
            catch (Exception $e){
                echo $e->getMessage();
            }
                    
        }
        
        public function listarPostPorForo($idForo) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_repositorio_listar_post_por_foro(:id)");
            $comando->bindParam(':id', $idForo);
            return $comando->queryAll();  
        }
        
        public function eliminarFisicoPost($idPost) {
            
            $comando = Yii::app()->db->createCommand("CALL sp_repositorio_eliminado_fisico_post(:id)");
            $comando->bindParam(':id', $idPost);
            $comando->execute();
            return $comando;
        }
   
        
        public function listarPost(){
            
            $query = Yii::app()->db->createCommand("CALL sp_repositorio_listar_todos_post()");
            
            $this->_elements["masters"] = $this->_elements["childrens"] = array();

		if($query->queryAll() > 0)
		{
			foreach($query->query() as $element)
			{
				if($element["post_id"] == 0)
				{
					array_push($this->_elements["masters"], $element);
				}
				else
				{
					array_push($this->_elements["childrens"], $element);
				}
			}
		}
		return $this->_elements;     
        }
        
        public static function nested($rows = array(), $postId = 0)
	{
		$html = "";
		if(!empty($rows))
		{
			$html.="<ul>";
			foreach($rows as $row)
			{
				if($row["post_id"] == $postId)
				{
                                     
                                    if($row["tiene_hijos"] == 0)
                                    {
						$html.="<ul class='comments-list reply-list'>";
                                                $html.="<li>";
                                                $html.="<div class='comment-avatar'><img src='../../css/img2.jpg' alt=''></div>";
                                                $html.="<div class='comment-box'>";									
                                                $html.="<div class='comment-head'>";
                                                $html.="<h6 class='comment-name'>Lorena Rojeros</h6>";
                                                $html.="<span>";
                                                $html.= CHtml::link('Agregar comentario', array('post/create'));
                                                $html.="</span>";
                                                $html.="<span>".$row['id']."</span>";
                                                $html.="<i class='fa fa-reply'></i>";
                                                $html.="<i class='fa fa-heart'></i>";
                                                $html.="</div>";
                                                $html.="<div class='comment-content'>".$row['mensaje']."</div>";
                                                $html.="</div>";			
                                                $html.="</li>";
                                    }
						
                                    $html.=self::nested($rows, $row["id"]);
                                    $html.="</ul>";
				}
			}
			$html.="</ul>";
		}
		return $html;
	}
}



