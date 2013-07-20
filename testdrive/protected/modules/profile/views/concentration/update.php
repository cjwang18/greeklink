<?php
/* @var $this ConcentrationController */
/* @var $model Concentration */

$this->breadcrumbs=array(
	'Concentrations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Concentration', 'url'=>array('index')),
	array('label'=>'Create Concentration', 'url'=>array('create')),
	array('label'=>'View Concentration', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Concentration', 'url'=>array('admin')),
);
?>

<h1>Update Concentration <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>