<?php

class VoteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','yay','nay'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Vote;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vote']))
		{
			$model->attributes=$_POST['Vote'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->voteID));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vote']))
		{
			$model->attributes=$_POST['Vote'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->voteID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('Vote');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Vote('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vote']))
			$model->attributes=$_GET['Vote'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Vote the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Vote::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Vote $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='vote-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionYay($postID, $userID)
	{
		$vote = Vote::model()->findByAttributes(array(
			'postID' => $postID,
			'userID' => $userID
		));
		// Prevent same user from voting on same post
		if (!$vote) {
			$model=new Vote;

			$model->postID = $postID;
			$model->userID = $userID;
			$model->action = 'y';

			if ($model->save()) {
				$model->post->upvote();
				echo $model->post->upvotes;
				Yii::app()->end();
			}
		} else {
			echo $vote->post->upvotes;
			Yii::app()->end();
		}
	}

	public function actionNay($postID, $userID)
	{
		$vote = Vote::model()->findByAttributes(array(
			'postID' => $postID,
			'userID' => $userID
		));
		// Prevent same user from voting on same post
		if (!$vote) {
			$model=new Vote;

			$model->postID = $postID;
			$model->userID = $userID;
			$model->action = 'n';

			if ($model->save()) {
				$model->post->downvote();
				echo $model->post->downvotes;
				Yii::app()->end();
			}
		} else {
			echo $vote->post->downvotes;
			Yii::app()->end();
		}
	}
}
