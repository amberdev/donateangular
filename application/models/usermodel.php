<?php

 class Usermodel extends CI_Model
 {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}


	function save_user($data)
        {
                $dataUser['fb_id']=$data['user_data']['id'];
                $dataUser['photo_url']=$data['user_data']['picture']['data']['url'];
                $dataUser['full_name']=$data['user_data']['name'];
                $dataUser['f_name']=$data['user_data']['first_name'];
                $dataUser['l_name']=$data['user_data']['last_name'];
                $dataUser['email']=@$data['user_data']['email'];
                $dataUser['phone']='';
                $dataUser['address']=@$data['user_data']['hometown']['name'];
                $dataUser['created_on']=date('Y-m-d h:i:s');
                $dataUser['modified_on']=date('Y-m-d h:i:s');


                if(!empty($data['friends']))
                {

                        for($i=0;$i<count($data['friends']['data']);$i++)
                        {
                        	$frnd_fb_id=$data['friends']['data'][$i]['id'];
                                $frnd_name=$data['friends']['data'][$i]['name'];
                                $frnd_pic=$data['friends']['data'][$i]['picture']['data']['url'];

                                $this->db->where('user_fb_id',$dataUser['fb_id']);
                                $this->db->where('friend_id',$frnd_fb_id);
                                $frnd_exists=$this->db->get('tbl_friends');

                                if($frnd_exists->num_rows()==0)
                                {
                                        $data_insert=array('user_fb_id'=>$dataUser['fb_id'],'friend_id'=>$frnd_fb_id,'friend_name'=>$frnd_name,'friend_photo'=>$frnd_pic);
                                        $this->db->insert('tbl_friends',$data_insert);
                                }
                        } 
                }

                $this->db->where('fb_id',$data['user_data']['id']);
                $q=$this->db->get('tbl_users');
                if($q->num_rows()>0)
                {

                        return $q->result_array();
                }
                else
                {
                        $this->db->insert('tbl_users',$dataUser);
                        //echo $this->db->last_query();die;

                        $this->db->where('fb_id',$data['user_data']['id']);
                        $q=$this->db->get('tbl_users');
                        return $q->result_array(); 
                }
        }

        function save_details($data,$user_id)
        {
        	$donation=array('user_id'=>$user_id,'donate'=>$data['donate_details']);
        	unset($data['donate_details']);
        	$this->db->where('id',$user_id);
        	$this->db->update('tbl_users',$data);

        	$this->db->insert('tbl_donate',$donation);
        	return $this->db->insert_id();

        }
		
	}