<?php

/**
 * This is the model class for table "profiles_positions".
 *
 * The followings are the available columns in table 'profiles_positions':
 * @property string $ID
 * @property string $profileID
 * @property string $title
 * @property string $description
 * @property string $beginSemester
 * @property string $beginYear
 * @property string $endSemester
 * @property string $endYear
 *
 * The followings are the available model relations:
 * @property Profiles $profile
 */
class Position extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Position the static model class
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
		return 'profiles_positions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profileID, title, description, beginSemester, beginYear, endSemester, endYear', 'required'),
			array('profileID', 'length', 'max'=>10),
			array('title', 'length', 'max'=>128),
			array('beginSemester, endSemester', 'length', 'max'=>8),
			array('beginYear, endYear', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, profileID, title, description, beginSemester, beginYear, endSemester, endYear', 'safe', 'on'=>'search'),
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
			'profile' => array(self::BELONGS_TO, 'Profiles', 'profileID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'profileID' => 'Profile',
			'title' => 'Title',
			'description' => 'Description',
			'beginSemester' => 'Begin Semester',
			'beginYear' => 'Begin Year',
			'endSemester' => 'End Semester',
			'endYear' => 'End Year',
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

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('profileID',$this->profileID,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('beginSemester',$this->beginSemester,true);
		$criteria->compare('beginYear',$this->beginYear,true);
		$criteria->compare('endSemester',$this->endSemester,true);
		$criteria->compare('endYear',$this->endYear,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}