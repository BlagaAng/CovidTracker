<?php
require_once("connectCountries.php");
require_once("connectCases.php");
try {
  $options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  );

  $db = new PDO('mysql:host=localhost;dbname=covidtracker;', 'root', '', $options);
} catch (PDOException $e) {
  die("can not connect to db");
}

 $stmt = $db->query($sql);

?>


<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

  <link rel="stylesheet" href="./css/style.css">
  <title>CovidTracker</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="#">COVID TRACKER</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled active" href="#" tabindex="-1" aria-disabled="true">Covid data by Country</a>
          </li>
        </ul>
        <form class="d-flex">
          <button class="btn btn-outline-success me-5" type="submit">SYNC</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="bg-image"></div>













  <div class="container">


    <table class="table table-bordered">

      <tr>
        <th>Country</th>
        <th>Total Cases</th>
        <th>Active Cases</th>
        <th>Deaths</th>
        <th>Recovered</th>
        <th>New cases</th>
        <th>New deaths</th>
        <th>New recovered</th>
      </tr>
      <?php
      while ($country = $stmt->fetch()) {
        echo "<tr>
      <td>{$country['Country']}</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      </tr>
      ";
      }

      ?>


    </table>


  </div>







  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>


</body>

</html>