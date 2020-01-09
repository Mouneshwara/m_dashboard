 <?php 
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// $connection = new mysqli("localhost","root","m_dashboard");
// if($_POST)
// {
// 	$email = $_POST['email'];
// 	$selectquery = $mysqli_query($connection,"select * from admin_login where email='{$email}'") or die(mysqli_error($connection)); 
// 	$count = mysqli_num_rows($selectquery);
// 	$row = mysqli_fetch_array($selectquery);
// 	if($count>0){
		
// 		require 'vendor/autoload.php';
		
// 		$mail = new PHPMailer(true);
// 		try {
// 			$mail->SMTPDebud = 0 ;
// 			$mail -> isSMTP();
// 			$mail->Host = 'smtp.gmail.com';
// 			$mail->SMTPAuth = true;
// 			$mail->Username ="mouneshwarakalal@gmail.com";
// 			$mail->Password ="Mounesh16";
// 			$mail->SMTPSecure = 'tls';
// 			$mail->port =587;
			
// 			$mail->setFrom('mouneshwarakalal@gmail.com','Mounesh');
// 			$mail->address($email,$email);
			
// 			$mail->isHTML(true);
// 			$mail->Subject = 'Forgot Password';
// 			$mail->Body = "Hi $email Your Password is {$row['password']} ";
// 			$mail->AltBody = "Hi $email Your Password is {$row['password']} ";
			
// 			$mail->send();
// 			echo 'Your Password has been sent Your Mail id';
// 		}catch (Exception $e){
// 			echo 'Email could not be Sent.';
// 			echo 'Mailer Error:' .$mail->ErrorInfo;
// 		}
// 	}
// 	else {
// 	 echo "<script>alert(Email could not be Sent);</script>";	
// 	}
// }

?> 
<div class="modal-body">         
          <form id="resetPassword" name="resetPassword" method="post" action="<?php echo base_url("Dashboard_Controller/forgot_password");?>
          " onsubmit ='return validate()'>
         <table class="table table-bordered table-hover table-striped">                                      
                    <tbody>
                    <tr>
                    <td>Enter Email: </td>
                    <td>
                <input type="email" name="email" id="email" style="width:250px" required>
                 <span id="email_result" style="width:250px; color:red;"></span>  
                 </td>
                    <td><input type = "submit" value="submit" class="button"></td>
                    </tr>
                   
                    </tbody>               </table></form> 
 			     <div id="fade" class="black_overlay"></div>       
         </div> 
        
        
        <script type="text/javascript">
        $(document).ready(function () {
      	  
    	    $('#email').change(function(){  
    	    	
    	           var email= $('#email').val();  
    	          //alert(mobile);
    	           if(mobile!= '')  
    	           {  
    	                $.ajax({  
    	                     url:"<?php echo base_url(); ?>Dashboard_controller/login_email_check",  
    	                     method:"POST",  
    	                     data:{email:email},  
    	                     success:function(data){ 
    	                         //alert(1);
    	                         $('#email_result').html(data);  
    	                     }  
    	                });  
    	           }  
    	      });  
    	  });
</script>
     