 <?php $this->load->view('header')?>
 <?php $this->load->view('saidnav')?>
  <div class="content-wrapper">
<table id="example" class="table table-striped table-bordered" style="width:100%" border="1">
        <thead>
            <tr>
               
                <th>Admin ID</th>
                <th>Images</th>
                
                </tr>
                </thead>
                <tbody>
       <tr>
       <?php 
		
		foreach ($result_set1 as $row){ ?>
              
                <td><?php  echo $row->admin_id;?></td>
               <td><img src="<?php echo base_url('uploads/'.$row->Images)?>" alt="Proffil_Image" width="42" height="42"></td>
                <?php   }?>
                </tr>
                </tbody>
                
                </table>
                
                </div>
  
  
 <?php $this->load->view('footer')?>