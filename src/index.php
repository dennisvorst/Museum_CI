<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off


require_once ".\class\ButtonToolBar.php";
require_once ".\class\ParameterController.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Honkbalmuseum</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <div id="message">
      <div style="padding: 5px;">
          <div id="inner-message" class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              test error message
          </div>
      </div>
    </div>

    <?php
    $pc = new ParameterController(["a" => "orange", "b" => "banana", "c" => "apple"]);
    echo $pc->getHyperlink();

    $tb = new ButtonToolBar(["A", "B", "C"], "C");
    echo $tb->show();

    $tb = new ButtonToolBar(["1", "2", "3"], "C");
    echo $tb->show();
?>
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>