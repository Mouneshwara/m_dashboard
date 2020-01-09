<?php

class Dashboard_controller extends CI_Controller{
	
	    public function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_Model','',TRUE);
	}
	
			public function index()
			{
				$this->load->view('login_view');
			}
	//----------------------Login-----------------------------//
	
	
			public function Login()	
			{
			
		    $user_name=$this->input->post('email');
		   // $admin_name=$this->input->post('admin_name');
			$password=$this->input->post('password');
			$this->load->model('dashboard_model');
			$result=$this->dashboard_model->Login($user_name,$password);
	      echo json_encode($result);
	        
			if($result!=false)
			{
				$sess_array = array();
				foreach($result as $row)
				{
					$sess_array = array(
							'emp_id' => $row->emp_id,
						    'FirstName' =>$row->FirstName,
							'Email' => $row->Email,
							'password'=>$row->password,
							'Image'=>$row->Image
								
					);
					
					$this->session->set_userdata("emp_id", $row->emp_id);
					$this->session->set_userdata("FirstName", $row->FirstName);
					$this->session->set_userdata("Email", $row->Email);
					$this->session->set_userdata("Image",$row->Image);
					$this->session->set_userdata('logged_in', $sess_array);
				}
				redirect('Dashboard_Controller/add_employee');
		}
	 
		 else{
		 	//echo "++++++";
				 $this->session->set_flashdata('error','Invalid password or User Name');
				 
				redirect(base_url(), 'refresh'); 
			} 
 	//echo "fdgrhuhgfd";
 	
		}
		
		//---------------------Log Out------------------------//
		
		public function logout()
		{
			 
			$this->session->unset_userdata('Email');
			$this->session->sess_destroy();
			
			//$this->load->view('login_view');
			redirect(base_url(), 'refresh'); 
		}
		
			/* -------------------Save Employee------------------- */
		
		public function add_employee(){
			$this->load->view('add_employee');
			
		}
		public function employee_save(){
			$first_name=$this->input->post('First_Name');
			$last_name=$this->input->post('Last_Name');
			$mobile_number=$this->input->post('Mobile_Number');
			$email=$this->input->post('Email');
			$office_address=$this->input->post('Office_Address');
			$permanent_address=$this->input->post('Permanent');
			$state=$this->input->post('state');
			$pin_code=$this->input->post('pin_code');
			$contry=$this->input->post('country');
			
			$allowedExts = array("png,jpg,jpeg");
        	$temp = explode(".",$_FILES['file1']['name']);
        	$extension = end($temp);
        	if ($_FILES["file1"]["error"] > 0)
        	{
            "Return Code: " . $_FILES["file1"]["error"] . "<br>";
	        }
	        else
	        {        
	             move_uploaded_file($_FILES["file1"]["tmp_name"],
	        "uploads/".$_FILES['file1']["name"]);
	              $picname=$_FILES['file1']['name'];
			}
			
			$result=$this->Dashboard_Model->is_email_available($email);
			if($result!=true){
			
				$data = array(
						'FirstName'=>$first_name,
						'LastName'=>$last_name,
						'MobileNumber'=>$mobile_number,
						'Email'=>$email,
						'OfficeAddress'=>$office_address,
						'permanentAddress'=>$permanent_address,
						'State'=>$state,
						'Pincode'=>$pin_code,
						'Country'=>$contry,
						'Image'=>$picname
							
				);
				$this->load->Model('Dashboard_Model');
				$this->Dashboard_Model->datasave($data);
				
			}
		
			
			redirect('Dashboard_Controller/view_employee');
		}

		/*----------------------Display Employee-------------------------- */
			
		public function view_employee(){
				
			//$this->load->view('view_employee');
			$this->load->model('Dashboard_Model');
		    $data['result_set']=$this->Dashboard_Model->getRows();
		    $this->load->view('view_employee',$data);
		}
		
		/*-------------------------Edit Employee------------------------ */
		public function edit($emp_id){
			//echo "cddddddddz";
			$this->load->model('Dashboard_Model');
			$data['result_set']=$this->Dashboard_Model->edit($emp_id);
// 			echo json_encode($data['result_set']);
			$this->load->view('edit_employee',$data);
				
		}
		
		public function update(){
			$emp_id=$this->input->post('emp_id');
			$first_name=$this->input->post('First_Name');
			$last_name=$this->input->post('Last_Name');
			$mobile_number=$this->input->post('Mobile_Number');
			$email=$this->input->post('Email');
			$office_address=$this->input->post('Office_Address');
			$permanent_address=$this->input->post('Permanent');
			$state=$this->input->post('state');
			$pin_code=$this->input->post('pin_code');
			$contry=$this->input->post('country');
			
			$allowedExts = array("png,jpg,jpeg");
			$temp = explode(".",$_FILES['file1']['name']);
			$extension = end($temp);
			if ($_FILES["file1"]["error"] > 0)
			{
				"Return Code: " . $_FILES["file1"]["error"] . "<br>";
			}
			else
			{
				move_uploaded_file($_FILES["file1"]["tmp_name"],
				"uploads/".$_FILES['file1']["name"]);
				$picname=$_FILES['file1']['name'];
			}
				
			$result=$this->Dashboard_Model->is_email_available($email);
			if($result!=true){
					
			$data = array(
					'FirstName'=>$first_name,
					'LastName'=>$last_name,
					'MobileNumber'=>$mobile_number,
					'Email'=>$email,
					'OfficeAddress'=>$office_address,
					'permanentAddress'=>$permanent_address,
					'State'=>$state,
					'Pincode'=>$pin_code,
					'Country'=>$contry,
					'Image'=>$picname
			);
			
			$this->load->Model('Dashboard_Model');
			$this->Dashboard_Model->update_save($data,$emp_id);
			}
			//redirect('Dashboard_Controller/view_employee');
			
		}
/*---------------------------------Delete Employee--------------------------  */
		public function delete($emp_id){
			$this->load->model('Dashboard_Model');
			$this->Dashboard_Model->delete($emp_id);
			redirect('Dashboard_Controller/view_employee');
				
		}
		
		
/*---------------------------------------update_profile----------------------- */
// 		public function update_profile(){
	

//   $this->load->model('Dashboard_Model');
//     $id = $this->uri->segment(3);
//     echo '<script>alert('.$id.')</script>';  
//     $this->load->view('forgot_password');

// 		}
		
		 
/*----------------------------------------forgot_password------------------------*/
/* -------------------------------login email Check ------------------------ */
      function forgot_password()  
      {  
          $this->load->view('forgot_password');
          
          $email=$this->input->post('email');
          //$this->load->Model('Dashboard_Model');
           
          $result=$this->Dashboard_Model->is_login_email_available($email);
           
          if ($result==true)
          {
          	//echo "Email Already Exists";
          	
          		$data['user'] = $result;
          		echo "Hi, ".$result[0]['c_name']." Check your mailbox.";
          		$this->load->library('email');
          		$config  =  array  (
          				'mailtype' => 'html',
          				'charset'  => 'utf-8',
          				'priority' => '1'
          		);
          	
          		
          		$this->email->initialize($config);
          		$this->email->from('kartheekvee17@gmail.com', 'Forgot Password Mail');
          		$this->email->to($result[0]['c_mail']);
          		$this->email->subject('Password Recovery Mail');
          		$emaildescription=$this->load->view('forgot_password',$data,TRUE);
          		$this->email->message($emaildescription);
          		$result=$this->email->send();
          	
          	
          }
          else
          {
          	echo "Email ID Dosn't Exists";
          }
          } 
          
        
			
   
   /* ---------------mst_employee email Check ------------------------*/
   public  function email_check()
   {
   
   $email=$this->input->post('employee_email');
   //$this->load->Model('Dashboard_Model');
   
  	$result=$this->Dashboard_Model->is_email_available($email);
   
 	if ($result==true)
 	{
    		echo "Email Already Exists";
   	}
   	else
   	   	{
   	   		echo "";
   	   	   	   	}
 	}
 	
 	/* ---------------mst_employee mobile Check ------------------------ */
 	public  function mobile_check()
 	{
 		 
 		$mobile=$this->input->post('mobile');
 		//$this->load->Model('Dashboard_Model');
 		 
 		$result=$this->Dashboard_Model->is_mobile_available($mobile);
 		 
 		if ($result==true)
 		{
 			echo "Mobile Number Already Exists";
 		}
 		else
 		{
 			echo "";
 		}
 	}
 	/* ---------------mst_employee edit_email Check ------------------------ edit_email_check*/
 	public  function edit_email_check()
 	{
 		 
 		$email=$this->input->post('employee_email');
 		//$this->load->Model('Dashboard_Model');
 		 
 		$result=$this->Dashboard_Model->is_edit_email_available($email);
 		 
 		if ($result==true)
 		{
 			echo "Email Already Exists";
 		}
 		else
 		{
 			echo "";
 		}
 	}
 	
 	/* ---------------mst_employee mobile Check ------------------------ */
 	public  function edit_mobile_check()
 	{
 	
 		$mobile=$this->input->post('mobile');
 		//$this->load->Model('Dashboard_Model');
 	
 		$result=$this->Dashboard_Model->is_edit_mobile_available($mobile);
 	
 		if ($result==true)
 		{
 			echo "Mobile Number Already Exists";
 		}
 		else
 		{
 			echo "";
 		}
 	}
 	
 	/*----------------------------------Add Multiple Images--------------------  */
 	public function view_multImages(){
 		$this->load->view('add_multImages');
 	}
 	
 	public function save_multipleimages(){
 		$this->load->library('upload');
 	
 		// $user_name=$this->input->post('employee_name');
 		 $sesssion_id=$this->session->userdata('sl_user_id');
 	
 		$files = $_FILES;
 		$cpt = count($_FILES['files']['name']);
 		//$picname=$_FILES['file1']['name'];
 		for($i=0; $i<$cpt; $i++)
 		{
 		$_FILES['files']['name']= $files['files']['name'][$i];
 		$_FILES['files']['type']= $files['files']['type'][$i];
 				$_FILES['files']['tmp_name']= $files['files']['tmp_name'][$i];
 						$_FILES['files']['error']= $files['files']['error'][$i];
 						$_FILES['files']['size']= $files['files']['size'][$i];
 				
 		//$image_name=$_FILES['files']['name'];
 		$image_name=str_replace("","_",$_FILES['files']['name']);
 		//$extension = pathinfo($image_name, PATHINFO_EXTENSION);
 	
 		//$picname=$id.".".$extension;
 	
 	
 		move_uploaded_file($_FILES['files']['tmp_name'],"uploads/".$_FILES['files']['name']);
 	
 		$data1=array(
 		'admin_id'=>$sesssion_id,
 				'Images'=>$image_name
 			);
 	
 		$this->Dashboard_Model->save_multipleimages($data1);
 			
 	}
 	redirect('Dashboard_Controller/view_mlutImage');
 	}
 	
 	
 public function view_mlutImage(){
 	$this->load->model('Dashboard_Model'); 	
  	$data['result_set1']=$this->Dashboard_Model->getRows1(); 	
       $this->load->view('view_mlutImage',$data );
//  	redirect('Dashboard_Controller/view_mlutImage');
//echo "tgrfedwsq";
 	
 }
   }















?>