<?php
/* @var $this ConcentrationController */
/* @var $model Concentration */

$this->breadcrumbs=array(
	'Concentrations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Concentration', 'url'=>array('index')),
	array('label'=>'Manage Concentration', 'url'=>array('admin')),
);
?>

<h1>Create Concentration</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>