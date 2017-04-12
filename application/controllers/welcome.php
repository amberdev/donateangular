<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('construction');
	}


	public function save_user_donate_details()
	{
		$postData = file_get_contents("php://input");
        $postArray=json_decode($postData,true);

        if(@$postArray['phone']!='' && @$postArray['address']!='' && @$postArray['country']!='' && @$postArray['city']!='' && @$postArray['email']!='')
        {
			if(preg_match('/^\d{10}$/',$postArray['phone'])) // phone number is valid
			{
				$phoneNumber = '0' . $postArray['phone'];
				 
	        	$address=$postArray['address'];
	        	$country=$postArray['country'];
	        	$phone=$phoneNumber;
	        	$email=$postArray['email'];
	        	$data=array('address'=>$address,'country'=>$country,'phone'=>$phone,'email'=>$email);
	        	if(isset($_SESSION['user_login']))
	        	{
	        		$this->usermodel->save_details($data);
	        		$response['response']['status']='Ok';
	        		$response['response']['message']='Your details has been saved';
	        	}
	        	else
	        	{
	        		$_SESSION['curr_details']=$data;
	        		$response['response']['status']='Error';
	        		$response['response']['code']='999';
	        		$response['response']['message']='You should login first!!';
	        	}
			}
			else // phone number is not valid
			{
				$response['response']['status']='Error';
				$response['response']['message']='Phone number invalid !';
			}
        }
        else
        {
			$response['response']['status']='Error';
			$response['response']['message']='Invalid Data!';
        }
        echo json_encode($response);
        exit();
	}

	function login()
	{
		$postData = file_get_contents("php://input");
        $postArray=json_decode($postData,true);

        $response=$this->usermodel->save_user($postArray);
        
        echo print_r($postArray);die;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */