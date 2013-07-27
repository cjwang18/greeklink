<?php

/**
 * This is the model class for table "profiles_activities".
 *
 * The followings are the available columns in table 'profiles_activities':
 * @property string $id
 * @property string $profileID
 * @property string $name
 * @property string $description
 * @property string $beginMonth
 * @property string $beginYear
 * @property string $endMonth
 * @property string $endYear
 *
 * The followings are the available model relations:
 * @property Profiles $profile
 */
class Activity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Activity the static model class
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
		return 'profiles_activities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('profileID, name, description, beginMonth, beginYear, endMonth, endYear', 'required'),
			array('present', 'numerical', 'integerOnly'=>true),
			array('profileID, beginMonth, endMonth', 'length', 'max'=>10),
			array('name', 'length', 'max'=>128),
			array('beginYear, endYear', 'length', 'max'=>4),
			array('description, beginMonth, endMonth', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, profileID, name, description, beginMonth, beginYear, endMonth, endYear, present', 'safe', 'on'=>'search'),
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
			'profile' => array(self::BELONGS_TO, 'Profile', 'profileID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'profileID' => 'Profile',
			'name' => 'Name',
			'description' => 'Description',
			'beginMonth' => 'Begin Month',
			'beginYear' => 'Begin Year',
			'endMonth' => 'End Month',
			'endYear' => 'End Year',
			'present' => 'Present',
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
		$criteria->compare('profileID',$this->profileID,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('beginMonth',$this->beginMonth,true);
		$criteria->compare('beginYear',$this->beginYear,true);
		$criteria->compare('endMonth',$this->endMonth,true);
		$criteria->compare('endYear',$this->endYear,true);
		$criteria->compare('present',$this->present);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getMonthOptions() {
		return array(
			'January' => 'January',
			'February' => 'February',
			'March' => 'March',
			'April' => 'April',
			'May' => 'May',
			'June' => 'June',
			'July' => 'July',
			'August' => 'August',
			'September' => 'September',
			'October' => 'October',
			'November' => 'November',
			'December' => 'December',
		);
	}

	public function beforeSave() {
		$this->profileID = Yii::app()->user->pid;
		return parent::beforeSave();
	}

	public function behaviors(){
		return array('ESaveRelatedBehavior' => array(
			'class' => 'profile.components.ESaveRelatedBehavior')
		);
	}
}