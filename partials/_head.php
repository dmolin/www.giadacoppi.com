<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" type="image/jpg" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Giada Coppi | graphic design and typography</title>

    <script type="text/javascript">
        function destroyLessCache(pathToCss) { // e.g. '/css/' or '/stylesheets/'
          if (!window.localStorage ) {
            return;
          }
          var host = window.location.host;
          var protocol = window.location.protocol;
          var keyPrefix = protocol + '//' + host + pathToCss;
          for (var key in window.localStorage) {
            if (key.indexOf(keyPrefix) === 0) {
              delete window.localStorage[key];
            }
          }
        }
        destroyLessCache('/css/');
    </script>

    <link rel="stylesheet/less" type="text/css" href="css/stylesheet.less?v=1.0.0" media="screen" />
    <script type="text/javascript" src="js/less-1.4.1.js"></script>

    <?php if($current_page == 'index' || $current_page == 'home') { ?>
    <script>
    paceOptions = {
        elements: {
            selectors: ['.ready']
        }
    };
    </script>
    <script src="js/pace.min.js"></script>
    <?php } ?>
</head>
