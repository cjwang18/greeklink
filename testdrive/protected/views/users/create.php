<?php
/* @var $this UsersController */
/* @var $model Users */

$this->layout='landing';
$this->pageTitle=Yii::app()->name . ' - Signup';
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

/*$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);*/
?>

<!-- <h1>Create Users</h1> -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>