<div class="fwp-dashboard">
	<div class="menubar fixed">
		<div class="sidebar-toggler visible-xs">
			<i class="ion-navicon"></i>
		</div>
	
		<form class="search hidden-xs">
			<i class="fa fa-search"></i>
			<input type="text" name="q" placeholder="Search Installations..." />
			<input type="submit" />
		</form>
		
		<a href="<?php echo params(array("tab" => "upgrade")); ?>" class="new-user btn btn-success pull-right">
			<span>New WP Installation</span>
		</a>
	</div>

	<div class="content-wrapper">
		<div class="metrics clearfix">
			<div class="metric">
				<span class="field">WP Installations</span>
				<span class="data">1</span>
			</div>
			<div class="metric">
				<span class="field">WP Users</span>
				<span class="data">4</span>
			</div>
			<div class="metric">
				<span class="field">Disk Usage</span>
				<span class="data">0.56 GB</span>
			</div>
			<div class="metric">
				<span class="field">Bandwidth</span>
				<span class="data">4.78 GB</span>
			</div>
		</div>

		<div class="content-wrapper">

			<div class="row users-list">
				<div class="col-md-12">
					<div class="row headers">
						<div class="col-sm-1 header select-users">
						</div>
						<div class="col-sm-2 header hidden-xs">
							<label><a href="#">Installation</a></label>
						</div>
						<div class="col-sm-5 header hidden-xs">
							<label class=" text-center"><a href="#">Actions</a></label>
						</div>
						<div class="col-sm-2 header hidden-xs">
							<label class=" text-center"><a href="#">Disk Usage</a></label>
						</div>
						<div class="col-sm-2 header hidden-xs">
							<label class=" text-center"><a href="#">Bandwidth</a></label>
						</div>
					</div>
					<div class="row user">
						<div class="col-sm-1 avatar">
							<img src="images/server.jpg" />
						</div>
						<div class="col-sm-2">
							<a href="#" class="name">SampleSite.com</a>
						</div>
						<div class="col-sm-5">
							<div class="name text-center" style="color: #ccc; text-decoration: none; ">
								<a href="<?php echo params(array("tab" => "server")); ?>">Overview</a> &nbsp; | &nbsp; 
								<a href="#" class="error-notification" data-error="This is a demo installation, so no WP Admin actually exists. This link would normally redirect there.">WP Admin</a> &nbsp; | &nbsp; 
								<a href="#" class="error-notification" data-error="This is a demo installation, so no phpMyAdmin actually exists. This link would normally redirect there.">phpMyAdmin</a> &nbsp; | &nbsp; 
								<a href="#" class="error-notification" data-error="This is a demo installation, so backups cannot be made. This link would normally redirect there.">Backups</a> &nbsp; | &nbsp; 
								<a href="#" class="error-notification" data-error="This is a demo installation, so SFTP access cannot be granted. This link would normally redirect there.">SFTP</a> &nbsp; | &nbsp; 
								<a href="#" class="error-notification" data-error="This is a demo installation, so a clone cannot be made. This link would normally redirect there.">Clone</a> &nbsp; | &nbsp; 
								<a href="#" class="error-notification" data-error="This is a demo installation, so plugins cannot be updated. This link would normally redirect there.">Update Plugins</a> &nbsp; | &nbsp; 
								<a href="#" class="error-notification" data-error="This is a demo installation, so SSL cannot be added. This link would normally redirect there.">Add SSL</a>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="email text-center">0.56 GB</div>
						</div>
						<div class="col-sm-2">
							<div class="email text-center">4.78 GB</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>

</div>