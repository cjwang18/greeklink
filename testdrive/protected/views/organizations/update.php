<?php
/* @var $this OrganizationsController */
/* @var $model Organizations */

$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	$model->name=>array('view','id'=>$model->orgID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Organizations', 'url'=>array('index')),
	array('label'=>'Create Organizations', 'url'=>array('create')),
	array('label'=>'View Organizations', 'url'=>array('view', 'id'=>$model->orgID)),
	array('label'=>'Manage Organizations', 'url'=>array('admin')),
);
?>

<h1>Update Organizations <?php echo $model->orgID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>