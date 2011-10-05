<?php

/**
 * This is the model class for table "dsr_SNCP_cualificaciones_unidades".
 *
 * The followings are the available columns in table 'dsr_SNCP_cualificaciones_unidades':
 * @property integer $id_cualificacion
 * @property integer $id_unidad
 * @property integer $orden
 */
class CualificacionesUnidades extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CualificacionesUnidades the static model class
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
		return 'dsr_SNCP_cualificaciones_unidades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cualificacion, id_unidad, orden', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cualificacion, id_unidad, orden', 'safe', 'on'=>'search'),
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
			'id_cualificacion' => 'Id Cualificacion',
			'id_unidad' => 'Id Unidad',
			'orden' => 'Orden',
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

		$criteria->compare('id_cualificacion',$this->id_cualificacion);
		$criteria->compare('id_unidad',$this->id_unidad);
		$criteria->compare('orden',$this->orden);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Return the criteria to get the unidades ordered by "orden" asc.
	 * 
	 * @param $id
	 * @return CDbCriteria
	 */
	public static function getCriteriaUnidadesCualidicacion($id)
	{
		$criteria = new CDbCriteria;
		$criteria->join  = 'JOIN dsr_SNCP_cualificaciones_unidades ON (t.id = id_unidad) ';
		$criteria->join .= 'JOIN dsr_SNCP_cualificaciones c ON (id_cualificacion = c.id) ';
		$criteria->condition = 'c.id=:id_cualificacion';
		$criteria->params = array(':id_cualificacion' => (int) $id);
		$criteria->order = 'orden ASC';
		return $criteria;
	}
	
	/**
	 * Return the criteria to get the cualificaciones ordered by "orden" asc.
	 * 
	 * @param $id
	 * @return CDbCriteria
	 */
	public static function getCriteriaCualificacionesUnidad($id)
	{
		$criteria = new CDbCriteria;
		$criteria->join  = 'JOIN dsr_SNCP_cualificaciones_unidades ON (t.id = id_cualificacion) ';
		$criteria->join .= 'JOIN dsr_SNCP_unidades c ON (id_unidad = c.id) ';
		$criteria->condition = 'c.id=:id_unidad';
		$criteria->params = array(':id_unidad' => (int) $id);
		$criteria->order = 'orden ASC';
		return $criteria;
	}
}