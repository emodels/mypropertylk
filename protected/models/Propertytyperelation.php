<?php

/**
 * This is the model class for table "propertytyperelation".
 *
 * The followings are the available columns in table 'propertytyperelation':
 * @property integer $id
 * @property integer $propertyid
 * @property integer $typeid
 *
 * The followings are the available model relations:
 * @property Property $property
 * @property Propertytype $type
 */
class Propertytyperelation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Propertytyperelation the static model class
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
		return 'propertytyperelation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('propertyid, typeid', 'required'),
			array('propertyid, typeid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, propertyid, typeid', 'safe', 'on'=>'search'),
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
			'property' => array(self::BELONGS_TO, 'Property', 'propertyid'),
			'type' => array(self::BELONGS_TO, 'Propertytype', 'typeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'propertyid' => 'Propertyid',
			'typeid' => 'Typeid',
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
		$criteria->compare('propertyid',$this->propertyid);
		$criteria->compare('typeid',$this->typeid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}