<?php

$versions     = array('3.3.2', '3.3.6');
$curVersion   = end($versions);

$tab          = isset($_GET['tab']) && in_array($_GET['tab'], array('scss', 'sass', 'less', 'css')) ? $_GET['tab'] : 'scss';
$params       = isset($_GET['params']) && preg_match('/^[\da-f]{25}$/i', $_GET['params']) ? $_GET['params'] : '9b59b68e44adecf0f1ecdbff0';
$version      = isset($_GET['version']) && in_array($_GET['version'], $versions) ? $_GET['version'] : $curVersion;
$bgDefault    = '#'.substr($params, 0, 6);
$bgHighlight  = '#'.substr($params, 6, 6);
$colDefault   = '#'.substr($params, 12, 6);
$colHighlight = '#'.substr($params, 18, 6);
$dropDown     = substr($params, 24, 1);

define('BASE', "http://work.smarchal.com/twbscolor/");

?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">

		<title>TWBSColor - Generate your own Bootstrap navbar</title>
		<meta name="author" content="Samuel Marchal - @zessx">
		<meta name="description" content="TWBSColor - Generate your own Bootstrap navbar">
		<meta name="keywords" content="TWBSColor, color, twitter, bootstrap, generate, css, zessx">
		<meta property="og:image" content="<?php print BASE; ?>assets/logo.png?v=2">

		<link rel="shortcut icon" href="<?php print BASE; ?>assets/favicon.ico?v=2" type="image/x-icon">

		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php print BASE; ?>monsterflat-1.0-trending/monsterflat-1.0.css">

		<link href="//netdna.bootstrapcdn.com/bootstrap/<?php print $version ?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php print BASE; ?>assets/spectrum.css">
		<link rel="stylesheet" href="<?php print BASE; ?>assets/app.css?1103">
		<style id="custom-style"></style>

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="<?php print BASE; ?>assets/spectrum.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/<?php print $version ?>/js/bootstrap.min.js"></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-32364969-3', 'smarchal.com');
		  ga('send', 'pageview');

		</script>

		<script>
			var BASE = '<?php print BASE ?>';

      $(function() {
        $('input[type="color"]').spectrum({
          preferredFormat: "hex",
          showPalette: false,
          showSelectionPalette: false,
          allowEmpty: false,
          showInput: true,
        });
      });

			$(document).on('click', 'navbar a', function(ev) {
        ev.preventDefault();
        return false;
      });

      $(document).on('click', '[data-tab]', function(ev) {
        var bd = $('#bd').val();
        var bh = $('#bh').val();
        var cd = $('#cd').val();
        var ch = $('#ch').val();
        var dd = $('#dd').is(':checked') ? 1 : 0;
        var params = bd.replace('#', '')+bh.replace('#', '')+cd.replace('#', '')+ch.replace('#', '')+dd<?php print $version != $curVersion ? '+\'?version='.$version.'\'' : '' ?>;
        var link = BASE+$('.nav-tabs .active [data-tab]').first().data('tab')+'/'+params;

        $('.permalink')
          .attr('href', link)
          .find('pre')
          .html(link);
      });

			$(document).on('change', '#form-generate', function(ev) {

				var bd = $('#bd').val();
				var bh = $('#bh').val();
				var cd = $('#cd').val();
				var ch = $('#ch').val();
        var dd = $('#dd').is(':checked') ? 1 : 0;
        var params = bd.replace('#', '')+bh.replace('#', '')+cd.replace('#', '')+ch.replace('#', '')+dd<?php print $version != $curVersion ? '+\'?version='.$version.'\'' : '' ?>;
				var link = BASE+$('.nav-tabs .active [data-tab]').first().data('tab')+'/'+params;

				$('.permalink')
					.attr('href', link)
					.find('pre')
					.html(link);

				$('iframe:first').attr('src', BASE+'navbar.php?params='+params);

        $.get(BASE+'templates/<?php print $version ?>/scss.tpl', function(data) {
          data = data.replace(/\{\{bgDefault\}\}/g, $('#bd').val())
                     .replace(/\{\{bgHighlight\}\}/g, $('#bh').val())
                     .replace(/\{\{colDefault\}\}/g, $('#cd').val())
                     .replace(/\{\{colHighlight\}\}/g, $('#ch').val())
                     .replace(/\{\{dropDown\}\}/g, ($('#dd').is(':checked') ? 'true' : 'false'));
          $('#scss pre').html(data);
        });

        $.get(BASE+'templates/<?php print $version ?>/sass.tpl', function(data) {
          data = data.replace(/\{\{bgDefault\}\}/g, $('#bd').val())
                     .replace(/\{\{bgHighlight\}\}/g, $('#bh').val())
                     .replace(/\{\{colDefault\}\}/g, $('#cd').val())
                     .replace(/\{\{colHighlight\}\}/g, $('#ch').val())
                     .replace(/\{\{dropDown\}\}/g, ($('#dd').is(':checked') ? 'true' : 'false'));
          $('#sass pre').html(data);
        });

        $.get(BASE+'templates/<?php print $version ?>/less.tpl', function(data) {
          data = data.replace(/\{\{bgDefault\}\}/g, $('#bd').val())
                     .replace(/\{\{bgHighlight\}\}/g, $('#bh').val())
                     .replace(/\{\{colDefault\}\}/g, $('#cd').val())
                     .replace(/\{\{colHighlight\}\}/g, $('#ch').val())
                     .replace(/\{\{dropDown\}\}/g, ($('#dd').is(':checked') ? 'true' : 'false'));
          $('#less pre').html(data);
        });

        $.get(BASE+'templates/<?php print $version ?>/css.tpl', function(data) {
          data = data.replace(/\{\{bgDefault\}\}/g, $('#bd').val())
                     .replace(/\{\{bgHighlight\}\}/g, $('#bh').val())
                     .replace(/\{\{colDefault\}\}/g, $('#cd').val())
                     .replace(/\{\{colHighlight\}\}/g, $('#ch').val());
          if($('#dd').is(':checked')) {
            data = data.replace(/\{\{dropDown\}\}/g, '');
          } else {
            data = data.replace(/\{\{dropDown\}\}.*?(?:\r\n|\r|\n)/g, '');
          }
          $('#css pre').html(data);
        });

			});

			$(document).on('ready', function() {
				$('#form-generate').trigger('change');
			})

		</script>
	</head>
	<body>

		<header>
			<div class="container">
				<img src="<?php print BASE; ?>assets/logo.png?v=2" alt="TWBSColor">
				<h1><a href="<?php print BASE; ?>">TWBSColor</a></h1>
				<h2>Generate your own Bootstrap navbar</h2>
			</div>
		</header>

		<section id="main">
			<div class="container">

				<h1>Select your colors</h1>

				<!-- form -->
				<form id="form-generate" action="#" method="get" class="form-inline text-center">
					<div class="form-group">
						<label for="bd">Default background</label>
						<input type="color" id="bd" name="bd" value="<?php print $bgDefault ?>">
					</div>
					<div class="form-group">
						<label for="bh">Active background</label>
						<input type="color" id="bh" name="bh" value="<?php print $bgHighlight ?>">
					</div>
					<div class="form-group">
						<label for="cd">Default color</label>
						<input type="color" id="cd" name="cd" value="<?php print $colDefault ?>">
					</div>
					<div class="form-group">
						<label for="ch">Active color</label>
						<input type="color" id="ch" name="ch" value="<?php print $colHighlight ?>">
					</div>
          <br>
					<div class="form-group">
						<label for="dd">Colorize dropdown</label>
						<input type="checkbox" id="dd" name="dd" <?php print $dropDown ? 'checked' : ''; ?>>
					</div>
				</form>

				<!-- sample -->
				<iframe src="#" width="800" height="200">
					<p>Your browser doesn't support iframes... seriously?!</p>
				</iframe>

			</div>
		</section>

		<section id="link">
			<div class="container text-center">
				<h1>Bookmark your permalink</h1>
				<a href="#" class="permalink"><pre></pre></a>
			</div>
		</section>

		<section id="assets">
			<div class="container">
				<h1>Include Bootstrap assets</h1>
				<pre>//netdna.bootstrapcdn.com/bootstrap/<?php print $version ?>/css/bootstrap.min.css
//netdna.bootstrapcdn.com/bootstrap/<?php print $version ?>/js/bootstrap.min.js</pre>
			</div>
		</section>


		<section id="code">
			<div class="container">
				<h1>Copy the generated SCSS/SASS/LESS/CSS</h1>

				<!-- code -->
				<ul class="nav nav-tabs">
					<li<?php print $tab == 'scss' ? ' class="active"' : '' ?>><a href="#scss" data-toggle="tab" data-tab="scss">SCSS</a></li>
					<li<?php print $tab == 'sass' ? ' class="active"' : '' ?>><a href="#sass" data-toggle="tab" data-tab="sass">SASS</a></li>
					<li<?php print $tab == 'less' ? ' class="active"' : '' ?>><a href="#less" data-toggle="tab" data-tab="less">LESS</a></li>
					<li<?php print $tab == 'css' ? ' class="active"' : '' ?>><a href="#css" data-toggle="tab" data-tab="css">CSS</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane<?php print $tab == 'scss' ? ' active' : '' ?>" id="scss"><pre></pre></div>
					<div class="tab-pane<?php print $tab == 'sass' ? ' active' : '' ?>" id="sass"><pre></pre></div>
					<div class="tab-pane<?php print $tab == 'less' ? ' active' : '' ?>" id="less"><pre></pre></div>
					<div class="tab-pane<?php print $tab == 'css' ? ' active' : '' ?>" id="css"><pre></pre></div>
				</div>
			</div>
		</section>

		<section id="share">
			<div class="container">
				<h1>Find TWBSColor useful ? Share it !</h1>
				<div id="sharebuttons">
					<a onclick="_gaq.push(['_trackEvent', 'Social', 'Share', 'Facebook', 1, true]);" href="https://www.facebook.com/sharer/sharer.php?u=http://work.smarchal.com/twbscolor" target="_blank"><i class="mf-128 mf-facebook"></i></a>
					<a onclick="_gaq.push(['_trackEvent', 'Social', 'Share', 'Twitter', 1, true]);" href="https://twitter.com/share?url=http://work.smarchal.com/twbscolor&text=%23TWBSColor - Generate your own Bootstrap navbar.&via=zessx" target="_blank"><i class="mf-128 mf-twitter"></i></a>
					<a onclick="_gaq.push(['_trackEvent', 'Social', 'Share', 'Google Plus', 1, true]);" href="https://plus.google.com/share?url=http://work.smarchal.com/twbscolor" target="_blank"><i class="mf-128 mf-googleplus"></i></a>
					<a onclick="_gaq.push(['_trackEvent', 'Social', 'Share', 'Stumbleupon', 1, true]);" href="http://www.stumbleupon.com/submit?url=http://work.smarchal.com/twbscolor" target="_blank"><i class="mf-128 mf-stumbleupon"></i></a>
				</div>
			</div>
			<p class="cf"></p>
		</section>

		<footer>
			<div class="container">
				<p>A work by <a href="http://smarchal.com">Samuel Marchal</a></p>
				<p><a href="http://twitter.com/zessx">Suggestions, comments, typo ?</a></p><br>

				<a rel="license" href="http://opensource.org/licenses/MIT"><img alt="Licence MIT" style="border-width:0" src="<?php print BASE; ?>assets/license-mit.png" /></a>
				<br><br>


				<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=KTYWBM9HJMMSE&lc=FR&item_name=Buy%20a%20coffee%20to%20zessx%20%28Samuel%20Marchal%29&currency_code=EUR&bn=PP%2dDonationsBF%3abmac%3aNonHosted" onclick="_gaq.push(['_trackEvent', 'Donate', 'Donate', 'Paypal', 1, true]);" target="_blank"><img src="http://doc.smarchal.com/bmac" alt="Buy me a coffee !" style="border-radius:5px" onmouseover="this.style.boxShadow='0 0 5px #00335e'" onmouseout="this.style.boxShadow=null"></a>
        <span class="small">or</span>
        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=KTYWBM9HJMMSE&lc=FR&item_name=Buy%20a%20coffee%20to%20zessx%20%28Samuel%20Marchal%29&currency_code=EUR&bn=PP%2dDonationsBF%3abmac%3aNonHosted" onclick="_gaq.push(['_trackEvent', 'Donate', 'Donate', 'Paypal', 1, true]);" target="_blank"><img src="http://doc.smarchal.com/bmat" alt="Buy me a tea !" style="border-radius:5px" onmouseover="this.style.boxShadow='0 0 5px #00335e'" onmouseout="this.style.boxShadow=null"></a>
				<br><br>

				<p class="small">All brand icons are trademarks of their respective owners.<br>The use of these trademarks does not indicate endorsement of the trademark holder by TWBSColor, nor vice versa.</p>
			</div>
		</footer>
	</body>
</html>