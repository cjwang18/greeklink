<?php
/* @var $this ConcentrationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Concentrations',
);

$this->menu=array(
	array('label'=>'Create Concentration', 'url'=>array('create')),
	array('label'=>'Manage Concentration', 'url'=>array('admin')),
);
?>

<h1>Concentrations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
