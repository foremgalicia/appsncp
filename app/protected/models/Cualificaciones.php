<?php

/**
 * This is the model class for table "dsr_SNCP_cualificaciones".
 *
 * The followings are the available columns in table 'dsr_SNCP_cualificaciones':
 * @property string $id
 * @property integer $id_familia
 * @property string $codigo
 * @property integer $nivel
 * @property string $titulo
 * @property string $titulo_gal
 *
 * The followings are the available model relations:
 * @property DsrSNCPFamilias $idFamilia
 */
class Cualificaciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cualificaciones the static model class
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
		return 'dsr_SNCP_cualificaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_familia, titulo_gal', 'required'),
			array('id_familia, nivel', 'numerical', 'integerOnly'=>true),
			array('codigo', 'length', 'max'=>10),
			array('titulo, titulo_gal', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_familia, codigo, nivel, titulo, titulo_gal', 'safe', 'on'=>'search'),
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
			'familia' 	=> array(self::BELONGS_TO, 'Familias', 'id_familia'),
			'unidades'	=> array(self::MANY_MANY, 'Unidades', 
									'dsr_SNCP_cualificaciones_unidades(id_cualificacion, id_unidad)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_familia' => 'Id Familia',
			'codigo' => 'Código',
			'nivel' => 'Nivel',
			'titulo' => 'Título',
			'titulo_gal' => 'Título Gal',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_familia',$this->id_familia);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('nivel',$this->nivel);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('titulo_gal',$this->titulo_gal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'		=> array('defaultOrder'=>'titulo ASC'),
		));
	}
}
