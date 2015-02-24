<div id="sidebar-default" class="main-sidebar">
	<div class="current-user">
		<a href="index.html" class="name">
			<?php
				if (isset($_REQUEST["email"])) {
					// add to mailchimp
					echo '<img class="avatar" src="http://www.gravatar.com/avatar/' . md5( strtolower( trim( $_REQUEST["email"] ) ) ) . '?d=' . urlencode( 'http://fastwordpress.org/dashboard/images/logo.jpg' ) . '" />';
					echo "<span>" . explode("@", $_REQUEST["email"])[0];
				} else {
					echo '<img class="avatar" src="images/logo.jpg" />';
					echo "<span>FastWP.org";
				}
			?>
			<i class="fa fa-chevron-down"></i></span>
		</a>
		<ul class="menu">
			<li>
				<a href="#" class="error-notification" data-error="You must upgrade to a paid account before editing your account's settings.">Account Settings</a>
			</li>
			<li>
				<a href="<?php echo params(array("tab" => "upgrade")); ?>">Billing</a>
			</li>
			<li>
				<a href="<?php echo params(array("tab" => "help")); ?>">Help / Support</a>
			</li>
		</ul>
	</div>
	<div class="menu-section">
		<h3>Account</h3>
		<ul>
			<li>
				<a href="<?php echo params(array("tab" => "dashboard")); ?>" class="<?php echo selected("dashboard"); ?>">
					<i class="ion-android-earth"></i> 
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="<?php echo params(array("tab" => "upgrade")); ?>" class="<?php echo selected("upgrade"); ?>">
					<i class="ion-card"></i> 
					<span>Upgrade My Account</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="menu-section">
		<h3>Installations</h3>
		<ul>
			<li>
				<a href="<?php echo params(array("tab" => "upgrade")); ?>">
					<i class="ion-android-add"></i> <span>New WP Installation</span>
				</a>
			</li>
			<li>
				<a href="#" data-toggle="sidebar" class="<?php if ($_GET["tab"] == "backups" || $_GET["tab"] == "server") { echo "toggled"; } ?>">
					<i class="ion-flash"></i> <span>SampleSite.com</span>
					<i class="fa fa-chevron-down"></i>
				</a>
				<ul class="submenu" style="<?php if ($_GET["tab"] == "backups" || $_GET["tab"] == "server") { echo "display: block;"; } ?>">
					<li><a class="<?php echo selected("server"); ?>" href="<?php echo params(array("tab" => "server")); ?>">Overview</a></li>
					<li><a class="error-notification" href="#" data-error="This is a demo installation, so no WP Admin actually exists. This would normally redirect there.">WP Admin</a></li>
					<li><a class="error-notification" href="#" data-error="This is a demo installation, so no phpMyAdmin actually exists. This would normally redirect there.">phpMyAdmin</a></li>
					<li><a href="#" class="error-notification" data-error="This is a demo installation, so backups cannot be made. This link would normally redirect there.">Backups</a></li>
					<li><a href="#" class="error-notification" data-error="This is a demo installation, so SFTP access cannot be granted. This link would normally redirect there.">SFTP</a></li>
					<li><a href="#" class="error-notification" data-error="This is a demo installation, so a clone cannot be made. This link would normally redirect there.">Clone</a></li>
					<li><a href="#" class="error-notification" data-error="This is a demo installation, so plugins cannot be updated. This link would normally redirect there.">Update Plugins</a></li>
					<li><a href="#" class="error-notification" data-error="This is a demo installation, so SSL cannot be added. This link would normally redirect there.">Add SSL</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="bottom-menu hidden-sm">
		<ul>
			<li><a href="#"><i class="ion-help"></i></a></li>
			<li>
				<a href="#">
					<i class="ion-archive"></i>
					<!-- <span class="flag"></span> -->
				</a>
				<!-- <ul class="menu">
					<li><a href="#">5 unread messages</a></li>
					<li><a href="#">12 tasks completed</a></li>
					<li><a href="#">3 features added</a></li>
				</ul> -->
			</li>
			<li><a href="http://fastwordpress.org"><i class="ion-log-out"></i></a></li>
		</ul>
	</div>
</div>