<?php

class LinkController extends Controller
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
				'actions'=>array('create','update','approve','deny'),
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
		$model=new Link;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$id = Yii::app()->getRequest()->getQuery('link');

		if(isset($id))
		{
			if($model->linkRequest($id))
				$this->redirect(Yii::app()->request->urlReferrer);
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

		if(isset($_POST['Link']))
		{
			$model->attributes=$_POST['Link'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->linkID));
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
		// User's pending link requests
		$c1 = new CDbCriteria();
		$c1->with = array('owner0');
		$c1->condition = 'link = :id AND linkStatus = :s';
		$c1->params= array(
			':id' => Yii::app()->user->id,
			':s' => '_',
		);
		$c1->order = 'owner0.name';

		$pendingLinks=new CActiveDataProvider('Link', array(
			'criteria' => $c1,
		));

		// User's links
		$c2 = new CDbCriteria();
		$c2->with = array('owner0', 'link0');
		$c2->condition = 'owner = :id OR link = :id';
		$c2->params = array(
			':id' => Yii::app()->user->id,
		);
		$c2->addColumnCondition(array('linkStatus'=>'+'));

		$links = new CActiveDataProvider('Link', array(
			'criteria' => $c2,
		));

		$this->render('index',array(
			'pendingLinks'=>$pendingLinks,
			'links'=>$links,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Link('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Link']))
			$model->attributes=$_GET['Link'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Link the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Link::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Link $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='link-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionApprove() {
		// Requested links always have structure of:
		// owner == friend
		// link == you
		$owner = Yii::app()->getRequest()->getQuery('id');
		$link = Yii::app()->user->id;

		// Get the link from DB
		$model = Link::model()->findByPk(array(
			'owner' => $owner,
			'link' => $link,
		));

		// Approve link request
		$model->approveLinkRequest();

		$this->redirect(Yii::app()->request->urlReferrer);
	}

	public function actionDeny() {
		// Requested links always have structure of:
		// owner == friend
		// link == you
		$owner = Yii::app()->getRequest()->getQuery('id');
		$link = Yii::app()->user->id;

		// Get the link from DB
		$model = Link::model()->findByPk(array(
			'owner' => $owner,
			'link' => $link,
		));

		// Approve link request
		$model->denyLinkRequest();

		$this->redirect(Yii::app()->request->urlReferrer);
	}
}
