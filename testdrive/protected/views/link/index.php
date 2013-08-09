<?php
/* @var $this LinkController */
/* @var $pendingLinks CActiveDataProvider */
/* @var $links CActiveDataProvider */

$this->breadcrumbs=array(
	'Links',
);

$this->menu=array(
	array('label'=>'Create Link', 'url'=>array('create')),
	array('label'=>'Manage Link', 'url'=>array('admin')),
);
?>

<h1>Link Requests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$pendingLinks,
	'itemView'=>'_viewLinkRequest',
)); ?>

<br><br>
<h1>Links</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$links,
	'itemView'=>'_viewLink',
)); ?>