<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Фотогалерея</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/starter-template.css" rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/main/index">Фотогалерея</a>
        <div class="nav-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/main/index">Главная</a></li>
            <li class="active"><a href="/photo/upload">Залить фото</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
<h1>Загрузка нового фото</h1>
<div class="row">
  <div class='col-lg-4'>
    <form enctype="multipart/form-data" action="" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
        Название: <input type="text" name="title" class="form-control col-lg-4"  ><br>
        Описание: <textarea name='descr' class="form-control col-lg-4" ></textarea><br>
        Выберите фото: <input name="photo" type="file" /><br/>
        <input type="submit" value="Загрузить" />
    </form>
  </div>
</div>
    </div><!-- /.container -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>