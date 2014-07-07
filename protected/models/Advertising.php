<?php

/**
 * This is the model class for table "advertising".
 *
 * The followings are the available columns in table 'advertising':
 * @property integer $id
 * @property integer $page
 * @property integer $size
 * @property integer $advertiser
 * @property string $adimage
 * @property string $adlink
 * @property string $entrydate
 * @property string $expiredate
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Adpages $page0
 * @property Adsizes $size0
 * @property User $advertiser0
 */
class Advertising extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Advertising the static model class
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
		return 'advertising';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page, size, advertiser, adimage, adlink, entrydate, expiredate, status', 'required'),
			array('page, size, advertiser, status', 'numerical', 'integerOnly'=>true),
			array('adimage, adlink', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, page, size, advertiser, adimage, adlink, entrydate, expiredate, status', 'safe', 'on'=>'search'),
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
			'page0' => array(self::BELONGS_TO, 'Adpages', 'page'),
			'size0' => array(self::BELONGS_TO, 'Adsizes', 'size'),
			'advertiser0' => array(self::BELONGS_TO, 'User', 'advertiser'),
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
			'advertiser' => 'Advertiser',
			'adimage' => 'Adimage',
			'adlink' => 'Adlink',
			'entrydate' => 'Entrydate',
			'expiredate' => 'Expiredate',
			'status' => 'Status',
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
		$criteria->compare('advertiser',$this->advertiser);
		$criteria->compare('adimage',$this->adimage,true);
		$criteria->compare('adlink',$this->adlink,true);
		$criteria->compare('entrydate',$this->entrydate,true);
		$criteria->compare('expiredate',$this->expiredate,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}