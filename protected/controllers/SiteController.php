<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $model = new Property();
        $modeltype = new Propertytyperelation();

        $this->render('index', array('model' => $model, 'modeltype'=>$modeltype));
		//$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $model=new LoginForm;

        /**
         * Check for Remember me cookie and show user name
         */
        if (isset(Yii::app()->request->cookies['remember_me'])) {
            $model->username = Yii::app()->request->cookies['remember_me']->value;
            $model->rememberMe = 1;
        }

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()){

                /**
                 * Configure remember me cookie
                 */
                if ($model->rememberMe == 1) {
                    unset(Yii::app()->request->cookies['remember_me']);
                    $cookie = new CHttpCookie('remember_me', $model->username);
                    $cookie->expire = time()+60*60*24*180;
                    Yii::app()->request->cookies['remember_me'] = $cookie;
                }
                else{
                    if (isset(Yii::app()->request->cookies['remember_me'])) {
                        unset(Yii::app()->request->cookies['remember_me']);
                    }
                }
                if (Yii::app()->user->returnUrl == Yii::app()->baseUrl . '/index.php') {

                    switch (Yii::app()->user->usertype){
                        case 0:
                            $this->redirect(Yii::app()->baseUrl . '/admin/home');
                            break;
                        case 1:
                            $this->redirect(Yii::app()->baseUrl . '/member/home');
                            break;
                        case 2:
                            $this->redirect(Yii::app()->baseUrl . '/agent/home');
                            break;
                        case 3:
                            $this->redirect(Yii::app()->baseUrl . '/advertiser/home');
                            break;
                    }

                } else {
                    $this->redirect(Yii::app()->baseUrl . Yii::app()->user->returnUrl);
                }
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    /**
     * Displays the register page
     */
    public function actionRegister()
    {
        $model = new User;
        $model->usertype = 1;

        if (isset($_POST['User'])) {

            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes = $_POST['User'];

            if (User::model()->findByAttributes(array('username'=>$model->username))) {
                $model->addError('user_name', 'Username already used, try else');
                Yii::app()->user->setFlash('error', "Username already used, try else");
            }
            else{

                $model->parentuser = 0;
                $model->status = 1;
                $model->userimage = CUploadedFile::getInstance($model, 'userimage');

                if (isset($model->userimage) && !is_null($model->userimage)) {
                    $model->userimage = "{$rnd}-{$model->userimage->name}";  // random number + file name
                } else {

                    $model->userimage = 'user_no_img.png';
                }

                if ($model->save()){

                    /*---(Upload Profile Image)---*/
                    if ($model->userimage != 'user_no_img.png') {
                        CUploadedFile::getInstance($model, 'userimage')->saveAs(Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR . $model->userimage);
                    }

                    $login_model = new LoginForm;
                    $login_model->username = $model->username;
                    $login_model->password = $model->password;
                    $login_model->rememberMe = 1;

                    unset(Yii::app()->request->cookies['remember_me']);
                    $cookie = new CHttpCookie('remember_me', $login_model->username);
                    $cookie->expire = time()+60*60*24*180;
                    Yii::app()->request->cookies['remember_me'] = $cookie;

                    if($login_model->validate() && $login_model->login()){
                        Yii::app()->user->setFlash('success', "You are Successfully Registered !");
                    }

                    switch ($model->usertype){
                        case 0:
                            $this->redirect(Yii::app()->baseUrl . '/admin/home');
                            break;
                        case 1:
                            $this->redirect(Yii::app()->baseUrl . '/member/home');
                            break;
                        case 2:
                            $this->redirect(Yii::app()->baseUrl . '/agent/home');
                            break;
                        case 3:
                            $this->redirect(Yii::app()->baseUrl . '/advertiser/home');
                            break;
                    }

                }
                else{
                    print_r($model->getErrors());
                    Yii::app()->user->setFlash('error', 'Error Saving Record');
                }
            }
        }
        // display the register form
        $this->render('register',array('model'=>$model));
    }

}