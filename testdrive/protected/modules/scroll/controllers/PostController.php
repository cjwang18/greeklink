<?php

class PostController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','delete','customAction'),
				'users'=>array('@'),
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
	public function actionCreate($id)
	{
		$model=new Post;

		//echo "Owner: ".$id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			$model->owner = $id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->postID));
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

		$userId = Yii::app()->user->id;

        if ($model->author != $userId)
        {
            throw new CHttpException(403,'You do ont have the permissions necessary to modify this post.');
        }

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->postID));
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
		$dataProvider=new CActiveDataProvider('Post');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Post::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionCustomAction($ownerID)
	{
		$model=new Post;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			$model->owner = $ownerID;
			if($model->save())
				$this->redirect(array('customAction','ownerID'=>$ownerID));
		}

		// Scroll Left: Author is Owner Posts
		$authorIsOwner = new CDbCriteria();
		$authorIsOwner->condition = 'author = :id AND owner = :id';
		$authorIsOwner->params = array(
			':id' => $ownerID,
		);
		$authorIsOwner->addCondition("(allowLinks=1 AND ".Users::checkLinkAffiliation(Yii::app()->user->id, $ownerID)."=1)
			OR (owner=".Yii::app()->user->id.")
			OR (allowChapter=1 AND ".Users::checkChapterAffiliation(Yii::app()->user->org, Yii::app()->user->uni, $ownerID)."=1)
			OR (allowUni=1 AND ".Users::checkUniAffiliation(Yii::app()->user->uni, $ownerID)."=1)
			OR (allowOrg=1 AND ".Users::checkOrgAffiliation(Yii::app()->user->org, $ownerID)."=1)
			OR (allowAll=1)
		");
		$authorIsOwner->order = 'datePosted DESC';

		$scrollLeft = new CActiveDataProvider('Post', array(
			'criteria' => $authorIsOwner,
		));

		// Scroll Right: Author not Owner Posts
		$authorNotOwner = new CDbCriteria();
		$authorNotOwner->condition = 'author != :id AND owner = :id';
		$authorNotOwner->params = array(
			':id' => $ownerID,
		);
		$authorNotOwner->addCondition("(allowLinks=1 AND ".Users::checkLinkAffiliation(Yii::app()->user->id, $ownerID)."=1)
			OR (owner=".Yii::app()->user->id.")
			OR (allowChapter=1 AND ".Users::checkChapterAffiliation(Yii::app()->user->org, Yii::app()->user->uni, $ownerID)."=1)
			OR (allowUni=1 AND ".Users::checkUniAffiliation(Yii::app()->user->uni, $ownerID)."=1)
			OR (allowOrg=1 AND ".Users::checkOrgAffiliation(Yii::app()->user->org, $ownerID)."=1)
			OR (allowAll=1)
		");
		$authorNotOwner->order = 'datePosted DESC';

		$scrollRight = new CActiveDataProvider('Post', array(
			'criteria' => $authorNotOwner,
		));

		$this->render('index',array(
			'scrollLeft'=>$scrollLeft,
			'scrollRight'=>$scrollRight,
			'model'=>$model,
		));
	}


}
