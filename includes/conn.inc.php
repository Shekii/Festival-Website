<?php
$dsn = 'mysql:host=homepages.shu.ac.uk;dbname=b5044102_db1';
$user = 'b5044102';
$password = 'Haha9283';
try { 
$pdo = new PDO($dsn, $user, $password); 
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$pdo ->exec("SET CHARACTER SET utf8");
}
catch (PDOException $e) { 
echo 'Connection failed again: ' . $e->getMessage();
}

// $dsn = 'mysql:host=localhost;dbname=events';
// $user = 'root';
// $password = '';
// try { 
// $pdo = new PDO($dsn, $user, $password); 
// $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
// $pdo ->exec("SET CHARACTER SET utf8");
// }
// catch (PDOException $e) { 
// echo 'Connection failed again: ' . $e->getMessage();
// }
?>