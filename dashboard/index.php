<?php
	if (!isset($_GET["tab"])) { $_GET["tab"] = "dashboard"; }
	if (!isset($_REQUEST["email"])) { $_REQUEST["email"] = "FastWP.org"; }
	
	function params($params) {
		return "?" . http_build_query(array_merge($_GET, $params));
	}
	
	function selected($tab) {
		if ($_GET["tab"] == $tab) {
			return "active";
		} else {
			return "";
		}
	}
	
	if ($_REQUEST["email"] != "FastWP.org" && $_GET["tab"] == "dashboard") {
		if ( strpos(file_get_contents("pre-launch.txt"), $_REQUEST["email"]) === false) {
			$handle = fopen("pre-launch.txt", "a");
			fwrite($handle, $_REQUEST["email"] . "\n");
			fclose($handle);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title><?php echo ucfirst($_GET["tab"]); ?> - FastWordPress.org</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/animate.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/brankic.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/ionicons.min.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/morris.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/messenger/messenger.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/messenger/messenger-theme-flat.css" />

	<!-- javascript -->
	
	<script src="js/vendor/jquery.js"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/vendor/jquery.cookie.js"></script>
	<script src="js/vendor/moment.min.js"></script>
	<script src="js/theme.js"></script>
	<script src="js/vendor/bootstrap-datepicker.js"></script>
	<script src="js/vendor/raphael-min.js"></script>
	<script src="js/vendor/morris.min.js"></script>
	<script src="js/fwp.js"></script>

	<script src="js/vendor/jquery.flot/jquery.flot.js"></script>
	<script src="js/vendor/jquery.flot/jquery.flot.time.js"></script>
	<script src="js/vendor/jquery.flot/jquery.flot.tooltip.js"></script>
	<script src="js/vendor/messenger/messenger.min.js"></script>
	<script src="js/vendor/messenger/messenger-theme-flat.js"></script>


	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="fwp-ui">
	<div id="wrapper">
		<?php include("sidebar.php"); ?>

		<div id="content">
			<?php include($_GET["tab"] . ".php"); ?>
		</div>
	</div>

</body>
</html>