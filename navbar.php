<?php

include __DIR__ .'/config.php';

$version      = isset($_GET['version']) && in_array($_GET['version'], $versions) ? $_GET['version'] : $curVersion;

$bgDefault    = isset($_GET['params']) ? '#'.substr($_GET['params'], 0, 6) : '#9b59b6';
$bgHighlight  = isset($_GET['params']) ? '#'.substr($_GET['params'], 6, 6) : '#8e44ad';
$colDefault   = isset($_GET['params']) ? '#'.substr($_GET['params'], 12, 6) : '#ecf0f1';
$colHighlight = isset($_GET['params']) ? '#'.substr($_GET['params'], 18, 6) : '#ecdbff';
$dropDown     = isset($_GET['params']) ? substr($_GET['params'], 24, 1) : 0;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>TWBSColor - Navbar</title>
		<meta name="author" content="zessx">

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/<?php print $version ?>/css/bootstrap.min.css" rel="stylesheet">
		<style>
			<?php
			$css = file_get_contents(__DIR__.'/templates/'.$version.'/css.tpl');
			$css = str_replace('{{bgDefault}}', $bgDefault, $css);
			$css = str_replace('{{bgHighlight}}', $bgHighlight, $css);
			$css = str_replace('{{colDefault}}', $colDefault, $css);
			$css = str_replace('{{colHighlight}}', $colHighlight, $css);
			if ($dropDown == 1) {
				$css = str_replace('{{dropDown}}', '', $css);
			} else {
				$css = preg_replace('/\{\{dropDown\}\}.*?(?:\r\n|\r|\n)/', '', $css);
			}
			print $css;
			?>
		</style>
		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/<?php print $version ?>/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include 'templates/'.$version.'/html.tpl'; ?>
	</body>
</html>
