<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use Cartalyst\Sentry\Facades\Native\Sentry as Sentry;

require APPPATH .'third_party/ispeech/ispeech.php';

class Webservice extends MY_Controller {

	public function __construct() {
		$this->load->library('parser');
		parent::__construct();
	}

	public function sendEmail($phoneNumber=null,$ivrNumber=null)
	{
		
		$postData = json_decode(file_get_contents("php://input"));
		
		/* $myfile = fopen("log.txt", "w") or die("Unable to open file!");
		fwrite($myfile, print_r($postData));
		fclose($myfile);
		 */
		if(!is_object($postData))
		{
			$message =  array('type' => 'error','message' => 'Invalid Json');
		}
		else
		{
			//$email = 'vikas.rana@netsmartz.net';
			$email = 'lloyd.porter@aol.com';
			$cc_email = 'pankaj.arora@netsmartz.net';
			//$cc_email = 'kapilbnsl0@gmail.com';
			$subject = 'Booking Request';
			
			$SpeechRecognizer = new SpeechRecognizer();
			$SpeechRecognizer->setParameter('server', 'http://api.ispeech.org/api/rest');
			$SpeechRecognizer->setParameter('apikey', 'developerdemokeydeveloperdemokey');
			$SpeechRecognizer->setParameter('freeform', '3');
			$SpeechRecognizer->setParameter('content-type', 'wav');
			$SpeechRecognizer->setParameter('locale', 'en-US');
			$SpeechRecognizer->setParameter('output', 'json');
			
			$pickUpLocation = '';
			$pickUpDate = '';
			$pickUpTime = '';
			$dropOffLocation = '';
			//$dropOffTime = '';
			
			$pickUpLocationPost = $postData->pick_up_location;
			$pickUpDatePost = $postData->pick_up_date;
			$pickUpTimePost = $postData->pick_up_time;
			$dropOffLocationPost = $postData->drop_off_location;
			//$dropOffTimePost = $postData->drop_off_time;
			
			// pick up location
			$SpeechRecognizer->setParameter('audio', $pickUpLocationPost);
			$pickUpLocationResult = $SpeechRecognizer->makeRequest();
			$pickUpLocationResult = json_decode($pickUpLocationResult);
			
			if( !empty($pickUpLocationResult) && $pickUpLocationResult->result =='success')
			{
				$pickUpLocation = $pickUpLocationResult->text;
			}
			
			// pick up date
			$SpeechRecognizer->setParameter('audio', $pickUpDatePost);
			$pickUpDatePostResult = $SpeechRecognizer->makeRequest();
			$pickUpDatePostResult = json_decode($pickUpDatePostResult);
			
			if( !empty($pickUpDatePostResult) && $pickUpDatePostResult->result =='success')
			{
				$pickUpDate = $pickUpDatePostResult->text;
			}
			
			// pick up time
			$SpeechRecognizer->setParameter('audio', $pickUpTimePost);
			$pickUpTimePostResult = $SpeechRecognizer->makeRequest();
			$pickUpTimePostResult = json_decode($pickUpTimePostResult);
			
			if( !empty($pickUpTimePostResult) && $pickUpTimePostResult->result =='success')
			{
				$pickUpTime = $pickUpTimePostResult->text;
			}
			
			// drop off location
			$SpeechRecognizer->setParameter('audio', $dropOffLocationPost);
			$dropOffLocationResult = $SpeechRecognizer->makeRequest();
			$dropOffLocationResult = json_decode($dropOffLocationResult);
		
			if( !empty($dropOffLocationResult) && $dropOffLocationResult->result =='success')
			{
				$dropOffLocation = $dropOffLocationResult->text;
			}
			
			// drop off time
			/* $SpeechRecognizer->setParameter('audio', $dropOffTimePost);
			$dropOffTimePostResult = $SpeechRecognizer->makeRequest();
			$dropOffTimePostResult = json_decode($dropOffTimePostResult);
			
			if( !empty($dropOffTimePostResult) && $dropOffTimePostResult->result =='success')
			{
				$dropOffTime = $dropOffTimePostResult->text;
			} */
			
			$emailText= '';
			if(!empty($phoneNumber))
			{
				$emailText = '<br/>Contact Number : '.$phoneNumber.'<br/>';
			}
			$emailText .= '<br/>Pick Up Location : '.$pickUpLocation;
			$emailText .= '<br/>Pick Up Date : '.$pickUpDate;
			$emailText .= '<br/>Pick Up Time : '.$pickUpTime;
			$emailText .= '<br/>Drop Off Location : '.$dropOffLocation;
			//$emailText .= '<br/>Drop Off Time : '.$dropOffTime;
			
			$template_data = array(
				'email_title' => 'Booking Request',
				'email_heading' => 'Hello',
				'email_body' => 'There is a booking request. Details are given below<br/>'.$emailText
			);

			$body =  $this->parser->parse('emails/ivr', $template_data, TRUE);
			if($this->common->sendEmail($email,$subject,$body,$cc_email))
			{
				$message =  array('type' => 'success','message' => 'An email has been sent with booking email.');
			}
			else
			{
				$message =  array('type' => 'error','message' => 'Unable to send email, please try again later.');
			}
		}	
		echo json_encode($message);
		exit;
	}
	public function index() {
		echo 'Webservice';
		 /* $user = Sentry::register(array(
			'email'    => 'john.doe@example.com',
			'password' => 'test',
		));
		$adminGroup = Sentry::findGroupById(3);

    // Assign the group to the user
    if ($user->addGroup($adminGroup))
		echo "<pre>";print_R($user);die; */
	}
	
	// Function to register a user under particular client.
	function register(){
		
	
	}

}