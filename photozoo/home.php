<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title>photozoo</title>       
        
        <link rel="stylesheet" href="style/css.css" type="text/css"/>
        <link href="style/css/bootstrap.min.css" rel="stylesheet" media="screen"  />
        <script src="style/js/bootstrap.min.js"></script>
		<script src="http://code.jquery.com/jquery-latest.js"></script>      
        
    </head>
    
    <body>
    <?php include 'core/init.php';
	protect_page();
	include('includes/nav2.php');?> 
	
	
	<?php if(isset($_SESSION['user_id'])){
	$_SESSION['username']=$user_data['username'];
	$username=$_SESSION['username'];} ?>	
	
                           
			<div id="content">
                <h1><a class="text-info" href="albums.php" style="padding: 100px; font-size: xx-large; color: #F66;"><i class="icon-star"></i> <strong>PhotoZoo</strong></a></h1>
                
				<aside>
					<div class="widget">
						<h2><?php include 'display.php';?><a href="albums.php"><?php echo $user_data['first_name']; ?>!</h2>
						
							<div class="inner">
								<ul>
									<li>
										<a href="logout.php">Logout</a>
									</li>
									<li>
										<a href="settings.php">Settings</a>
									</li>
									<li>
										<a href="<?php echo $user_data['username'];?>">Profile</a>
									</li>
									<li>
										<a href="create_album.php">Create Album</a>
									</li>
									<li>
										<a href="albums.php">Albums</a>
									</li>
									<li>
										<a href="upload_image.php">Upload image</a>
									</li>
								</ul>
							</div>
					</div><!--end of widget!-->
					<div class="widget">
						<h2>Users</h2>
							<div class="inner">
								<?php  
								$user_count=user_count();
								$suffix=($user_count!=1)?'s':'';
								?>
								We current have <?php echo user_count(); ?> registered user<?php echo $suffix; ?>.
							</div>
					</div><!--end of widget!-->
				</aside>
                

         <?php include('includes/footer.php'); ?>  
            </div> <!-- end #content -->
                     
	</body>
</html>