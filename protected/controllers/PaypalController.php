<?php

class PaypalController extends Controller
{
    public $layout = "";

    public function filters()
    {
        return array(
            'AccessControl'
        );
    }

    public function actions()
    {
        return array(
            'cancel'=>'application.controllers.Paypal.CancelAction',  //action for Buy property page controller
            'confirm'=>'application.controllers.Paypal.ConfirmAction',  //action for Property Detail page controller
        );
    }

	public function actionBuy(){

        if (isset(Yii::app()->session['PAYPAL'])) {

            $transaction = Yii::app()->session['PAYPAL'];

            /*---( Get currency exchange rate - LKR to USD )---*/
            $currencyConversion = json_decode(file_get_contents('http://rate-exchange.herokuapp.com/fetchRate?from=LKR&to=USD'), true);

            if (isset($currencyConversion)) {

                // set
                $paymentInfo['Order']['theTotal'] = number_format(($transaction->amount * number_format($currencyConversion['Rate'], 4)), 2);
                $paymentInfo['Order']['description'] = $transaction->description;
                $paymentInfo['Order']['quantity'] = '1';

                Yii::app()->session['theTotal'] = $paymentInfo['Order']['theTotal'];

            } else {

                $error = 'Error in Currency conversion rate. Please try again later';

                echo $error;
                Yii::app()->end();
            }

        } else {

            $error = 'We were unable to process your request. Please try again later';

            echo $error;
            Yii::app()->end();
        }

		// call paypal
		$result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo);

        //var_dump($result);
        //Yii::app()->end();

		//Detect Errors
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			echo $error;
			Yii::app()->end();
			
		}else { 
			// send user to paypal 
			$token = urldecode($result["TOKEN"]); 
			
			$payPalURL = Yii::app()->Paypal->paypalUrl.$token; 
			$this->redirect($payPalURL); 
		}
	}

	public function actionDirectPayment(){
		$paymentInfo = array('Member'=> 
			array( 
				'first_name'=>'name_here', 
				'last_name'=>'lastName_here', 
				'billing_address'=>'address_here', 
				'billing_address2'=>'address2_here', 
				'billing_country'=>'country_here', 
				'billing_city'=>'city_here', 
				'billing_state'=>'state_here', 
				'billing_zip'=>'zip_here' 
			), 
			'CreditCard'=> 
			array( 
				'card_number'=>'number_here', 
				'expiration_month'=>'month_here', 
				'expiration_year'=>'year_here', 
				'cv_code'=>'code_here' 
			), 
			'Order'=> 
			array('theTotal'=>1.00) 
		); 

	   /* 
		* On Success, $result contains [AMT] [CURRENCYCODE] [AVSCODE] [CVV2MATCH]  
		* [TRANSACTIONID] [TIMESTAMP] [CORRELATIONID] [ACK] [VERSION] [BUILD] 
		*  
		* On Fail, $ result contains [AMT] [CURRENCYCODE] [TIMESTAMP] [CORRELATIONID]  
		* [ACK] [VERSION] [BUILD] [L_ERRORCODE0] [L_SHORTMESSAGE0] [L_LONGMESSAGE0]  
		* [L_SEVERITYCODE0]  
		*/ 
	  
		$result = Yii::app()->Paypal->DoDirectPayment($paymentInfo); 
		
		//Detect Errors 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			echo $error;
			
		}else { 
			//Payment was completed successfully, do the rest of your stuff
		}

		Yii::app()->end();
	}

    public function filterAccessControl($filterChain)
    {
        /*
         * checking user logged or not
         */
        if (Yii::app()->user->isGuest){
            Yii::app()->user->setReturnUrl(Yii::app()->request->requestUri);
            $this->redirect(Yii::app()->baseUrl . '/login');
        } else {

            switch (Yii::app()->user->usertype){
                case 0:
                    $this->layout = 'adminmain';
                    break;
                case 1:
                    $this->layout = 'membermain';
                    break;
                case 2:
                    $this->layout = 'agentmain';
                    break;
                case 3:
                    $this->layout = 'advertisermain';
                    break;
            }
        }

        $filterChain->run();//default action
    }
}