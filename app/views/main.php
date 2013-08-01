<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Фотогалерея</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

    <!-- Fancybox -->
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/index.php?do=main/index">Фотогалерея</a>
        <div class="nav-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/index.php?do=main/index">Главная</a></li>
            <li><a href="/index.php?do=photo/upload">Залить фото</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <h1>Последние фото</h1>
    
    <div class="bs-example">
      <div class="row">
<?php foreach($images as $v) : ?>
        <div class="col-lg-4">
          <div class="thumbnail">
            <a class="fancybox" rel="gallery" href="<?='/upload/'.$v['path'];?>" title="<?=$v['title'];?>" >
              <img src="<?='/upload/'.$v['path'];?>" align="center" style="max-width:100%; max-height:300px;" alt="<?=$v['title'];?>">
            </a>
            <div class="caption">
              <h3><?=$v['title']?></h3>
              <p><?=$v['descr']?></p>
            </div>
          </div>
        </div>
<?php endforeach; ?>
      </div>
    </div>

    </div><!-- /.container -->



    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <script>
      $(document).ready(function() {
        $(".fancybox").fancybox({
          openEffect  : 'elastic',
          closeEffect : 'elastic',

          helpers : {
            title : {
              type : 'inside'
            }
          }
        });
      });
    </script>
  </body>
</html>