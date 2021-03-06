<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: IndexAction.php
 * Last Update Date: 11-09-2013
 *
 * **This is the Admin Index Action Page.
 */

class ChangePasswordAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        /*
         * find user id and validate user id
         */
        $user = User::model()->findByPk(Yii::app()->user->id);

        if (!isset($user)) {
            Yii::app()->user->setFlash('notice', 'Invalid User');
            $this->redirect(Yii::app()->baseUrl . '/member/home');
        }

        $model = new User;

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];

            $user->password = $model->password;
            $user->passwordconf = $model->passwordconf;

            /*
             * save data to the db
             */
            if($user->save(false)){
                Yii::app()->user->setFlash('success', "Password updated.");

                switch (Yii::app()->user->usertype){
                    case 0:
                        $this->getController()->redirect(Yii::app()->baseUrl . '/admin/home');
                        break;
                    case 1:
                        $this->getController()->redirect(Yii::app()->baseUrl . '/member/home');
                        break;
                    case 2:
                        $this->getController()->redirect(Yii::app()->baseUrl . '/agent/home');
                        break;
                    case 3:
                        $this->getController()->redirect(Yii::app()->baseUrl . '/advertiser/home');
                        break;
                }
            }
            else{
                print_r($model->getErrors());
                Yii::app()->user->setFlash('error', 'Error Saving Record');
            }
        }

        $this->getController()->render('changepassword',array('model' => $model));
    }
}