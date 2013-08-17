<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('postID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->postID), array('view', 'id'=>$data->postID)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('post')); ?>:</b>
	<?php echo CHtml::encode($data->post); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datePosted')); ?>:</b>
	<?php echo Yii::app()->dateFormatter->format('EEE, MMM d, h:mm a', $data->datePosted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upvotes')); ?>:</b>
	<?php echo '<span id="post'.$data->postID.'upvotes">'.CHtml::encode($data->upvotes).'</span>'; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('downvotes')); ?>:</b>
	<?php echo '<span id="post'.$data->postID.'downvotes">'.CHtml::encode($data->downvotes).'</span>'; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author0->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo CHtml::encode($data->owner0->name); ?>
	<br />

	<?php echo CHtml::link('Reply',array('/scroll/comment/create', 'postID'=>$data->postID)); ?>

	<?php
		echo CHtml::ajaxButton(
			'Yay', 
			Yii::app()->createUrl('scroll/vote/yay'),
			// ajaxOptions
			array(
				'data' => array(
					'postID' => $data->postID,
					'userID' => Yii::app()->user->id, // vote caster
				),
				'success' => "
				function(data) {
					$('#post".$data->postID."upvotes').html(data);
				}
				"
			)
		);
	?>

	<?php
		echo CHtml::ajaxButton(
			'Nay', 
			Yii::app()->createUrl('scroll/vote/nay'),
			// ajaxOptions
			array(
				'data' => array(
					'postID' => $data->postID,
					'userID' => Yii::app()->user->id, // vote caster
				),
				'success' => "
				function(data) {
					$('#post".$data->postID."downvotes').html(data);
				}
				"
			)
		);
	?>	

	<?php
		foreach ($data->comments as $c) {
			echo '<div class="commentContainer">';
				echo '<b>'.CHtml::encode($c->author0->name).' ('.CHtml::encode($c->dateCommented).'): </b>';
				echo CHtml::encode($c->comment);


			echo '</div>';
		}
	?>



	<div class="row">
		<?php
			$model = new Comment;
			

			$form=$this->beginWidget('CActiveForm', array(
				'id'=>'comment-form-post'.$data->postID,
				'enableAjaxValidation'=>false,
				//'action' => array('comment/create/postID/'.$data->postID), // change depending on your project
				'htmlOptions'=>array(
					'onsubmit'=>"return false;",/* Disable normal form submit */
					'onkeypress'=>" if(event.keyCode == 13){ send($data->postID); } " /* Do ajax call when user presses enter key */
				),
			));

			echo $form->errorSummary($model);

			echo $form->labelEx($model,'comment');
			echo "<br />";
			echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50));
			echo $form->error($model,'comment');
			echo "<br />";

			//echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');
			
			/*echo CHtml::ajaxSubmitButton(
				'Comment',
				Yii::app()->createUrl('scroll/comment/create/postID/'.$data->postID),
				// ajaxOptions
				array(
					'type' => 'POST',
					'dataType' => 'json',
					'success' => "
					function(data) {
						console.log(data);
					}
					"
				)
			);*/

			echo CHtml::Button('Comment',array('onclick'=>"send($data->postID);"));

			$this->endWidget();
		?>
	</div>

	<script type="text/javascript">
		function send(postID)
		{
			var data = $('#comment-form-post'+postID).serialize();
			console.log(data);
			$.ajax({
				type: 'POST',
				url: '<?php echo Yii::app()->createAbsoluteUrl("scroll/comment/create/postID/' + postID + '"); ?>',
				data:data,
				success:function(data){
					console.log(data); 
				},
				error: function(data) { // if error occured
					alert('Error occured.please try again');
					console.log(data);
				},
				dataType:'html'
			});
		}
	</script>


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('allowLinks')); ?>:</b>
	<?php echo CHtml::encode($data->allowLinks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allowChapter')); ?>:</b>
	<?php echo CHtml::encode($data->allowChapter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allowUni')); ?>:</b>
	<?php echo CHtml::encode($data->allowUni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allowOrg')); ?>:</b>
	<?php echo CHtml::encode($data->allowOrg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allowAll')); ?>:</b>
	<?php echo CHtml::encode($data->allowAll); ?>
	<br />
	*/ ?>


</div>