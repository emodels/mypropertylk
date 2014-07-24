<?php

/**
 * This is the model class for table "adprice".
 *
 * The followings are the available columns in table 'adprice':
 * @property integer $id
 * @property integer $page
 * @property integer $size
 * @property double $price
 * @property string $adsample
 *
 * The followings are the available model relations:
 * @property Adsizes $size0
 * @property Adpages $page0
 */
class Adprice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Adprice the static model class
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
		return 'adprice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page, size, price, adsample', 'required'),
			array('page, size', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('adsample', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, page, size, price, adsample', 'safe', 'on'=>'search'),
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
			'size0' => array(self::BELONGS_TO, 'Adsizes', 'size'),
			'page0' => array(self::BELONGS_TO, 'Adpages', 'page'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'page' => 'Page',
			'size' => 'Size',
			'price' => 'Price',
			'adsample' => 'Adsample',
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
		$criteria->compare('page',$this->page);
		$criteria->compare('size',$this->size);
		$criteria->compare('price',$this->price);
		$criteria->compare('adsample',$this->adsample,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}