<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/bootstrap-responsive.css" />  -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" /> 
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/landing-style.css" />

		<!-- Average Font -->
		<link href='http://fonts.googleapis.com/css?family=Average' rel='stylesheet' type='text/css'>

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>
		<?php echo $content; ?>
	</body>
</html>