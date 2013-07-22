<?php

/**
 * This is the model class for table "profiles_skills".
 *
 * The followings are the available columns in table 'profiles_skills':
 * @property string $id
 * @property string $profileID
 * @property string $category
 * @property string $skills
 *
 * The followings are the available model relations:
 * @property Profiles $profile
 */
class Skill extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Skill the static model class
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
		return 'profiles_skills';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('profileID, category, skills', 'required'),
			array('profileID', 'length', 'max'=>10),
			array('category', 'length', 'max'=>128),
			array('skills', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, profileID, category, skills', 'safe', 'on'=>'search'),
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
			'category' => 'Category',
			'skills' => 'Skills',
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
		$criteria->compare('category',$this->category,true);
		$criteria->compare('skills',$this->skills,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}