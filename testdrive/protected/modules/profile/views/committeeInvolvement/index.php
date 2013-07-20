<?php
/* @var $this CommitteeInvolvementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Committee Involvements',
);

$this->menu=array(
	array('label'=>'Create CommitteeInvolvement', 'url'=>array('create')),
	array('label'=>'Manage CommitteeInvolvement', 'url'=>array('admin')),
);
?>

<h1>Committee Involvements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
