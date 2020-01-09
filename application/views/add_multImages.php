 <?php $this->load->view('header')?>
 <?php $this->load->view('saidnav')?>
  <div class="content-wrapper">
  <form role="form" method="post" action="<?php echo  base_url('Dashboard_Controller/save_multipleimages')?>" enctype="multipart/form-data">
 <div class="form-group">
                  <label for="country">Image</label>
                  <input type="file" class="form-control" name="files[]" multiple/>
                 
                </div>
                 <input type="submit" name="submit" value="submit">
                 </form>
</div>
	<?php $this->load->view('footer')?>