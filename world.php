<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country'];
$city = $_GET['context'];
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$test = $conn->query("SELECT city.name, city.district,city.population FROM cities city LEFT JOIN countries country ON city.country_code = country.code  WHERE country.name LIKE '%$country%'");
$caught = $test->fetchALL(PDO::FETCH_ASSOC);

?>
<?php if($city == 'country'):?>
<table class = 'table'>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
</tr>
<?php foreach ($results as $row): ?>
  <tr>
    <td><?=$row['name'];?></td>
    <td><?=$row['continent'];?></td>
    <td><?=$row['independence_year'];?></td>
    <td><?=$row['head_of_state'];?></td>
</tr>
<?php endforeach;?>
<?php elseif($city == 'cities'):?> 
<table class = 'table'>
  <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
</tr>
<?php foreach ($caught as $row): ?>
  <tr>
    <td><?=$row['name'];?></td>
    <td><?=$row['district'];?></td>
    <td><?=$row['population'];?></td>
</tr>
<?php endforeach;?>
<?php endif;?>

