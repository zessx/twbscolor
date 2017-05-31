<?php

include __DIR__ .'/config.php';

$tab          = isset($_GET['tab']) && in_array($_GET['tab'], array('scss', 'sass', 'less', 'css')) ? $_GET['tab'] : 'scss';
$params       = isset($_GET['params']) && preg_match('/^[\da-f]{25}$/i', $_GET['params']) ? $_GET['params'] : '9b59b68e44adecf0f1ecdbff0';
$version      = isset($_GET['version']) && in_array($_GET['version'], $versions) ? $_GET['version'] : $curVersion;
$bgDefault    = '#'.substr($params, 0, 6);
$bgHighlight  = '#'.substr($params, 6, 6);
$colDefault   = '#'.substr($params, 12, 6);
$colHighlight = '#'.substr($params, 18, 6);
$dropDown     = substr($params, 24, 1);

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

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400' rel='stylesheet' type='text/css'>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php print BASE; ?>assets/spectrum.css">
    <link rel="stylesheet" href="<?php print BASE; ?>assets/app.css?1103">
    <style id="custom-style"></style>

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php print BASE; ?>assets/spectrum.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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

      function updateLink() {
        var bd = $('#bd').val();
        var bh = $('#bh').val();
        var cd = $('#cd').val();
        var ch = $('#ch').val();
        var dd = $('#dd').is(':checked') ? 1 : 0;

        var params  = bd.replace('#', '')+bh.replace('#', '')+cd.replace('#', '')+ch.replace('#', '')+dd;
        var version = $('#version').val();
        var lang    = $('.nav-tabs .active [data-tab]').first().data('tab')

        var link = window.location.protocol +'//'+ window.location.hostname + BASE + version +'/'+ lang + '/' + params;
        $('.permalink').attr('href', link).find('pre').html(link);
        $('iframe:first').attr('src', BASE +'navbar.php?version='+ version +'&params='+ params);
      }

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

      $(document).on('click', '[data-tab]', updateLink);

      $(document).on('change', '.form-generate', function(ev) {
        updateLink();

        var callback = function(lang) {
          return function(data, textStatus, jqXHR) {
            data = data.replace(/\{\{bgDefault\}\}/g, $('#bd').val())
                       .replace(/\{\{bgHighlight\}\}/g, $('#bh').val())
                       .replace(/\{\{colDefault\}\}/g, $('#cd').val())
                       .replace(/\{\{colHighlight\}\}/g, $('#ch').val());
            if (lang == 'css') {
              if($('#dd').is(':checked')) {
                data = data.replace(/\{\{dropDown\}\}/g, '');
              } else {
                data = data.replace(/\{\{dropDown\}\}.*?(?:\r\n|\r|\n)/g, '');
              }
            } else {
              data = data.replace(/\{\{dropDown\}\}/g, ($('#dd').is(':checked') ? 'true' : 'false'));
            }
            $('#'+ lang +' pre').html(data);
          };
        };

        var langs = ['scss', 'sass', 'less', 'css'];
        for (i = 0; i < langs.length; i++) {
          $.get(window.location.protocol +'//'+ window.location.hostname + BASE +'templates/<?php print $version ?>/'+ langs[i] +'.tpl', callback(langs[i]));
        }

      });

      $(document).on('ready', function() {
        $('.form-generate').first().trigger('change');
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

    <section>
      <div class="container">

        <h1>Select your Bootstrap version</h1>

        <form action="#" method="get" class="form-generate form-inline text-center">
          <select id="version">
            <?php
            foreach ($versions as $v) {
              printf('<option value="%s"%s>%s</option>', $v, ($version == $v ? ' selected' : ''), $v);
            }
            ?>
          </select>
        </form>
        <p class="medium"><br><a href="https://twitter.com/zessx" target="_askversion">You would like a specific version? Ask me on Twitter!</a></p>

      </div>
    </section>

    <section class="empty"></section>

    <section id="main">
      <div class="container">

        <h1>Select your colors</h1>

        <form action="#" method="get" class="form-generate form-inline text-center">
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

        <iframe src="#" width="800" height="230">
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
        <pre>//maxcdn.bootstrapcdn.com/bootstrap/<?php print $version ?>/css/bootstrap.min.css
//maxcdn.bootstrapcdn.com/bootstrap/<?php print $version ?>/js/bootstrap.min.js</pre>
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
          <a onclick="_gaq.push(['_trackEvent', 'Social', 'Share', 'Facebook', 1, true]);" href="https://www.facebook.com/sharer/sharer.php?u=http://work.smarchal.com/twbscolor" target="_blank">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAMAAAD04JH5AAACKFBMVEX///87V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V507V508WJ09WJ49WZ5AXKBBXKBDXqFFYKJGYKJKZKRKZKVPaKdRaahUbKlVbapXb6tacaxfdq9mfLNrgbVug7dxhbhzh7l0iLl1iLp1ibp4jLx5jLx6jb18jr18j76Bk8CDlcGJmsSKm8WMncaNncaOnsePn8eSociTosmTo8mUo8qXpsuZp8yaqc2bqc2grc+hr9CjsNGksdGksdKlstKms9Kns9OqttSrt9WuutexvNiyvdmzvtm0vtm2wNq7xd2+x96+yN/Ayd/Cy+HI0OTM1ObP1efQ1+jR1+jS2OjU2unV2+rW3Ovb4O3c4e3e4+7f4+/f5O/g5fDh5fDi5vDk6PLm6fLm6vPn6/Pp7PTp7fTs7/Xw8vfz9fn19vr3+Pv4+fz5+vz9/f7///9nIs0kAAAAVHRSTlMAAwYJDA8SFRgbHiEkJyotMDM2OTw/QkVIS05RVFdaXWBjZmlsb3J1eHt+gYSHio2Qk5aZnJ+ipairrrG0t7q9wMPGyczP0tXb3uHk5+rt8PP2+fzDekMGAAAEfElEQVR42sXZ6VsTVxjG4SchJESxIYBsKkXKprIVUKCoAUwikEAS5um+2d3utdbue221q9jWtnazq9UuWu0y/16BqxEHCJlz5syc+0u+/ua93itzcgIJJdGmzqG4watk4v0dmyvggfKWwUkWlOjdUgYX1fdNsahEp0uTiPSkaVOyXfkcgu1JCtnd6Ic64Z4shaVaSqDG+v5ZSpluC6h4+p0Gpc1sczoFX1uWjkzUwonqJB0bDkNW6U6qkG2HnKopKrK3DBLaZqlMugaigrupkrHdByGRKSoWC0DAxgyVSwgswqYcXTBZDpuaDboiHYUtHXRLdiNsaKV7MhEUtZVuSq1DEQ0GXTURwpoiGbpsXwnWEJyi627AGkYo7O6njn76zc/nzv1y9uL577/+/KO3DrOIDhTUTkG3Hjr1p7nMbyzCqEEBlbMU8+QZc6WfWEw6qGYB7jppruZH6TUYpJB7vjVlA3gtVlFHIQd+MOUDZoJYITAltn6nTQcBHMQKXRRyxHQUwGosE85SxJ2/OgxI+GC1i0JeM4sEiO7hNYbYAC44DpiwjmCYQg6bjgO41cEA+LFZ2B+UGEE/hdxy1lzm8pcfHn1j0ZvP0qbNuCKUo5B7/zat5u6/kcLG5Y+hB02r9yilAnkTFPOMaXH+dkrpxv9qKOgF0+IDyknl13CAgl42LY5QUi0W+WccBjxBSbuwqJ4OAx6hpFwJFvQ5DXiUsuqxYEpfQA/mRagvIIl512kMMIIABt0IEHkfTOoM6AOC1BkQB2oo7jnT4iFKy/lsX4i8fvxY3tunTYtT7xxbcvwBithg+2vosmnT4xTRgD2054Jpzz/3UUQr9isOuHgHRfQipzjgu5sF70uoOOAzChlVHvA+hexXHvAKhaSVBzxNIRnVAf8+SCE51QF/HaAY1QG/36Y54Kub3NqBS6Ytn9CtgHfnrjhxxrT44sRc3slDFJMCJbxoWhykvIRUwEtFfpgIiCGj9UjGIST0BnRjRG9AM7r1BtRhq96AMCq1BswAAUNnQAxAQmdAN4A+nQENABp1BgQBhHVfUCCpL6ALC7r0BVRjQaW2gLQPiyZ1BfQI/GEmECB+Xb5BU0ACeWN6AtqQ16QlwChDnj+lI2AIS1p1BFRiSWDa+4BRXK3D+4AaS0BpxuuAGKx2eB1QBatAytuAQSzX6GlANowVRr0M6MBK5bPeBST8WEW7ZwFGFKvxxbwK2I7VlU17EzDuQwE1Bm151bR4jEJm1qOgTtry/CWLhynCqENhvr103TaspTRJl/VhbeEJumrEhyLKp+mimB9FRTN0TbIUNlS7VpAIwZZImq4YDcCmdRN0wbAftoX2Ubl+HwQERqiW0Q5BLbNUKFUNYdFJKrM7BAmBYaphdEDSljQV2FcBaYFegw7NNMORyDgdGQjCqcYkpe2phAqb4pQyFIUqdeMUZezcAJUiXWkKSLSFoFzdYI62pLsjcEegoTtZbPKx7RvhqtDm6+NZrio91lnrhyfKqpp7B+Lx+H6SxvznWP+OpmgJZPwHOEISk2pj2/QAAAAASUVORK5CYII=" alt="Facebook">
          </a>
          <a onclick="_gaq.push(['_trackEvent', 'Social', 'Share', 'Twitter', 1, true]);" href="https://twitter.com/share?url=http://work.smarchal.com/twbscolor&text=%23TWBSColor - Generate your own Bootstrap navbar.&via=zessx" target="_blank">
            <img src="data:image/png;base64,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" alt="Twitter">
          </a>
          <a onclick="_gaq.push(['_trackEvent', 'Social', 'Share', 'Google Plus', 1, true]);" href="https://plus.google.com/share?url=http://work.smarchal.com/twbscolor" target="_blank">
            <img src="data:image/png;base64,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" alt="Google+">
          </a>
          <a onclick="_gaq.push(['_trackEvent', 'Social', 'Share', 'Stumbleupon', 1, true]);" href="http://www.stumbleupon.com/submit?url=http://work.smarchal.com/twbscolor" target="_blank">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAANpElEQVR4Ae2dCZAU1RnHI2UClpgywRVYgwOKMWoSg3gkHIEVEDCIhSIQEREURGOAgMbIIQaIGlEUVBCNGzQYlcP1MEEU16JANupK4oEaIWhQNMzO7Nz38eX7N2+qtqD36NnpN/1m3qv6F1vFTM/r7//rfv2+d/Q3iKik1DDi1E6snqwq1m9Y97KeZtWxPmQdYPmb0f9Yu1k7xXfuFceoEsfsVGrxKgXDv8nqy5rNWs36mBVhZVlUIGVZEXHsR8Vv9cVvawDkG96V1Y81mfUQaxcrySLJSuK3RR0mizp11QDYd5UPEVefj5VmkcOUZvlEHYeocndwuvEdWRPElUaKaZeoe0cNgDXTO7AuYC1gvc8ixYVzWCDOqYMGoGXzx7J2sFIsKjGlxLmN1QAcafyprGoWlYmqcc7lDgCMP4N1F8vNojKTm7WI5So3AGB8Z9ZSVpBFZS6/iEXncgAA5lewXtPGHyHEpKJUAYDxXVhTRaqVtEy1W8SoSykBAPO7sd7WBrdZiFX3kgBA9H8/0KZa1keIncoAwPwbWT5tZt7yIYaqAQDjv8VapQ0smFYhpkoAIB72arRpBVeNHQ+HhTbfxarXZtmm+kInjgpp/smsf2mTbBdifLKjAACV2nzpELicAADM/25Rxuu1diH2RQVATNjYrM0omjbDg2IC8Lg2oeh6XDoAwvxZOviO0SyZAMD8QayoDrxjFIUnMgCA+b1Y+3XQHSd40stWADCqpwd2HC14081OAGbqIDteM+0AAOb3YH2hA+x4waMehQQA5p+oVI5fqx6eFRKANTqoymlNIQCA+WcruVBDKwXvCgGAugs2tKrbAwDM78OKKRsArRg8zAsAsdPGlpIKyEW9qGHoyeQe1J3cA08kd/8TDBl/D66khmEuahjeq9Qg2NLSziblkOuHsWx6N/77FPJe+TMK3DGdQg8tosi6FRR54j4KrZhH/t9NIu/YcxgQ/uzPuwKWshgraM78Y1n7VD9xd9VJxtXtufSHFF69mJLv/YOy0TA1VzJ+LyV2vkrBu2fz93uTewDfHYb0UB4A4eWxVgAYpvqt3j24O/l+dQlF1i6n9P69ZLWkdtdT+MGF1Dj1QhyLm4ZTVIdgmAUAFO73D+E2ntv58KN/oGw8Su0tmUY3BRZNQxPCYPUsubxAc5swedU0vwd5Rv2AYq9tooKWdJrC1feQ+8Lv8fOEshB44W1bAJiv5AnyVY9/4zs2k10lun4NNVRVqvyAOL9FAMTV36him49bf3xrDdldwg/fwb2EbqoC0AiPWwLgOhVPDE/6aPOllFSS/DdPYAhOVBWC68wAgPlHs95Q7oQuPIkNGU/ZWJRklfR/P6XGq/pzs6NkFxEeH20GwBmspEong64Z2v7EW6+T7BJ7+Sl0D1UEIAmvzQAYpdytf6jLyN5lfB6SXVJ7d1PDyN6qPhCOMgPgFuUA4L556IF5VJSSiHOiaTSyjSoCcEtTAGD+Uaytqj354wpMffo+5V2y2fY1Ay/9RWQJlQNgKzxvCkB3VkC1pI/36oGU5SvRasn4PRR56kHyzbmCAgumUuyVZ4lSCevNwJ4PqOHi76vYDATgeVMAJqt4+w/eOTOv1K5vxkhy9++CIWDjOOhGBuZPYUdT1m4g8Rg1Th6US0KppsnwXtncv3tAhZGetVoia+8jd7/vHNac9DRgSLz5KlkjgMh/61X4rrJjA7ndueuUA6D/CXwbX2nx8k+Tb/Zl5K6qNAHqBCPLZ7UEFk5VtTtYB+8BQG9WREkA1q2wdsEmE9Q47SIM6hxxPGT2QstvtQ7AgimqAhCB9wBgDIvKBoDrRzQPwP23lRMA0BgAMKdsAdAAzAUAa1mkAaig0MqF1gFYNE1lAFYAgDdYGoCq7sbE0Iz3ILW1IAnlmzGCcxLieOppLQD4RAMgjjnMRd7x51H0mVWUDQdNv5/e9wlFa9Zy928iJ4FOU32a2EYA4NMACLEwCxjdRO+kARRYfANFNzxKkT8vo8CSG/m7IzHlDMkj3PZLYer4VgDg1wCYDjPDaKwRQKYQf+N74ooXM4TV15vlDYDWO+UNgNaHGgBp0gBw4I2lWtyutirxua5oj2UBgN+CLExJ69Xy5/F/F/W0ItkrkD6SBgAWVPjnjqfQgwuRcWtVmOkTXHYznroRaBkAoFuHHgBAbeUB0SVWCvXCd5r/7MjTyHPJGW3X6DNzx5Olj6UAgKBh6lRs63NkqSST5Lm8D1b32g4AunXBpTdRbPMz/JnhGB00TDZ6A9DgSuOuZKw+uuIcCv5xNiXeqsUUcZyb2cJUBn4cpT//tM3CGsbgkhuxfF1+EyAFgC3rrRkWCTEAPwEAcsYCViwglGzQT9GnH6bAwmvJ+8sLMAUciR/jrhTf9nLTSaj4DOAxBSpw+7VksaAOqEuJAoCpVxYKsnECgKINBmVDfiwptzYYJADA/1ktqINEAN7TANg0GqgIAHUAIFi2AGgAtgGAr8oWAA3AiwCgvmwB0AD8FQBsKlsANACrAcCdZQuABmAxAJjiaAAu+7E5AP26UOTJ+4sPwPxrVAZgKgD4KSvtyERQNEKe8eeZrrxBVi666bHCAvDAfOsA3H4dMoamAAAOBwOQhvcA4BjWZ/Yv5epuLKa0WjBXH2YfvvGjZ/RZlD7wuTUAYhFk9syBGtQ1r6Vm0WdWo34mgFZg1xInA7AP3ueWhr0oY/gWy7KsluQ/d4oNHyvwr5GTP3j+cUbO3GrJHDxAnkvPMp3Hh+P6fzuRrBZMIvWM7QMIACZkHAsjmcn6bWS1BBfPyN1R7FZN07WB82wHgG+JyJvnU+KvbqLAounGsi7/LVdSeNXvKeP+yjpMb9U2O+SKTaa8nPPPhgNktcS2bCDfDRdjswrjmQXNDJ5PsJ+QpYIm6tqh1CBnd9J5TQHow0rbPRyMqy9z8Mt27dfXnhJeuRBXavPPKcZ2M7V51w3jBhlfgzDeekl99C41jDT2PpDR/vdpCkAn1h4ZdwHsrVOEggEd7CfQ4t6/gCP0yFIqVomsW4mmQ8bVD687Hb5FzDIZM4KwOBNmyC6x59e23rYOdRlj/ekvP5MPaNCPvQZkbU69zGyPoEn25wMO7deffK+OZJfAbVe3DoBYJh55cjnJLsldOxAbWVPCJpkB0F/CDxu3uPAjS0hmSX+xjzxjftSmfX4xJcw3eyzJLtjOXgAqQ/3NADiOtVfG5k6gPLrxMTnmH/iMfNOHt3UmsHgYdFH02UfkNU8vrRNxkbLSaC+8bm6r2OVSCOQAw5BE3Vays2SCPvL9egxyCJZ7LOiKJXa8Yv+t/93tgE7mPkPLW9oruB8rwyIZmUHfjIttfSAMrZiPzaDyqx8DgG5r6oO37QPU60buQeZegxl43BIAR7E2yHy5A5Im8deeK2xgv96P177gymrfbRWLRCecT8n67VTogjeS+G4anduvSJY2wOPW3hcwkEWyhAAgPxDBjl8FKIn6bcj3YxcxAFCQris2pIxu+hMVqsRfryHPL06X+dCX08C2vDDiaNZOqRVDepafCTAYgz14sZuX1ZINNFK0ppoaRp9Z+KtKvEkseNcs48VS+RZMc4++8MShzSXlL0/bCW/b+s6gKcXY+du4IkadTv7Zl1N4zVKK175wKOefTpls0hil5IfvUPTpVdimBVc9BmFglq1D2t6J/fB7gA1teOvNEYOZ2PY3o0lqnDTAOIaY3yBbU6y8NOoUVoJFkOy7AYKEWzi2XvFcdjb5Zo4xtnQN3jOHAktuMLZyabxmsJE3F2v3pSVR8Dt4Ywh+0zOuLyeYJlHkifuxosjo1WAsIfbKeqMbaYA57lyjR2HsMzBETh1NlICnVl8cud4R7wMY5kI7jOcEBFHszlGJp/Qi79Ah6oZ6GUPVlQa8qJMYvhZguqSbbqL1+bw51MXa38Yf0BI9DgAgDHeK4KEr35dHz9TmKq+Z7Xl7+DGs7TqIymo7PMwbAAHBCB1IZTUCHrYXgM6sf+tgKid41rndAAgIhiv1RhGtQO7qLwgAAoKJOrDKaCI8KygAAoKNOriO10Z4ZRcA57KiOsiOVRQe2QaAgGCaDrRjNQ0e2QqAgGC1DrbjtBreyAKgU245mZYjBC86SQNAQNCNdUAHv+iCB93giVQABARDivrGMa04PBB+yAdAQHC5ThIVLdkzFh4UFQABwXRtiHRNR+wdAYCAYK42RZrmIuaOAkBAcD0rpA2yTSHEGLF2JAAQ2iVWTJtVcMVzbb6jARAQjGR9rU0rmBDLSxBbJQBoMqdwszav3dqcm9OnFAACgm+zqrWJeasaMUQs1QLAvIeQ1Ia2WUnzJ31FARAQVLH+rs1tVYhRFWImHwA5IMwyXXWklUBsJPshAJAPwQS96OSIxRsTEJuyAEBAUMGaWuYgvM8ah1ggJmUAgCkIlax7yiyDGMI5yzdePgBWQOjL2lHivYWkOMe+h52/BkBA0IF1jug2/qeEjMe5zBXn1gHnqgFoHYbjxTPCmyq/n1+cw/HWzl8D0BSEjqyrWS8pMvEkgLqKOnfMnYcGoDAw9GBdyprDqnHIGoWoqMscUbce5vXXANgBRG9xpa1jfS4JiJj4rXXit3ub108DIBuGY1mni0kpd7PWsJ5n1bLeYe0ROQc3y9+M3OIze8R3asUx1ohj4thn4rdKJW7/B3s3DNJxiN2uAAAAAElFTkSuQmCC" alt="Stumbleupon">
          </a>
        </div>
      </div>
      <p class="cf"></p>
    </section>

    <footer>
      <div class="container">
        <p>A work by <a href="http://smarchal.com">Samuel Marchal</a></p>
        <p><a href="http://twitter.com/zessx">Suggestions, comments, typo ?</a></p><br>

        <a rel="license" href="http://opensource.org/licenses/MIT">
          <img alt="Licence MIT" style="border-width:0" src="data:image/png;base64,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">
        </a>
        <br><br>


        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=KTYWBM9HJMMSE&lc=FR&item_name=Buy%20a%20coffee%20to%20zessx%20%28Samuel%20Marchal%29&currency_code=EUR&bn=PP%2dDonationsBF%3abmac%3aNonHosted" onclick="_gaq.push(['_trackEvent', 'Donate', 'Donate', 'Paypal', 1, true]);" target="_blank"><img src="https://doc.smarchal.com/bmac" alt="Buy me a coffee !" style="border-radius:5px" onmouseover="this.style.boxShadow='0 0 5px #00335e'" onmouseout="this.style.boxShadow=null"></a>
        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=KTYWBM9HJMMSE&lc=FR&item_name=Buy%20a%20coffee%20to%20zessx%20%28Samuel%20Marchal%29&currency_code=EUR&bn=PP%2dDonationsBF%3abmac%3aNonHosted" onclick="_gaq.push(['_trackEvent', 'Donate', 'Donate', 'Paypal', 1, true]);" target="_blank"><img src="https://doc.smarchal.com/bmat" alt="Buy me a tea !" style="border-radius:5px" onmouseover="this.style.boxShadow='0 0 5px #00335e'" onmouseout="this.style.boxShadow=null"></a>
        <br><br>

        <p class="small">All brand icons are trademarks of their respective owners.<br>The use of these trademarks does not indicate endorsement of the trademark holder by TWBSColor, nor vice versa.</p>
      </div>
    </footer>
  </body>
</html>
