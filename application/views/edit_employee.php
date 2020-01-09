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
              <h3 class="box-title">Edit Employee Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($result_set as $row){?>
            <form role="form" method="post" action="<?php echo  base_url('dashboard_controller/update')?>" enctype="multipart/form-data">
            <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $row->emp_id;?>" >
              <div class="box-body">
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input type="text" class="form-control" name="First_Name" value="<?php echo $row->FirstName;?>" placeholder="First Name">
                </div>
                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control" name="Last_Name" value="<?php echo $row->LastName;?>" placeholder="Last Name">
                </div>
                <div class="form-group">
                  <label for="mobileNumber">Mobile Number</label>
                  <input type="text" class="form-control" name="Mobile_Number" id="mobile_example" value="<?php echo $row->MobileNumber;?>" placeholder="Mobile Number">
                <span id="error_msg_mobile" Style="color:red"></span>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="Email" id="emailexample" value="<?php echo $row->Email;?>" placeholder="Email">
                 <span id="error_msg_email" Style="color:red"></span>
                </div>
                <div class="form-group">
                  <label for="officAddress">Office Address</label>
                  <input type="text" class="form-control" name="Office_Address" value="<?php echo $row->OfficeAddress;?>" placeholder="Office Address">
                </div>
                <div class="form-group">
                  <label for="permanentAddress">Permanent Address</label>
                  <input type="text" class="form-control" name="Permanent" value="<?php echo $row->permanentAddress;?>" placeholder="Permanent Address">
                </div>
                <div class="form-group">
                  <label for="state">State</label>
                  <input type="text" class="form-control" name="state" value="<?php echo $row->State;?>" placeholder="State">
                </div>
                <div class="form-group">
                  <label for="pinCode">Pin Code</label>
                  <input type="text" class="form-control" name="pin_code" value="<?php echo $row->Pincode;?>" placeholder="Pin Code">
                </div>
                 <div class="form-group">
                  <label for="country">Country</label>
                  <input type="text" class="form-control" name="country" value="<?php echo $row->Country;?>" placeholder="Country">
                </div>
                <div class="form-group">
                  <label for="country">Image</label>
                  <img src="<?php echo base_url('uploads/'.$row->Image)?>" alt="Proffil_Image" width="42" height="42">
                  <input type="file" class="form-control" name="file1" value="<?php echo $row->Image;?>" placeholder="Add_Image">
                </div>
            
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
            <?php }?>
          </div>
         
        </div>
        
      </div>
      <!-- /.row -->
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
                     url:"<?php echo base_url(); ?>Dashboard_controller/edit_email_check",  
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
	                     url:"<?php echo base_url(); ?>Dashboard_controller/edit_mobile_check",  
	                     method:"POST",  
	                     data:{mobile:mobile},  
	                     success:function(data){ 
	                         //alert(1);
	                         $('#error_msg_mobile').html(data);  
	                     }  
	                });  
	           }  
	      });  
	  });
</script>
   
                 