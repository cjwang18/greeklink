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

		$uid = Yii::app()->user->id;
		// User can only view his/her own profile
		// or those whom he/she is linked with
		if ($model->userID == $uid || Link::getLinkStatus($model->userID, $uid) == '+') {
			$this->layout='//layouts/profile';
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

				// set profile picture path name
				$uploadedFile = CUploadedFile::getInstance($model,'profilePic');
				if (!empty($uploadedFile)) {
					// generate random name
					$pid = $model->profileID;
					$rand = md5_file($uploadedFile->getTempName());
					$fileName = "{$pid}-{$rand}";  // profile ID + hashed file name
					$model->profilePic = $fileName;
				}				

				$relationsToSave = array();

				/* ----- Activity ----- */
				$activityModified = false;
				// check if related model exists in POST data
				if (isset($_POST['Activity'])) {
					// if the count of records in POST data == count of records in db
					if (count($_POST['Activity']) == count($model->profilesActivities)) {
						// loop through each record in POST data and compare with each record in db
						foreach ($_POST['Activity'] as $key => $value) {
							$temp = Activity::model()->findByAttributes(array(
								'profileID' => $model->profileID,
								'name' => $value['name'],
								'description' => $value['description'],
								'beginMonth' => $value['beginMonth'],
								'beginYear' => $value['beginYear'],
								'present' => $value['present'],
								'endMonth' => $value['endMonth'],
								'endYear' => $value['endYear'],
							));
							// if record isn't the same, set modification flag
							if (!$temp) {
								$activityModified = true;
							}
						}
					} else {
						// if the count of records in POST data != count of records in db,
						// something has obviously changed so set modification flag
						$activityModified = true;
					}
					// if modified, need to save new related model data
					if ($activityModified == true) {
						$model->profilesActivities = $_POST['Activity'];
						array_push($relationsToSave, 'profilesActivities');
					}
				} else {
					// if related model doesn't exist in POST,
					// check if related model has any records in db
					if (count($model->profilesActivities) != 0) {
						// if it does, deletion is necessary
						$model->profilesActivities = array();
						array_push($relationsToSave, 'profilesActivities');
					}
				}

				/* ----- CommitteeInvolvement ----- */
				$committeeInvolvementModified = false;
				// check if related model exists in POST data
				if (isset($_POST['CommitteeInvolvement'])) {
					// if the count of records in POST data == count of records in db
					if (count($_POST['CommitteeInvolvement']) == count($model->profilesCommitteeInvolvements)) {
						// loop through each record in POST data and compare with each record in db
						foreach ($_POST['CommitteeInvolvement'] as $key => $value) {
							$temp = CommitteeInvolvement::model()->findByAttributes(array(
								'profileID' => $model->profileID,
								'name' => $value['name'],
								'beginSemester' => $value['beginSemester'],
								'beginYear' => $value['beginYear'],
								'present' => $value['present'],
								'endSemester' => $value['endSemester'],
								'endYear' => $value['endYear'],
							));
							// if record isn't the same, set modification flag
							if (!$temp) {
								$committeeInvolvementModified = true;
							}
						}
					} else {
						// if the count of records in POST data != count of records in db,
						// something has obviously changed so set modification flag
						$committeeInvolvementModified = true;
					}
					// if modified, need to save new related model data
					if ($committeeInvolvementModified == true) {
						$model->profilesCommitteeInvolvements = $_POST['CommitteeInvolvement'];
						array_push($relationsToSave, 'profilesCommitteeInvolvements');
					}
				} else {
					// if related model doesn't exist in POST,
					// check if related model has any records in db
					if (count($model->profilesCommitteeInvolvements) != 0) {
						// if it does, deletion is necessary
						$model->profilesCommitteeInvolvements = array();
						array_push($relationsToSave, 'profilesCommitteeInvolvements');
					}
				}

				/* ----- Concentration ----- */
				$concentrationModified = false;
				// check if related model exists in POST data
				if (isset($_POST['Concentration'])) {
					// if the count of records in POST data == count of records in db
					if (count($_POST['Concentration']) == count($model->profilesConcentrations)) {
						// loop through each record in POST data and compare with each record in db
						foreach ($_POST['Concentration'] as $key => $value) {
							$temp = Concentration::model()->findByAttributes(array(
								'profileID' => $model->profileID,
								'concentration' => $value['concentration'],
								'beginSemester' => $value['beginSemester'],
								'beginYear' => $value['beginYear'],
								'present' => $value['present'],
								'endSemester' => $value['endSemester'],
								'endYear' => $value['endYear'],
							));
							// if record isn't the same, set modification flag
							if (!$temp) {
								$concentrationModified = true;
							}
						}
					} else {
						// if the count of records in POST data != count of records in db,
						// something has obviously changed so set modification flag
						$concentrationModified = true;
					}
					// if modified, need to save new related model data
					if ($concentrationModified == true) {
						$model->profilesConcentrations = $_POST['Concentration'];
						array_push($relationsToSave, 'profilesConcentrations');
					}
				} else {
					// if related model doesn't exist in POST,
					// check if related model has any records in db
					if (count($model->profilesConcentrations) != 0) {
						// if it does, deletion is necessary
						$model->profilesConcentrations = array();
						array_push($relationsToSave, 'profilesConcentrations');
					}
				}

				/* ----- Position ----- */
				$positionModified = false;
				// check if related model exists in POST data
				if (isset($_POST['Position'])) {
					// if the count of records in POST data == count of records in db
					if (count($_POST['Position']) == count($model->profilesPositions)) {
						// loop through each record in POST data and compare with each record in db
						foreach ($_POST['Position'] as $key => $value) {
							$temp = Position::model()->findByAttributes(array(
								'profileID' => $model->profileID,
								'title' => $value['title'],
								'description' => $value['description'],
								'beginSemester' => $value['beginSemester'],
								'beginYear' => $value['beginYear'],
								'present' => $value['present'],
								'endSemester' => $value['endSemester'],
								'endYear' => $value['endYear'],
							));
							// if record isn't the same, set modification flag
							if (!$temp) {
								$positionModified = true;
							}
						}
					} else {
						// if the count of records in POST data != count of records in db,
						// something has obviously changed so set modification flag
						$positionModified = true;
					}
					// if modified, need to save new related model data
					if ($positionModified == true) {
						$model->profilesPositions = $_POST['Position'];
						array_push($relationsToSave, 'profilesPositions');
					}
				} else {
					// if related model doesn't exist in POST,
					// check if related model has any records in db
					if (count($model->profilesPositions) != 0) {
						// if it does, deletion is necessary
						$model->profilesPositions = array();
						array_push($relationsToSave, 'profilesPositions');
					}
				}

				/* ----- Skill ----- */
				$skillModified = false;
				// check if related model exists in POST data
				if (isset($_POST['Skill'])) {
					// if the count of records in POST data == count of records in db
					if (count($_POST['Skill']) == count($model->profilesSkills)) {
						// loop through each record in POST data and compare with each record in db
						foreach ($_POST['Skill'] as $key => $value) {
							$temp = Skill::model()->findByAttributes(array(
								'profileID' => $model->profileID,
								'category' => $value['category'],
								'skills' => $value['skills'],
							));
							// if record isn't the same, set modification flag
							if (!$temp) {
								$skillModified = true;
							}
						}
					} else {
						// if the count of records in POST data != count of records in db,
						// something has obviously changed so set modification flag
						$skillModified = true;
					}
					// if modified, need to save new related model data
					if ($skillModified == true) {
						$model->profilesSkills = $_POST['Skill'];
						array_push($relationsToSave, 'profilesSkills');
					}
				} else {
					// if related model doesn't exist in POST,
					// check if related model has any records in db
					if (count($model->profilesSkills) != 0) {
						// if it does, deletion is necessary
						$model->profilesSkills = array();
						array_push($relationsToSave, 'profilesSkills');
					}
				}

				/* ----- WorkExperience ----- */
				$workExperienceModified = false;
				// check if related model exists in POST data
				if (isset($_POST['WorkExperience'])) {
					// if the count of records in POST data == count of records in db
					if (count($_POST['WorkExperience']) == count($model->profilesWorkExperiences)) {
						// loop through each record in POST data and compare with each record in db
						foreach ($_POST['WorkExperience'] as $key => $value) {
							$temp = WorkExperience::model()->findByAttributes(array(
								'profileID' => $model->profileID,
								'name' => $value['name'],
								'description' => $value['description'],
								'beginMonth' => $value['beginMonth'],
								'beginYear' => $value['beginYear'],
								'present' => $value['present'],
								'endMonth' => $value['endMonth'],
								'endYear' => $value['endYear'],
							));
							// if record isn't the same, set modification flag
							if (!$temp) {
								$workExperienceModified = true;
							}
						}
					} else {
						// if the count of records in POST data != count of records in db,
						// something has obviously changed so set modification flag
						$workExperienceModified = true;
					}
					// if modified, need to save new related model data
					if ($workExperienceModified == true) {
						$model->profilesWorkExperiences = $_POST['WorkExperience'];
						array_push($relationsToSave, 'profilesWorkExperiences');
					}
				} else {
					// if related model doesn't exist in POST,
					// check if related model has any records in db
					if (count($model->profilesWorkExperiences) != 0) {
						// if it does, deletion is necessary
						$model->profilesWorkExperiences = array();
						array_push($relationsToSave, 'profilesWorkExperiences');
					}
				}

				if ($model->saveWithRelated($relationsToSave)) {
					if (!empty($uploadedFile)) {
						// save profile picture
						$uploadedFile->saveAs(Yii::app()->basePath.'/../images/profilePics/'.$fileName);
					}
					$this->redirect(array('view','id'=>$model->profileID));
				} else
					$model->addError('Profile', 'Error occured while saving relational data.');

				/*if($model->save())
					$this->redirect(array('view','id'=>$model->profileID));*/
			}

			$this->layout='//layouts/column2';
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
