

<div id="container_body">
  <button><a class="btn btn-primary" href="<?php echo base_url(); ?>teacher/addStud" title="Add Student" >Add student</a></button>

    <?php        
        if($this->session->flashdata('error') || $this->session->flashdata('success')){
          ?>
          <div class="alert <?php ($this->session->flashdata('success')) ? "alert-success" : "alert-danger" ?> text-center" style="margin-top:20px;">
            <?php echo $this->session->flashdata('success') ? $this->session->flashdata('success') : $this->session->flashdata('error'); ?>
          </div>
          <?php
        }
      ?>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Password</th>
      <th scope="col">Mark</th>
      <th scope="col">Teacher Assigned</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      if(!empty($result) && count($result) > 0)
      {
        foreach($result as $k => $stud_data)
        {
    ?>
          <tr>
            <th scope="row"><?php echo $k+1; ?></th>
            <td><?php echo $stud_data['fname']; ?></td>
            <td><?php echo $stud_data['email']; ?></td>
            <td><?php echo $stud_data['address']; ?></td>
            <td><?php echo $stud_data['password']; ?></td>
            <td><?php echo $stud_data['mark']; ?></td>
            <td><?php echo $stud_data['assigned_teacher_id']; ?></td>
            <td>
                <a href="<?php echo base_url(); ?>teacher/editStud/<?php echo $stud_data['id']; ?>" title="Edit student">Edit</a>
                <a href="#" title="Delete student">Delete</a>
            </td>
          </tr>
     <?php } } ?>     
  </tbody>
</table>
</div>
