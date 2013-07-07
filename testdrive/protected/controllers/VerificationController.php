<?php

class VerificationController extends Controller
{
	/**
	 * @var string the default layout for the views. 
	 * Change to whatever new layout we decide to use.
	 */
	public $layout='//layouts/column2';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		/* URL should contain both userID as well as verification hash */

		/* these may entail a necessity for a model */

		/* IF the verification hash of user model matches the hash
		in the url, we want to display the page that shows user 
		information	and buttons to approve or deny verification request. 
		
		ELSE we display an error page indicating link is incorrect */

		// test URL: http://192.168.1.100/greeklink/testdrive/index.php/verification?id=13&hash=$P$BfUaq99wPJyRcqFNtEQwNuMZbKb3G..

		if (Yii::app()->getRequest()->getQuery('id') && Yii::app()->getRequest()->getQuery('hash')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			$hash = Yii::app()->getRequest()->getQuery('hash');
			// echo '<br>id = '.$id;
			// echo '<br>hash = '.$hash;
			// At this point, we have what's necessary to continue verification process
			$user = Users::model()->findByPk($id);
			if ($user===null) {
				// echo '<br>User not found!';
				$this->render('error', array('error'=>'nullUser'));
			} else {
				// echo '<br>User found!';
				// Now that we have the correct user, first check if user is already verified
				if ($user->status==='_') {
					// Then we verify is the hashes match
					if ($hash === $user->verificationHash) {
						// echo '<br>Verification hash matches!';
						// Display user information and buttons for approval/denial
						$this->render('verify', array('user'=>$user));
					} else {
						// echo '<br>Verification hash does not match!';
						$this->render('error', array('error'=>'hashMismatch'));
					}
				} else {
					// echo '<br>User has already been verified.';
					$this->render('error', array('error'=>'verified'));
				}
			}
		} else {
			// echo 'Invalid URL.';
			$this->render('error', array('error'=>'invalidURL'));
		}
	}

	public function actionApprove()
	{
		// Skipping sanity checks since actionIndex() should have handled potential errors
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Users::model()->findByPk($id);
		$user->approveUser();
		$this->redirect(array('confirmation', 'id'=>$id, 'status'=>'+'));
	}

	public function actionDeny()
	{
		// Skipping sanity checks since actionIndex() should have handled potential errors
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Users::model()->findByPk($id);
		$user->denyUser();
		$this->redirect(array('confirmation', 'id'=>$id, 'status'=>'-'));
	}

	public function actionConfirmation()
	{
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Users::model()->findByPk($id);
		$this->render('confirmation', array('user'=>$user));
	}
}