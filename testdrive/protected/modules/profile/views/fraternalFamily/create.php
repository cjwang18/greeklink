<?php
/* @var $this FraternalFamilyController */
/* @var $model FraternalFamily */

$this->breadcrumbs=array(
	'Fraternal Families'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FraternalFamily', 'url'=>array('index')),
	array('label'=>'Manage FraternalFamily', 'url'=>array('admin')),
);
?>

<h1>Create FraternalFamily</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>