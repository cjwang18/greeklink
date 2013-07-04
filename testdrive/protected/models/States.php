<?php

/**
 * This is the model class for table "states".
 *
 * The followings are the available columns in table 'states':
 * @property integer $stateID
 * @property string $stateAbbr
 * @property string $stateFull
 */
class States extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return States the static model class
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
		return 'states';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stateAbbr, stateFull', 'required'),
			array('stateAbbr', 'length', 'max'=>2),
			array('stateFull', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('stateID, stateAbbr, stateFull', 'safe', 'on'=>'search'),
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
			'users' => array(self::HAS_MANY, 'Users', 'state'),
			'universities' => array(self::HAS_MANY, 'Universities', 'state'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'stateID' => 'State',
			'stateAbbr' => 'State Abbr',
			'stateFull' => 'State Full',
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

		$criteria->compare('stateID',$this->stateID);
		$criteria->compare('stateAbbr',$this->stateAbbr,true);
		$criteria->compare('stateFull',$this->stateFull,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}