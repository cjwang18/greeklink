<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property string $postID
 * @property string $post
 * @property string $datePosted
 * @property string $upvotes
 * @property string $downvotes
 * @property string $author
 * @property string $owner
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property Users $author0
 * @property Users $owner0
 * @property Votes[] $votes
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post, datePosted, upvotes, downvotes, author, owner', 'required'),
			array('upvotes, downvotes, author, owner', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('postID, post, datePosted, upvotes, downvotes, author, owner', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comments', 'postID'),
			'author0' => array(self::BELONGS_TO, 'Users', 'author'),
			'owner0' => array(self::BELONGS_TO, 'Users', 'owner'),
			'votes' => array(self::HAS_MANY, 'Votes', 'postID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'postID' => 'Post',
			'post' => 'Post',
			'datePosted' => 'Date Posted',
			'upvotes' => 'Upvotes',
			'downvotes' => 'Downvotes',
			'author' => 'Author',
			'owner' => 'Owner',
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

		$criteria->compare('postID',$this->postID,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('datePosted',$this->datePosted,true);
		$criteria->compare('upvotes',$this->upvotes,true);
		$criteria->compare('downvotes',$this->downvotes,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('owner',$this->owner,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}