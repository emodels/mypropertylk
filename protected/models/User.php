<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $fname
 * @property string $lname
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $passwordconf
 * @property integer $usertype
 * @property integer $parentuser
 * @property integer $status
 * @property string $userimage
 *
 * The followings are the available model relations:
 * @property Advertising[] $advertisings
 * @property Homeideas[] $homeideases
 * @property Property[] $properties
 * @property Transactions[] $transactions
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fname, lname, phone, address, email, username, password, passwordconf, usertype, parentuser, status, userimage', 'required'),
			array('usertype, parentuser, status', 'numerical', 'integerOnly'=>true),
			array('fname, lname, email', 'length', 'max'=>100),
			array('phone, password, passwordconf', 'length', 'max'=>20),
			array('address, userimage', 'length', 'max'=>200),
			array('username', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fname, lname, phone, address, email, username, password, passwordconf, usertype, parentuser, status, userimage', 'safe', 'on'=>'search'),
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
			'advertisings' => array(self::HAS_MANY, 'Advertising', 'advertiser'),
			'homeideases' => array(self::HAS_MANY, 'Homeideas', 'userid'),
			'properties' => array(self::HAS_MANY, 'Property', 'agent'),
			'transactions' => array(self::HAS_MANY, 'Transactions', 'user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fname' => 'Fname',
			'lname' => 'Lname',
			'phone' => 'Phone',
			'address' => 'Address',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
			'passwordconf' => 'Passwordconf',
			'usertype' => 'Usertype',
			'parentuser' => 'Parentuser',
			'status' => 'Status',
			'userimage' => 'Userimage',
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
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('passwordconf',$this->passwordconf,true);
		$criteria->compare('usertype',$this->usertype);
		$criteria->compare('parentuser',$this->parentuser);
		$criteria->compare('status',$this->status);
		$criteria->compare('userimage',$this->userimage,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getFullName()
    {
        return $this->fname.' '.$this->lname;
	}
}