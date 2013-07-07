<?php
/* @var $this VerificationController */
/* @var $error 
 * Possible errors:
 * invalidURL - link does not contain both userID and verificationHash
 * nullUser - no user found with the given userID
 * verified - the user has already been verified
 * hashMismatch - the verification hashes do not match
 */

$this->pageTitle=Yii::app()->name . ' - Verification Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Verification Error</h2>

<div class="error">
	<?php
		switch($error) {
			case 'invalidURL':
				echo CHtml::encode('The link is invalid.');
				break;
			case 'nullUser':
				echo CHtml::encode('We were unable to find the user you requested.');
				break;
			case 'verified':
				echo CHtml::encode('The user has already been verified.');
				break;
			case 'hashMismatch':
				echo CHtml::encode('The provided verification hash does not match.');
				break;
			default:
				echo CHtml::encode('');
				break;
		}
	?>
</div>