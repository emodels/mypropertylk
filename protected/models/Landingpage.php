<?php

/**
 * This is the model class for table "landingpage".
 *
 * The followings are the available columns in table 'landingpage':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $page_content
 * @property string $background_image
 * @property string $notification_email
 */
class Landingpage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Landingpage the static model class
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
		return 'landingpage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, page_content, background_image, notification_email', 'required'),
			array('title', 'length', 'max'=>200),
			array('description', 'length', 'max'=>500),
			array('background_image, notification_email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, page_content, background_image, notification_email', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'page_content' => 'Page Content',
			'background_image' => 'Background Image',
			'notification_email' => 'Notification Email',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('page_content',$this->page_content,true);
		$criteria->compare('background_image',$this->background_image,true);
		$criteria->compare('notification_email',$this->notification_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}