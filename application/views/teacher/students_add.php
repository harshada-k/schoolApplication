<?php 

/* Add value to variable */
$loc_stud_id                  = isset($edit_data['id']) ? $edit_data['id'] : "";
$loc_stud_name                = isset($edit_data['fname']) ? $edit_data['fname'] : "";
$loc_stud_email               = isset($edit_data['email']) ? $edit_data['email'] : "";
$loc_stud_password            = isset($edit_data['password']) ? $edit_data['password'] : "";
$loc_stud_address             = isset($edit_data['address']) ? $edit_data['address'] : "";
$loc_stud_mark                = isset($edit_data['mark']) ? $edit_data['mark'] : "";
$loc_stud_assigned_teacher_id = isset($edit_data['assigned_teacher_id']) ? $edit_data['assigned_teacher_id'] : "";

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
 
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <!-- Bootstrap Css -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div id="container_body">
  <form method="POST" action="<?php echo base_url(); ?>teacher/addStud">
    	<table class="" width="50%">
          <tr>
            <td><strong> Name </strong></td>
            <td>:</td>
            <td>
              <input type="hidden" name="hid_stud_id" value="<?php echo $loc_stud_id; ?>">
              <input type="text" name="txt_stud_name" class="form-control" placeholder="Enter student fullname" value="<?php echo $loc_stud_name; ?>">
            </td> 
          </tr>

          <tr>
            <td><strong> Address </strong></td>
            <td>:</td>
            <td><textarea name="txt_stud_address" class="form-control" >  <?php echo $loc_stud_address; ?> 
            </textarea></td> 
          </tr>

          <tr>
            <td><strong> Email </strong></td>
            <td>:</td>
            <td><input type="email" name="txt_stud_email" class="form-control" placeholder="Enter student email" value="<?php echo $loc_stud_email; ?>"></td>
          </tr>

          <tr>
            <td><strong> Password </strong></td>
            <td>:</td>
            <td><input type="password" name="txt_stud_pass" class="form-control" placeholder="Enter student password" value="<?php echo $loc_stud_password; ?>"></td>
          </tr>

          <tr>
            <td><strong> Mark </strong></td>
            <td>:</td>
            <td><input type="number" name="txt_stud_mark" class="form-control" placeholder="Enter student mark" value="<?php echo $loc_stud_mark; ?>"></td>
          </tr>

          <tr>
            <td><strong> Teacher assigned </strong></td>
            <td>:</td>
            <td><input type="text" name="txt_stud_teacher_assign" id="txt_stud_teacher_assign" class="form-control" placeholder="Enter student teacher assign" value="<?php echo $loc_stud_assigned_teacher_id; ?>"></td>
          </tr>

          <tr>
            <td></td>
            <td><input type="submit" value="Submit" class="btn btn-success"></td>
            <td></td>
          </tr>
      </table>
  </form>
</div>

<script type="text/javascript">
  $(function() {
     $( "#txt_stud_teacher_assign" ).autocomplete({
       source: '<?php echo base_url(); ?>teacher/getTeachers',
     });
  });
</script>
