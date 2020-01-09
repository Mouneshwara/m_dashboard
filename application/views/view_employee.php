<?php $this->load->view('header')?>
 <?php $this->load->view('saidnav')?>
 <div class="content-wrapper">
<table id="example" class="table table-striped table-bordered" style="width:100%" border="1">
        <thead>
            <tr>
                <th>EmpID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Office Address</th>
                <th>PermanentAddress</th>
                <th>State</th>
                <th>Pin Code</th>
                <th>Country</th>
                <th>Add Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
       <tr>
       <?php 
		$i=1;
		foreach ($result_set as $row){ ?>
                <td><?php echo $i++;?></td>
                <td><?php echo $row->FirstName;?></td>
                <td><?php echo $row->LastName;?></td>
                <td><?php echo $row->MobileNumber;?></td>
                <td><?php echo $row->Email;?></td>
                <td><?php echo $row->OfficeAddress;?></td>
                <td><?php echo $row->permanentAddress;?></td>
                <td><?php echo $row->State;?></td>
                <td><?php echo $row->Pincode;?></td>
                <td><?php echo $row->Country;?></td>
                <td><img src="<?php echo base_url('uploads/'.$row->Image)?>" alt="Proffil_Image" width="42" height="42"></td>
                <td> <a href="<?php echo base_url('Dashboard_controller/edit/'.$row->emp_id)?>">Edit</a></td>
                <td> <a href="<?php echo base_url('Dashboard_controller/delete/'.$row->emp_id)?>" onclick="return confirm('Are you sure to delete?')" >Delete</a></td>
                
    </tr>
        <?php }?>
    </table>
    
    
    </div>
    
    <?php $this->load->view('footer')?>    