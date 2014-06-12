<?php

/**
 * This is the model class for table "pricelist".
 *
 * The followings are the available columns in table 'pricelist':
 * @property integer $priceid
 * @property string $proptype
 * @property double $price
 * @property string $priceimage
 *
 * The followings are the available model relations:
 * @property Property[] $properties
 */
class Pricelist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pricelist the static model class
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
		return 'pricelist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proptype, price, priceimage', 'required'),
			array('price', 'numerical'),
			array('proptype', 'length', 'max'=>100),
			array('priceimage', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('priceid, proptype, price, priceimage', 'safe', 'on'=>'search'),
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
			'properties' => array(self::HAS_MANY, 'Property', 'pricetype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'priceid' => 'Priceid',
			'proptype' => 'Proptype',
			'price' => 'Price',
			'priceimage' => 'Priceimage',
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

		$criteria->compare('priceid',$this->priceid);
		$criteria->compare('proptype',$this->proptype,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('priceimage',$this->priceimage,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}