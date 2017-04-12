<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		parent::__construct();

		$this->load->model('usermodel');
		$this->load->helper('url');
		$this->load->library('session');
		session_start();
	}
	public function index()
	{
		$this->load->view('construction');
	}


	public function save_user_donate_details()
	{
		$postData = file_get_contents("php://input");
        $postArray=json_decode($postData,true);
        
        if(@$postArray['user_detail']['phone']!='' && @$postArray['user_detail']['address']!='' && @$postArray['user_detail']['country']!='' && @$postArray['user_detail']['city']!='' && @$postArray['user_detail']['email']!='')
        {
			if(preg_match('/^\d{10}$/',$postArray['user_detail']['phone'])) // phone number is valid
			{
				$phoneNumber = '0' . $postArray['user_detail']['phone'];
			 
	        	$address=$postArray['user_detail']['address'];
	        	$country=$postArray['user_detail']['country'];
	        	$city=$postArray['user_detail']['city'];
	        	$phone=$phoneNumber;
	        	$email=$postArray['user_detail']['email'];
	        	$donate_details=$postArray['donate'];
	        	$data=array('address'=>$address,'country'=>$country,'city'=>$city,'phone'=>$phone,'email'=>$email,'donate_details'=>$donate_details);
	        	 
	        	if(isset($_SESSION['user_login']))
	        	{
	        		$insert=$this->usermodel->save_details($data,$_SESSION['user_login']);
	        		if(isset($insert))
	        		{
						$response['response']['status']='Ok';
						$response['response']['message']='Your details has been saved';	
	        		}
	        		else
	        		{
						$response['response']['status']='Error';
						$response['response']['message']='Somthing Went Wrong!! Please try again';
	        		}
	        		
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

        $respn=$this->usermodel->save_user($postArray);

        if(!empty($respn))
        {
        	$_SESSION['user_login']=$respn[0]['id'];
        	$_SESSION['fb_id']=$respn[0]['fb_id'];
        	$_SESSION['f_name']=$respn[0]['f_name'];
        	$_SESSION['photo_url']=$respn[0]['photo_url'];

			if(isset($_SESSION['curr_details']))
			{
				$insert=$this->usermodel->save_details($_SESSION['curr_details'],$_SESSION['user_login']);
				if(isset($insert))
				{
					unset($_SESSION['curr_details']);	
					$response['response']['status']='Ok';
					$response['response']['message']='Thank-you for donate your clothes! Our volunteer will contact you.';
				}
			}
        }
        else
        {
        	$response['response']['status']='Error';
        	$response['response']['message']='Somthing Went Wrong!! Please try again';
        } 

        echo json_encode($response);
        exit(); 
	}

	function check_login()
	{
		if(isset($_SESSION['user_login']) && $_SESSION['user_login']!='')
		{
			$response['response']['status']='Ok';
			$response['response']['message']='User Logged in!!';
			$response['response']['user_name']=$_SESSION['f_name'];
			$response['response']['photo_url']=$_SESSION['photo_url'];
		}
		else
		{
			$response['response']['status']='Ok';
			$response['response']['message']='User not logged in!!';
		}
		echo json_encode($response);
		exit();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */