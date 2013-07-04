<?php

// autoload "protected/libs/PasswordHash.php"
Yii::import('application.libs.PasswordHash');

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
			array('state, gender', 'length', 'max'=>2),
			array('initiationYear', 'length', 'max'=>4),
			array('initiationYear', 'match', 'pattern'=>'/^[0-9]+$/', 'message'=>'Must be a valid year.'),
			array('email, repeatEmail', 'email', 'pattern'=>'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.edu)$/', 'message'=>'Must be a .edu email address.'),
			array('email', 'compare', 'compareAttribute'=>'repeatEmail'),
			array('password', 'compare', 'compareAttribute'=>'repeatPassword'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userID, name, organization, state, university, birthday, gender, initiationYear, email', 'safe', 'on'=>'search'),
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
			'organization' => array(self::BELONGS_TO, 'Organizations', 'organization'),
			'state' => array(self::BELONGS_TO, 'States', 'state'),
			'university' => array(self::BELONGS_TO, 'Universities', 'university'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function validatePassword($password) // $password is the user input
    {
        // Try to use stronger but system-specific hashes, with a possible fallback to
        // the weaker portable hashes.
        $hasher = new PasswordHash(8, FALSE);
        return $hasher->checkPassword($password, $this->password);
    }
 
    public function beforeSave()
    {
        // Replace the raw password with the hashed one
        if (isset($this->password)) {
            $hasher = new PasswordHash(8, FALSE);
            $this->password = $hasher->HashPassword($this->password);
        }
        return parent::beforeSave();
    }
}