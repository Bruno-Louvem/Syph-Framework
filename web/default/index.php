<?php
$cp = end(explode(DS,dirname(__FILE__)));
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <base href="http://www.syp.bru"/>
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo $cp?>/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo $cp?>/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo $cp?>/css/main.css">

        <script src="<?php echo $cp?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Syph Framework</a>
        </div>
        <div class="navbar-collapse collapse">
<!--          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>-->
        </div>/.navbar-collapse 
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Syph Framework</h1>
        <p>Bem vindo a ferramenta que te ajudará a desenvolcer nos padroes de projetos PHP.</p>
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div id="learn" class="col-md-4 tool">
          <h2>Aprenda</h2>
          <p>Aprenda desenvolvendo. </p>
          <p><a class="btn btn-default btn-info" href="#" role="button">Começar &raquo;</a></p>
        </div>
        <div id="docs" class="col-md-4 tool">
          <h2>Documentação</h2>
          <p>Veja nossa documentação. </p>
          <p><a class="btn btn-default btn-info" href="#" role="button">Docs &raquo;</a></p>
        </div>
        <div id="docs" class="col-md-4 tool">
          <h2>Exemplos</h2>
          <p>Veja este exmplo de reescrita. </p>
          <p><a class="btn btn-default btn-info" href="/usuarios/read/id/25" role="button">Docs &raquo;</a></p>
        </div>
        
        
      </div>
      <div class="row">
          <canvas id="viewport" width="800" height="600"></canvas>
      </div>

      <hr>

      <footer>
        <p>&copy; BrunoWeb 2014</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.js"><\/script>');</script>

        <script src="<?php echo $cp?>/js/vendor/bootstrap.min.js"></script>
        
        <script src="<?php echo $cp?>/js/vendor/makeclass/makeclass.js"></script>

        <script src="<?php echo $cp?>/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
