<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $meta["title"] ?></title>
        <meta name="description" content="<?php echo $meta["description"] ?>">
        <meta name="keywords" content="<?php echo $meta["keywords"] ?>">
        <meta name="robots" content="<?php echo $meta["robots"] ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo URL::base_url()."/bootstrap/css/bootstrap.min.css" ?>">
        <script type="text/javascript" src="<?php echo URL::base_url()."/bootstrap/js/jquery.js" ?>"></script>
        <script type="text/javascript" src="<?php echo URL::base_url()."/bootstrap/js/bootstrap.min.js" ?>"></script>
    </head>
    <body>
            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $app->appName ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if ($_GET["r"] == "demo/index"){ echo 'class="active"'; } ?>><a href="<?php echo ROUTER::create_action_url("demo/index") ?>">Home</a></li>
            <li <?php if ($_GET["r"] == "demo/login"){ echo 'class="active"'; } ?>><a href="<?php echo ROUTER::create_action_url("demo/login") ?>">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
        <div class="container" style="margin-top: 50px;">
            <h1><?php echo $app->appName ?></h1>
        </div>
        <div class="container">
        <?php include $content; ?>
        </div>
    </body>
</html>

