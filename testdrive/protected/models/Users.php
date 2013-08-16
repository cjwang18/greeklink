<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $userID
 * @property string $name
 * @property string $organization
 * @property string $state
 * @property string $university
 * @property string $birthday
 * @property string $gender
 * @property string $initiationYear
 * @property string $email
 * @property string $password
 */
class Users extends CActiveRecord
{
	// holds the email confirmation word
	public $repeatEmail;

	// holds the password confirmation word
	public $repeatPassword;

	// holds the query string for graduation year
	public $graduationYearSearch;

	// holds the query string for concentration
	public $concentrationSearch;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, organization, state, university, birthday, gender, initiationYear, email, repeatEmail, password, repeatPassword', 'required'),
			array('name, organization, university, email, password', 'length', 'max'=>128),
			array('organization, university, status', 'safe'),
			array('state, gender', 'length', 'max'=>2),
			array('initiationYear', 'length', 'max'=>4),
			array('initiationYear', 'match', 'pattern'=>'/^[0-9]+$/', 'message'=>'Must be a valid year.'),
			array('email, repeatEmail', 'email', 'pattern'=>'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.edu)$/', 'message'=>'Must be a .edu email address.'),
			array('email', 'compare', 'compareAttribute'=>'repeatEmail'),
			array('email', 'unique'),
			array('password', 'compare', 'compareAttribute'=>'repeatPassword'),
			array('birthday', 'type', 'type'=>'date', 'dateFormat'=>'mm/dd/yyyy'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userID, name, organization, state, university, birthday, gender, initiationYear, email, graduationYearSearch, concentrationSearch', 'safe', 'on'=>'search'),
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
			'organizationRel' => array(self::BELONGS_TO, 'Organizations', 'organization'),
			'stateRel' => array(self::BELONGS_TO, 'States', 'state'),
			'universityRel' => array(self::BELONGS_TO, 'Universities', 'university'),
			'comments' => array(self::HAS_MANY, 'Comments', 'author'),
			'linkOwner' => array(self::HAS_MANY, 'Links', 'owner'), // owner is the user
			'links' => array(self::HAS_MANY, 'Links', 'link'), // the user's friend (link)
			'posts' => array(self::HAS_MANY, 'Posts', 'author'),
			'posts1' => array(self::HAS_MANY, 'Posts', 'owner'), // the user whose wall the post belongs to
			'profile' => array(self::HAS_ONE, 'Profile', 'userID'),
			'votes' => array(self::HAS_MANY, 'Votes', 'userID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userID' => 'User',
			'name' => 'Name',
			'organization' => 'Organization',
			'state' => 'State',
			'university' => 'University',
			'birthday' => 'Birthday',
			'gender' => 'Gender',
			'initiationYear' => 'Initiation Year',
			'email' => 'Email',
			'password' => 'Password',
			'status' => 'Verification Status',
			'graduationYearSearch' => 'Graduation Year',
			'concentrationSearch' => 'Concentration',
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
		$criteria->with = array( 'profile' );
		// Only the users who have been approved are searchable
		$criteria->addColumnCondition(array('status'=>'+'));

		$criteria->compare('userID',$this->userID);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('organization',$this->organization,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('university',$this->university,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('initiationYear',$this->initiationYear,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('profile.graduationYear', $this->graduationYearSearch, true);
		$criteria->compare('concentration',$this->concentrationSearch,true);
		$criteria->with = array('profile.profilesConcentrations'=>array('select'=>'profile.profilesConcentrations.concentration','together'=>true,'select'=>false));
		// Setting 'select' to false enables display of all of user's concentrations, not just the ones matched in the query

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function validatePassword($password) // $password is the user input
    {
        // Try to use stronger but system-specific hashes, with a possible fallback to
        // the weaker portable hashes.
        $hasher = new PasswordHash(Yii::app()->params['phpass']['iteration_count_log2'], Yii::app()->params['phpass']['portable_hashes']);
        return $hasher->checkPassword($password, $this->password);
    }

	public function beforeSave()
	{
		$hasher = new PasswordHash(Yii::app()->params['phpass']['iteration_count_log2'], Yii::app()->params['phpass']['portable_hashes']);

		// Replace the raw password with the hashed one
		if (isset($this->password)) {
			$this->password = $hasher->HashPassword($this->password);
		}

		// Generate the verification hash
		$this->verificationHash = $hasher->HashPassword(mt_rand(10000,99999).time().$this->email);

		// Set the status to pending
		$this->status = '_';

		$this->birthday = date('Y-m-d', CDateTimeParser::parse($this->birthday, 'MM/dd/yyyy'));

		return parent::beforeSave();
	}

	public function approveUser($pid)
	{
		$this->status = '+';
		$this->dateVerified = new CDbExpression('NOW()');
		$this->profileID = $pid;
		$this->saveAttributes(array('status', 'dateVerified', 'profileID'));
	}

	public function denyUser()
	{
		$this->status = '-';
		$this->dateVerified = new CDbExpression('NOW()');
		$this->saveAttributes(array('status', 'dateVerified'));
	}

	/**
	 * Helper function called by CDbCriteria condition
	 * that calls Link::getLinkStatus to find if two 
	 * users are linked.
	 *
	 * $uid1 User 1
	 * $uid2 User 2
	 */
	public function checkLinkAffiliation($uid1, $uid2) {
		$linkStatus = Link::getLinkStatus($uid1, $uid2);
		if ($linkStatus == '+')
			return '1';

		return '0';
	}

	/**
	 * Function called by CDbCriteria condition to check if
	 * the given organization and university matches those
	 * of the user. By directly passing the $org and $uni,
	 * we save on a query.
	 *
	 * $org organizationID parameter
	 * $uni universityID parameter
	 * $uid userID parameter
	 */
	public function checkChapterAffiliation($org, $uni, $uid) {
		$owner = Users::model()->findByPk($uid);
		$ownerOrg = $owner->organization;
		$ownerUni = $owner->university;

		if ($org == $ownerOrg && $uni == $ownerUni)
			return '1';
		
		return '0';
	}

	/**
	 * Function called by CDbCriteria condition to check if
	 * the given university matches that of the user. 
	 * By directly passing the $uni, we save on a query.
	 *
	 * $uni universityID parameter
	 * $uid userID parameter
	 */
	public function checkUniAffiliation($uni, $uid) {
		$owner = Users::model()->findByPk($uid);
		$ownerUni = $owner->university;

		if ($uni == $ownerUni)
			return '1';

		return '0';
	}

	/**
	 * Function called by CDbCriteria condition to check if
	 * the given organization matches that of the user. 
	 * By directly passing the $org, we save on a query.
	 *
	 * $org organizationID parameter
	 * $uid userID parameter
	 */
	public function checkOrgAffiliation($org, $uid) {
		$owner = Users::model()->findByPk($uid);
		$ownerOrg = $owner->organization;

		if ($org == $ownerOrg)
			return '1';

		return '0';
	}
}