<?php

/**
 * This is the model class for table "profiles".
 *
 * The followings are the available columns in table 'profiles':
 * @property string $profileID
 * @property string $userID
 * @property string $profilePic
 * @property string $chapter
 * @property string $intramural
 * @property string $currentCity
 * @property string $hometown
 * @property string $relationship
 * @property string $interests
 * @property string $music
 * @property string $movies
 * @property string $tv
 * @property string $books
 * @property string $games
 * @property string $phone
 * @property string $facebook
 * @property string $twitter
 * @property string $website
 * @property integer $graduationMonth
 * @property string $graduationYear
 * @property string $gpa
 * @property string $honors
 * @property string $relevantCoursework
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property ProfilesActivities[] $profilesActivities
 * @property ProfilesCommitteeInvolvement[] $profilesCommitteeInvolvements
 * @property ProfilesConcentrations[] $profilesConcentrations
 * @property ProfilesFraternalFamily[] $profilesFraternalFamilies
 * @property ProfilesPositions[] $profilesPositions
 * @property ProfilesSkills[] $profilesSkills
 * @property ProfilesWorkExperience[] $profilesWorkExperiences
 */
class Profile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profile the static model class
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
		return 'profiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('graduationMonth', 'numerical', 'integerOnly'=>true),
			array('userID', 'length', 'max'=>11),
			array('profilePic, chapter', 'length', 'max'=>128),
			array('currentCity, hometown, facebook, twitter, website', 'length', 'max'=>64),
			array('relationship', 'length', 'max'=>16),
			array('phone', 'length', 'max'=>10),
			array('graduationYear', 'length', 'max'=>4),
			array('gpa', 'length', 'max'=>3),
			array('userID, profilePic, intramural, interests, music, movies, tv, books, games, honors, relevantCoursework', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('profileID, userID, profilePic, chapter, intramural, currentCity, hometown, relationship, interests, music, movies, tv, books, games, phone, facebook, twitter, website, graduationMonth, graduationYear, gpa, honors, relevantCoursework', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'userID'),
			'profilesActivities' => array(self::HAS_MANY, 'ProfilesActivities', 'profileID'),
			'profilesCommitteeInvolvements' => array(self::HAS_MANY, 'ProfilesCommitteeInvolvement', 'profileID'),
			'profilesConcentrations' => array(self::HAS_MANY, 'ProfilesConcentrations', 'profileID'),
			'profilesFraternalFamilies' => array(self::HAS_MANY, 'ProfilesFraternalFamily', 'profileID'),
			'profilesPositions' => array(self::HAS_MANY, 'ProfilesPositions', 'profileID'),
			'profilesSkills' => array(self::HAS_MANY, 'ProfilesSkills', 'profileID'),
			'profilesWorkExperiences' => array(self::HAS_MANY, 'ProfilesWorkExperience', 'profileID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'profileID' => 'Profile',
			'userID' => 'User',
			'profilePic' => 'Profile Picture',
			'chapter' => 'Chapter',
			'intramural' => 'Intramural Involvement',
			'currentCity' => 'Current City',
			'hometown' => 'Hometown',
			'relationship' => 'Relationship',
			'interests' => 'Interests',
			'music' => 'Music',
			'movies' => 'Movies',
			'tv' => 'TV',
			'books' => 'Books',
			'games' => 'Games',
			'phone' => 'Phone',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'website' => 'Website',
			'graduationMonth' => 'Graduation Month',
			'graduationYear' => 'Graduation Year',
			'gpa' => 'GPA',
			'honors' => 'Honors',
			'relevantCoursework' => 'Relevant Coursework',
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

		$criteria->compare('profileID',$this->profileID,true);
		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('profilePic',$this->profilePic,true);
		$criteria->compare('chapter',$this->chapter,true);
		$criteria->compare('intramural',$this->intramural,true);
		$criteria->compare('currentCity',$this->currentCity,true);
		$criteria->compare('hometown',$this->hometown,true);
		$criteria->compare('relationship',$this->relationship,true);
		$criteria->compare('interests',$this->interests,true);
		$criteria->compare('music',$this->music,true);
		$criteria->compare('movies',$this->movies,true);
		$criteria->compare('tv',$this->tv,true);
		$criteria->compare('books',$this->books,true);
		$criteria->compare('games',$this->games,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('graduationMonth',$this->graduationMonth);
		$criteria->compare('graduationYear',$this->graduationYear,true);
		$criteria->compare('gpa',$this->gpa,true);
		$criteria->compare('honors',$this->honors,true);
		$criteria->compare('relevantCoursework',$this->relevantCoursework,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}