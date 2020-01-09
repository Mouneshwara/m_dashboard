 <?php $this->load->view('header')?>
 <?php $this->load->view('saidnav')?>
 <div class="content-wrapper">
 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Employee Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo  base_url('dashboard_controller/employee_save')?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input type="text" class="form-control" name="First_Name" placeholder="First Name">
                </div>
                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control" name="Last_Name" placeholder="Last Name">
                </div>
                <div class="form-group">
                  <label for="mobileNumber">Mobile Number</label>
                  <input type="text" class="form-control" name="Mobile_Number" onchange="mobile_check()" id="mobile_example" placeholder="Mobile Number">
               <span id="error_msg_email" style="color: red";></span>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="Email" onClick="email_check()"  id="emailexample" placeholder="Email">
                  <span id="error_msg_email" Style="color:red"></span>
                </div>
                <div class="form-group">
                  <label for="officAddress">Office Address</label>
                  <input type="text" class="form-control" name="Office_Address" placeholder="Office Address">
                </div>
                <div class="form-group">
                  <label for="permanentAddress">Permanent Address</label>
                  <input type="text" class="form-control" name="Permanent" placeholder="Permanent Address">
                </div>
                <div class="form-group">
                  <label for="state">State</label>
                  <input type="text" class="form-control" name="state" placeholder="State">
                </div>
                <div class="form-group">
                  <label for="pinCode">Pin Code</label>
                  <input type="text" class="form-control" name="pin_code" placeholder="Pin Code">
                </div>
                 <div class="form-group">
                  <label for="country">Country</label>
                  <input type="text" class="form-control" name="country" placeholder="Country">
                </div>
            
            	<div class="form-group">
                  <label for="country">Image</label>
                  <input type="file" class="form-control" name="file1" placeholder="Add_Image">
                </div>
            
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <!-- <button onclick="email_check()">Try it</button> -->
            </form>
          </div>
        </div>
       
      </div>
     
    </section>
    </div>
 
    
    <?php $this->load->view('footer')?> 
     
   
    <script type="text/javascript">

  $(document).ready(function () {
	  
    $('#emailexample').change(function(){  
    	
           var employee_email= $('#emailexample').val();  
           //alert(employee_email);
           if(employee_email!= '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Dashboard_controller/email_check",  
                     method:"POST",  
                     data:{employee_email:employee_email},  
                     success:function(data){ 
                        // alert(1);
                         $('#error_msg_email').html(data);  
                     }  
                });  
           }  
      });  
  });

  $(document).ready(function () {
	  
	    $('#mobile_example').change(function(){  
	    	
	           var mobile= $('#mobile_example').val();  
	          //alert(mobile);
	           if(mobile!= '')  
	           {  
	                $.ajax({  
	                     url:"<?php echo base_url(); ?>Dashboard_controller/mobile_check",  
	                     method:"POST",  
	                     data:{mobile:mobile},  
	                     success:function(data){ 
	                         //alert(1);
	                         $('#error_msg_email').html(data);  
	                     }  
	                });  
	           }  
	      });  
	  });
</script>
   
