<?php

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$db = new PDO('mysql:host=localhost;dbname=covidtracker;', 'root', '', $options);

$sql = "SELECT * FROM countries";   
$result = $db->query($sql);
if($result->rowCount() == 0){

$json = file_get_contents('https://api.covid19api.com/countries');



$sql = "INSERT IGNORE INTO `countries` (`Country`,`Slug`,`ISO2`)
                      VALUES (:Country, :Slug, :ISO2)";
$stmt = $db->prepare($sql);


$arr = json_decode($json, true);
$i = 0;

foreach ($arr as $row) {

    $i++;

    $data = array(
        ':Country' => $row["Country"],
        ':Slug' => $row["Slug"],
        ':ISO2' => $row["ISO2"]

    );

  
    $stmt->execute($data);
}
}

?>