<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

/*$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);*/

Yii::app()->clientScript->registerScript('search', "
$(document).ready(function() {
	$('#usersView').hide();
});
$('.search-form form').submit(function(){
	$.fn.yiiListView.update('usersView', { 
        //this entire js section is taken from admin.php. w/only this line diff
        data: $(this).serialize()
    });
	return false;
});
");
?>

<h1>Users</h1>

<div class="search-form">
<?php  $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div>

<?php //echo var_dump($model->getAttributes()); ?>

<?php //if(isset($_GET['Users'])) : ?>
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_viewSearch',
		'id'=>'usersView',
	)); ?>
<?php //endif; ?>
