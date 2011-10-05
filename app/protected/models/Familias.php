<?php

/**
 * This is the model class for table "dsr_SNCP_familias".
 *
 * The followings are the available columns in table 'dsr_SNCP_familias':
 * @property integer $id
 * @property string $nombre
 * @property string $nombre_gal
 *
 * The followings are the available model relations:
 * @property DsrSNCPCualificaciones[] $dsrSNCPCualificaciones
 */
class Familias extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Familias the static model class
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
		return 'dsr_SNCP_familias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_gal', 'required'),
			array('nombre, nombre_gal', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, nombre_gal', 'safe', 'on'=>'search'),
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
			'cualificaciones' => array(self::HAS_MANY, 'Cualificacións', 'id_familia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nome',
			'nombre_gal' => 'Nome Gal',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nombre_gal',$this->nombre_gal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'		=> array('defaultOrder'=>'nombre ASC'),
		));
	}
}
