<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_USER_ACCOUNT_PENDING = 3;
	const ERROR_USER_ACCOUNT_DENIED = 4;
	private $_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = Users::model()->findByAttributes(array('email'=>$this->username));
		$hasher = new PasswordHash(Yii::app()->params['phpass']['iteration_count_log2'], Yii::app()->params['phpass']['portable_hashes']);

		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($user->status=='_')
			$this->errorCode=self::ERROR_USER_ACCOUNT_PENDING;
		elseif($user->status=='-')
			$this->errorCode=self::ERROR_USER_ACCOUNT_DENIED;
		elseif(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else {
			$this->errorCode=self::ERROR_NONE;
			$this->_id=$user['userID'];
			$this->setState('pid', $user['profileID']);
			$this->setState('name', $user['name']);
		}

		// Change return statement to return the value not just a pass condition
		// was: return !$this->errorCode;
		return $this->errorCode;
	}

	public function getId() {
		return $this->_id;
	}
}