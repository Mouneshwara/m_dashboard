<?php
class Dashboard_Model extends  CI_Model{

function Login($user_id,$password)
  { 
    $sql = "SELECT * FROM  mst_employee WHERE  Email=? and password=? ";
    $binds = array($user_id,$password);
    $query = $this->db->query($sql, $binds);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  
    }
    
    /*-------------------------------ADD Employee------------------------*/
    public function datasave($data){
    
    	$this->db->insert('mst_employee',$data);
    }
    
    
    
    /*--------------------------------View Employee------------------------*/
    public function getRows(){
    
    	$query=$this->db->query("select * from mst_employee");
    	$result = $query->result();
    	return $result;
    
    }
    /*-----------------------------------Edit Employee---------------------  */
    
    public function edit($emp_id) {
    		
    	//$update = $this->db->edit("update FROM user_data where sk_id=$id");
    	$query=$this->db->query("select * from mst_employee where emp_id=$emp_id");
    
    	$result = $query->result();
    	return $result;
    }
    
    /*------------------------------Update Employee-----------------------------*/
    public function update_save($data1,$emp_id){
    	$this->db->where('emp_id',$emp_id);
    	$this->db->update('mst_employee',$data1);
    }
    /*--------------------------------Delet Employee----------------------------  */
    public function delete($emp_id){
    	$query=$this->db->query("DELETE FROM mst_employee where emp_id=$emp_id");
    }
    /*--------------------------------Forgot_Password-----------------------------  */
    
    //funtion to get email of user to send password
//     public function sendpassword($data) {
//     	$email = $data['email'];
    
//     	$query1 = $this->db->query("SELECT * from admin_login where email='" . $email . "'");
//     	$row = $query1->result_array();
    
//     	if ($query1->num_rows() > 0) {
    
//     		$this->load->library('email');
    
//     		//SMTP & mail configuration
//     		$config = array(
//     				'protocol' => 'smtp',
//     				'mailpath' => 'E:\xampp\htdocs\wp\m_dashboard',
//     				'smtp_host' => 'ssl://smtp.googlemail.com',
//     				'smtp_port' => 465,
//     				'smtp_user' => 'mouneshwarakalal@gmail.com',
//     				'smtp_pass' => 'Mounesh16',
//     				'mailtype' => 'html',
//     				'charset' => 'utf-8'
//     		);
//     		$this->email->initialize($config);
//     		$this->email->set_mailtype("html");
//     		$this->email->set_newline("\r\n");
    
//     		//Email content
    
//     		$this->email->from('mngoudaks@gmail.com', 'Admin');
//     		$this->email->to($email);
//     		$this->email->subject('Password reset request');
//     		$mail_message = 'Dear ' . $row[0]['full_name'] . ',' . "<br>\r\n";
//     		$mail_message .= 'Thanks for contacting regarding to forgot password,<br> Click On Link And Reset Password:<b><a href="http://www.ciadmin.local/welcome/update_password">Reset Password</a></b>'."\r\n";
//     		$mail_message .= '<br>Please Update your password.';
//     		$mail_message .= '<br>Thanks & Regards';
//     		$mail_message .= '<br>Red Feather Software';
    
//     		$this->email->message($mail_message);
    
//     		//Send email
    
//     		if ($this->email->send()) {
    
//     			echo '<script>alert("success..!")</script>';
//     		} else {
//     			echo '<script>alert("Please Try Again Later..!")</script>';
    
//     		}
//     	}
//     }

  /* forgot password emailcheing  */  
//     function is_email_available($email)
//     {
//      	//$this->db->where('email', $email);
//      	//$query = $this->db->get("x=");
    	
//     	$query = $this->db->query("SELECT * from admin_login where email='" . $email . "'");
//     	echo $query;
//         $row = $query->result_array();
//     	if($row->num_rows() > 0)
//     	{
//     		return true;
//     	}
//     	else
//     	{
//     		return false;
//     	}
//     }is_mobile_available

    /* ---------------login email Check ------------------------ */
    function is_login_email_available($email)
    {
    	$sql = 'SELECT * FROM admin_login WHERE email = ?';
    	$binds = array($email);
    	$query = $this->db->query($sql, $binds);
    	if ($query->num_rows() > 0)
    	{
    		return true;
    	} else {
    		return false;
    	}
    }
   /* ---------------mst_employee email Check ------------------------ */ 
    function is_email_available($email)
    {
    	$sql = 'SELECT * FROM mst_employee WHERE Email = ?';
    	$binds = array($email);
    	$query = $this->db->query($sql, $binds);
    	if ($query->num_rows() > 0)
    	{
    		return true;
    	} else {
    		return false;
    	}
    }
    /* ---------------mst_employee mobile Check ------------------------ */
    function is_mobile_available($mobile)
    {
    	$sql = 'SELECT * FROM mst_employee WHERE MobileNumber = ?';
    	$binds = array($mobile);
    	$query = $this->db->query($sql, $binds);
    	if ($query->num_rows() > 0)
    	{
    		return true;
    	} else {
    		return false;
    	}
    }
    /* ---------------mst_employee edit_email Check ------------------------ */
    function is_edit_email_available($email)
    {
    	$sql = 'SELECT * FROM mst_employee WHERE Email = ?';
    	$binds = array($email);
    	$query = $this->db->query($sql, $binds);
    	if ($query->num_rows() > 0)
    	{
    		return true;
    	} else {
    		return false;
    	}
    }
    /* ---------------mst_employee edit_mobile Check ------------------------ */
    function is_edit_mobile_available($mobile)
    {
    	$sql = 'SELECT * FROM mst_employee WHERE MobileNumber = ?';
    	$binds = array($mobile);
    	$query = $this->db->query($sql, $binds);
    	if ($query->num_rows() > 0)
    	{
    		return true;
    	} else {
    		return false;
    	}
    }
    public function getRows1(){
    
    	$query=$this->db->query("select * from multimages");
    	$result = $query->result();
    	return $result;
    
    }
   public  function save_multipleimages($data1){
   	$this->db->insert('multimages',$data1);
   }
}
?>