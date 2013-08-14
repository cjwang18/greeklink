<?php
/* @var $this PostController */
/* @var $scrollLeft CActiveDataProvider */
/* @var $scrollRight CActiveDataProvider */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts',
);
?>

<h1>Create Post</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<br><h1>Left: Author Is Owner Posts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$scrollLeft,
	'itemView'=>'_view',
)); ?>

<br><h1>Right: Author Not Owner Posts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$scrollRight,
	'itemView'=>'_view',
)); ?>
