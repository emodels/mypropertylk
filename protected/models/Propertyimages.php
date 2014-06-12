<?php

/**
 * This is the model class for table "propertyimages".
 *
 * The followings are the available columns in table 'propertyimages':
 * @property integer $id
 * @property integer $propertyid
 * @property string $imagename
 * @property integer $imagetype
 *
 * The followings are the available model relations:
 * @property Property $property
 */
class Propertyimages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Propertyimages the static model class
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
		return 'propertyimages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('propertyid, imagename, imagetype', 'required'),
			array('propertyid, imagetype', 'numerical', 'integerOnly'=>true),
			array('imagename', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, propertyid, imagename, imagetype', 'safe', 'on'=>'search'),
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
			'imagename' => 'Imagename',
			'imagetype' => 'Imagetype',
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
		$criteria->compare('imagename',$this->imagename,true);
		$criteria->compare('imagetype',$this->imagetype);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}