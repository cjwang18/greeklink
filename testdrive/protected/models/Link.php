<?php

/**
 * This is the model class for table "links".
 *
 * The followings are the available columns in table 'links':
 * @property string $owner
 * @property string $link
 * @property string $linkStatus
 * @property string $dateRequested
 * @property string $dateSeen
 * @property string $dateLinked
 *
 * The followings are the available model relations:
 * @property Users $owner0
 * @property Users $link0
 */
class Link extends CActiveRecord
{
	const LR_NO_ERROR = 0;
	const LR_ALREADY_LINKED = 1;
	const LR_ALREADY_REQUESTED = 2;
	const LR_REQUEST_DENIED = 3;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Link the static model class
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
		return 'links';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('owner, link', 'required'),
			array('owner, link', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('owner, link', 'safe', 'on'=>'search'),
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
			'owner0' => array(self::BELONGS_TO, 'Users', 'owner'),
			'link0' => array(self::BELONGS_TO, 'Users', 'link'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'owner' => 'Name',
			'link' => 'Name',
			'linkStatus' => 'Status',
			'dateRequested' => 'Date Requested',
			'dateLinked' => 'Linked Since',
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

		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('dateLinked',$this->dateLinked,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/*public function beforeSave() {
		// Set status to pending
		$this->status = '_';

		return parent::beforeSave();
	}*/

	public static function getLinkStatus($uid1, $uid2) {
		$link = Link::model()->find('owner = '.$uid1 . ' and link = '.$uid2);
		if($link)
			return $link->linkStatus;

		$link = Link::model()->find('owner = '.$uid2 . ' and link = '.$uid1);
		if($link)
			return $link->linkStatus;

		return false;
	}

	public function linkRequest($link) {
		$owner = Yii::app()->user->id;
		
		$linkStatus = $this->getLinkStatus($owner, $link);
		switch ($linkStatus) {
			case '+':
				$this->addError('link', 'Already linked');
				return self::LR_ALREADY_LINKED;
				break;
			case '_':
				$this->addError('link', 'Link already requested');
				return self::LR_ALREADY_REQUESTED;
				break;
			case '-':
				$this->addError('link', 'Link request denied');
				return self::LR_REQUEST_DENIED;
				break;
			default:
				$this->addError('link', 'no issues. link request will proceed');
				break;
		}
		
		$this->owner = $owner;
		$this->link = $link;
		$this->linkStatus = '_';
		if ($this->save())
			return self::LR_NO_ERROR;
	}

	public function approveLinkRequest() {
		$this->linkStatus = '+';
		$this->dateLinked = new CDbExpression('NOW()');
		$this->saveAttributes(array('linkStatus', 'dateLinked'));
	}

	public function denyLinkRequest() {
		$this->linkStatus = '-';
		$this->dateLinked = new CDbExpression('NOW()');
		$this->saveAttributes(array('linkStatus', 'dateLinked'));
	}
}