<?php

/**
 * This is the model class for table "dsr_SNCP_unidades".
 *
 * The followings are the available columns in table 'dsr_SNCP_unidades':
 * @property integer $id
 * @property string $codigo
 * @property integer $nivel
 * @property string $titulo
 * @property string $titulo_gal
 * @property string $medios
 * @property string $productos
 * @property string $informacion
 */
class Unidades extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Unidades the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dsr_SNCP_unidades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo_gal', 'required'),
			array('nivel', 'numerical', 'integerOnly'=>true),
			array('codigo', 'length', 'max'=>10),
			array('titulo, titulo_gal', 'length', 'max'=>500),
			array('cualificaciones', 'validateCualificaciones'),
			array('medios, productos, informacion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, codigo, nivel, titulo, titulo_gal, medios, productos, informacion', 'safe', 'on'=>'search'),
		);
	}
	
	/**
	 * Validate the Cualificaciones.
	 * This is the 'validateCualificaciones' validator as declared in rules().
	 */
	public function validateCualificaciones($attribute,$params)
	{
		if(!(isset($_POST['Unidades']['cualificaciones']) && count($_POST['Unidades']['cualificaciones'] > 0)))
		{
			$this->addError('cualificaciones','Cualificacións non puede ser nulo.');
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cualificaciones' => array(self::MANY_MANY, 'Cualificaciones', 
										'dsr_SNCP_cualificaciones_unidades(id_unidad, id_cualificacion)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codigo' => 'Código',
			'nivel' => 'Nivel',
			'titulo' => 'Título',
			'titulo_gal' => 'Título Gal',
			'medios' => 'Medios',
			'productos' => 'Produtos',
			'informacion' => 'Información',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('nivel',$this->nivel);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('titulo_gal',$this->titulo_gal,true);
		$criteria->compare('medios',$this->medios,true);
		$criteria->compare('productos',$this->productos,true);
		$criteria->compare('informacion',$this->informacion,true);
		
		if(isset($_GET['Unidades']['cualificacion']) && !empty($_GET['Unidades']['cualificacion']))
		{
			$criteria->join = 'JOIN dsr_SNCP_cualificaciones_unidades ON (t.id = id_unidad)';
			$criteria->addCondition('id_cualificacion=:id_cualificacion');
			$criteria->params += array(':id_cualificacion' => $_GET['Unidades']['cualificacion']);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'		=> array('defaultOrder'=>'titulo ASC'),
		));
	}
}
