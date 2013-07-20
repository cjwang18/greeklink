<?php
/* @var $this FraternalFamilyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fraternal Families',
);

$this->menu=array(
	array('label'=>'Create FraternalFamily', 'url'=>array('create')),
	array('label'=>'Manage FraternalFamily', 'url'=>array('admin')),
);
?>

<h1>Fraternal Families</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
