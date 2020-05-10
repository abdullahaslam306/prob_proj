

    <?php

    if(isset($_GET))
    {
     $str = '"C:\\Program Files\\R\\R-3.6.3\\bin\Rscript.exe" C:\\wamp64\\www\\Prob_Project\\prob\\sample.R '.$_GET["country1"].' '.$_GET["country2"].' '.$_GET["country3"].' Overall"'; 
     // echo($str);
     exec($str,$output);
     $res = $output[1];
     $res = explode(" ",$res);
     $values = array();
     foreach($res as $x)
     {
       if($x!=="")
       array_push($values,$x);
     }

     

     print_r($values);
    }
    ?>

  

<!doctype html>
<html lang="en">
  <head>
    <title>Testing</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      

      <div class="container">
        <form action="" method="GET">
          <div class="form-group row">
            <label for="inputName" class="col-sm-1-12 col-form-label">Country1:</label>
            <div class="col-sm-1-12">
              <input type="text" class="form-control" name="country1" id="country1" placeholder="">
              <br>
            </div>
            <br>
            <label for="inputName" class="col-sm-1-12 col-form-label">Country2:</label>
            <div class="col-sm-1-12">
              <input type="text" class="form-control" name="country2" id="country1" placeholder="">
              
            </div>
            <br>
            <label for="inputName" class="col-sm-1-12 col-form-label">Country3:</label>
            <div class="col-sm-1-12">
              <input type="text" class="form-control" name="country3" id="country1" placeholder="">
              <br>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>