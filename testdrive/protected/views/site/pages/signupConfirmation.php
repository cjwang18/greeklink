<?php
/* @var $this SiteController */

$this->layout='landing';
$this->pageTitle=Yii::app()->name . ' - Sign Up Confirmation';
$this->breadcrumbs=array(
	'signupConfirmation',
);
?>

<div class="divFormCenter">

	<div class="form-signin">

		<h1>You've signed up!</h1>

		<h2>But wait:</h2>

		<p>
			In order to maintain the exclusivity of GreekLink, 
			your account will need to be verified by your organization's 
			national headquarters.
			This process may take up to 3 days. We know you can't wait to connect
			with your brothers and sisters so be on a lookout
			for an email confirming your account's activation!
			Thanks for signing up with GreekLink!
		</p>

	</div>
</div>
