<?php
header('Content-Type: application/json');

$dsn = 'mysql:host=auth-db1579.hstgr.io;dbname=u603782003_database';
$username = 'u603782003_database';
$password = '$sUF>Ft2';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

$sql = "SELECT * FROM `board` ORDER BY `id` DESC LIMIT 1;";
$stmt = $pdo->query($sql);
$latestData = $stmt->fetch();

echo json_encode($latestData);
?>
