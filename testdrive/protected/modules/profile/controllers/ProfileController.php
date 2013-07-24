<?php

class ProfileController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public $defaultAction = 'default';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'update' and 'view' actions
				'actions'=>array('update','view','default','loadByAjax'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionDefault()
	{
		$userid = Yii::app()->user->id;
		$pid = Yii::app()->user->pid;
		$this->actionView($pid);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		// User can only view his/her own profile
		// TODO: allow user's links to view profile
		if ($model->userID == Yii::app()->user->id) {
			$this->render('view',array(
				'model'=>$model,
			));
		} else {
			throw new CHttpException(403,'Invalid request. You are not allowed to view this profile.');
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Profile;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Profile']))
		{
			$model->attributes=$_POST['Profile'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->profileID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// User can only update (edit) his/her own profile
		if ($model->userID == Yii::app()->user->id) {

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Profile']))
			{
				$model->attributes=$_POST['Profile'];

				$relationsToSave = array();

				if (isset($_POST['Activity'])) {
					$model->profilesActivities = $_POST['Activity'];
					array_push($relationsToSave, 'profilesActivities');
				}

				if (isset($_POST['CommitteeInvolvement'])) {
					$model->profilesCommitteeInvolvements = $_POST['CommitteeInvolvement'];
					array_push($relationsToSave, 'profilesCommitteeInvolvements');
				}

				if (isset($_POST['Concentration'])) {
					$model->profilesConcentrations = $_POST['Concentration'];
					array_push($relationsToSave, 'profilesConcentrations');
				}

				if (isset($_POST['Position'])) {
					$model->profilesPositions = $_POST['Position'];
					array_push($relationsToSave, 'profilesPositions');
				}

				if (isset($_POST['Skill'])) {
					$model->profilesSkills = $_POST['Skill'];
					array_push($relationsToSave, 'profilesSkills');
				}

				if (isset($_POST['WorkExperience'])) {
					$model->profilesWorkExperiences = $_POST['WorkExperience'];
					array_push($relationsToSave, 'profilesWorkExperiences');
				}

				if ($model->saveWithRelated($relationsToSave))
					$this->redirect(array('view','id'=>$model->profileID));
				else
					$model->addError('Profile', 'Error occured while saving relational data.');

				/*if($model->save())
					$this->redirect(array('view','id'=>$model->profileID));*/
			}

			$this->render('update',array(
				'model'=>$model,
			));

		} else {
			throw new CHttpException(403,'Invalid request. You are not allowed to edit this profile.');
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Profile');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Profile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Profile']))
			$model->attributes=$_GET['Profile'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Profile the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Profile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Profile $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionLoadByAjax($loadFor, $index)
	{
		switch ($loadFor) {
			case "activity":
				$model = new Activity;
				break;
			case "committeeInvolvement":
				$model = new CommitteeInvolvement;
				break;
			case "concentration":
				$model = new Concentration;
				break;
			case "position":
				$model = new Position;
				break;
			case "skill":
				$model = new Skill;
				break;
			case "workExperience":
				$model = new WorkExperience;
				break;
		}
		
		$this->renderPartial('/'.$loadFor.'/_form', array(
			'model' => $model,
			'index' => $index,
			'display' => 'block',
		), false, true);
	}
}
