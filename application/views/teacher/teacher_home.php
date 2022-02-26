<?php
$user = $this->session->userdata('teacher');
extract($user);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CodeIgniter Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<section class="menu cid-qyXaCrsen3" once="menu" id="menu3-3n" data-rv-view="3209">
		    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
		        <div class="navbar-brand">            
		            <span class="navbar-caption-wrap text-white">
		                    Welcome <?php echo $fname; ?>
		            </span>
		        </div>        
		      	<div class="collapse navbar-collapse" id="navbarSupportedContent">            
		            <div class="icons-menu">
		              	<a class="btn btn-sm btn-white-outline display-4" href="<?php echo base_url(); ?>teacher/myStud">My Students</a>

		                <a class="btn btn-sm btn-white-outline display-4" href="<?php echo base_url(); ?>teacher/teacher/logout">Logout</a>
		              
		         </div>
		            
		      </div>
		    </nav>
    </section>
	<!-- <h1 class="page-header text-center">CodeIgniter Login with Flashdata Teacher</h1>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<?php
				$user = $this->session->userdata('teacher');
				extract($user);
			?>
			<h2>Welcome to Teacher Homepage </h2>
			<h4>User Info:</h4>
			<p>Fullname: <?php echo $fname; ?></p>
			<p>Email: <?php echo $email; ?></p>
			<p>Password: <?php echo $password; ?></p>
			<a href="<?php echo base_url(); ?>teacher/teacher/logout" class="btn btn-danger">Logout</a>
		</div>
	</div> -->
</div>
</body>
</html>
