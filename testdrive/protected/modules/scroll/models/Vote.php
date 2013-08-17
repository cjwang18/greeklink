<?php

/**
 * This is the model class for table "votes".
 *
 * The followings are the available columns in table 'votes':
 * @property string $voteID
 * @property string $postID
 * @property string $userID
 * @property string $action
 *
 * The followings are the available model relations:
 * @property Posts $post
 * @property Users $user
 */
class Vote extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vote the static model class
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
		return 'votes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('postID, userID, action', 'required'),
			array('postID', 'length', 'max'=>20),
			array('userID', 'length', 'max'=>11),
			array('action', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('voteID, postID, userID, action', 'safe', 'on'=>'search'),
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
			'post' => array(self::BELONGS_TO, 'Post', 'postID'),
			'user' => array(self::BELONGS_TO, 'Users', 'userID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'voteID' => 'Vote',
			'postID' => 'Post',
			'userID' => 'User',
			'action' => 'Action',
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

		$criteria->compare('voteID',$this->voteID,true);
		$criteria->compare('postID',$this->postID,true);
		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('action',$this->action,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}