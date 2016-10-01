<?php

$version = '3.3.6';

$bgDefault    = '#'.substr($_GET['params'], 0, 6);
$bgHighlight  = '#'.substr($_GET['params'], 6, 6);
$colDefault   = '#'.substr($_GET['params'], 12, 6);
$colHighlight = '#'.substr($_GET['params'], 18, 6);
$dropDown     = substr($_GET['params'], 24, 1);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>La Navbar Bootstrap en couleurs - Default</title>
		<meta name="author" content="zessx">

		<link href="//netdna.bootstrapcdn.com/bootstrap/<?php print $version ?>/css/bootstrap.min.css" rel="stylesheet">
		<style>
			.navbar-default {
			  background-color: <?php echo $bgDefault ?>;
			  border-color: <?php echo $bgHighlight ?>;
			}
			.navbar-default .navbar-brand {
			  color: <?php echo $colDefault ?>;
			}
			.navbar-default .navbar-brand:hover,
			.navbar-default .navbar-brand:focus {
			  color: <?php echo $colHighlight ?>;
			}
			.navbar-default .navbar-text {
			  color: <?php echo $colDefault ?>;
			}
			.navbar-default .navbar-nav > li > a {
			  color: <?php echo $colDefault ?>;
			}
			.navbar-default .navbar-nav > li > a:hover,
			.navbar-default .navbar-nav > li > a:focus {
			  color: <?php echo $colHighlight ?>;
			}
			<?php if($dropDown == 1): ?>
			.navbar-default .navbar-nav > li > .dropdown-menu {
			  background-color: <?php echo $bgDefault ?>;
			}
			.navbar-default .navbar-nav > li > .dropdown-menu > li > a {
			  color: <?php echo $colDefault ?>;
			}
			.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
			.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
			  color: <?php echo $colHighlight ?>;
			  background-color: <?php echo $bgHighlight ?>;
			}
			.navbar-default .navbar-nav > li > .dropdown-menu > li > .divider {
			  background-color: <?php echo $bgDefault ?>;
			}
			.navbar-default .navbar-nav .open .dropdown-menu > .active > a,
			.navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
			.navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
			  color: <?php echo $colHighlight ?>;
			  background-color: <?php echo $bgHighlight ?>;
			}
			<?php endif; ?>
			.navbar-default .navbar-nav > .active > a,
			.navbar-default .navbar-nav > .active > a:hover,
			.navbar-default .navbar-nav > .active > a:focus {
			  color: <?php echo $colHighlight ?>;
			  background-color: <?php echo $bgHighlight ?>;
			}
			.navbar-default .navbar-nav > .open > a,
			.navbar-default .navbar-nav > .open > a:hover,
			.navbar-default .navbar-nav > .open > a:focus {
			  color: <?php echo $colHighlight ?>;
			  background-color: <?php echo $bgHighlight ?>;
			}
			.navbar-default .navbar-toggle {
			  border-color: <?php echo $bgHighlight ?>;
			}
			.navbar-default .navbar-toggle:hover,
			.navbar-default .navbar-toggle:focus {
			  background-color: <?php echo $bgHighlight ?>;
			}
			.navbar-default .navbar-toggle .icon-bar {
			  background-color: <?php echo $colDefault ?>;
			}
			.navbar-default .navbar-collapse,
			.navbar-default .navbar-form {
			  border-color: <?php echo $colDefault ?>;
			}
			.navbar-default .navbar-link {
			  color: <?php echo $colDefault ?>;
			}
			.navbar-default .navbar-link:hover {
			  color: <?php echo $colHighlight ?>;
			}
			@media (max-width: 767px) {
			  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
			    color: <?php echo $colDefault ?>;
			  }
			  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
			  .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
			    color: <?php echo $colHighlight ?>;
			  }
			  .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
			  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
			  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
			    color: <?php echo $colHighlight ?>;
			    background-color: <?php echo $bgHighlight ?>;
			  }
			}
		</style>
		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/<?php print $version ?>/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="javascript:void(0)">Brand</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="javascript:void(0)">Link</a></li>
					<li><a href="javascript:void(0)">Link</a></li>
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="javascript:void(0)">Action</a></li>
							<li><a href="javascript:void(0)">Another action</a></li>
							<li><a href="javascript:void(0)">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="javascript:void(0)">Separated link</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="javascript:void(0)">Link</a></li>
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="javascript:void(0)">Action</a></li>
							<li><a href="javascript:void(0)">Another action</a></li>
							<li><a href="javascript:void(0)">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="javascript:void(0)">Separated link</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>
	</body>
</html>