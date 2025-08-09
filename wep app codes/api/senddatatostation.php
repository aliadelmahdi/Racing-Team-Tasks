<?php
// Database configuration
$dsn = 'mysql:host=auth-db1579.hstgr.io;dbname=u603782003_123';
$username = 'u603782003_123';
$password = '2r+5s8a>D|k';
$options = [];  // Define the options array

try {
    $pdo = new PDO($dsn, $username, $password, $options);  // Use $pdo here
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

// Prepare SQL query with the correct number of columns (27 columns)
$sql = "INSERT INTO pm_videos (
    uniq_id, video_title, description, yt_id, yt_length, yt_thumb, yt_views,
    category, submitted_user_id, submitted, lastwatched, added, site_views, 
    url_flv, source_id, language, age_verification, last_check, status, featured,
    restricted, allow_comments, allow_embedding, video_slug, SerieId, SeasonId, 
    EpisodeId, video_title_sub, embed_servers, video_type
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement using $pdo instead of $conn
$stmt = $pdo->prepare($sql);

// Bind parameters to the statement using bindValue() method
$stmt->bindValue(1, $_GET['uniq_id'], PDO::PARAM_STR);
$stmt->bindValue(2, $_GET['video_title'], PDO::PARAM_STR);
$stmt->bindValue(3, $_GET['description'], PDO::PARAM_STR);
$stmt->bindValue(4, $_GET['yt_id'], PDO::PARAM_STR);
$stmt->bindValue(5, $_GET['yt_length'], PDO::PARAM_INT);
$stmt->bindValue(6, $_GET['yt_thumb'], PDO::PARAM_STR);
$stmt->bindValue(7, $_GET['yt_views'], PDO::PARAM_INT);
$stmt->bindValue(8, $_GET['category'], PDO::PARAM_STR);
$stmt->bindValue(9, $_GET['submitted_user_id'], PDO::PARAM_INT);
$stmt->bindValue(10, $_GET['submitted'], PDO::PARAM_STR);
$stmt->bindValue(11, $_GET['lastwatched'], PDO::PARAM_STR);
$stmt->bindValue(12, $_GET['added'], PDO::PARAM_STR);
$stmt->bindValue(13, $_GET['site_views'], PDO::PARAM_INT);
$stmt->bindValue(14, $_GET['url_flv'], PDO::PARAM_STR);
$stmt->bindValue(15, $_GET['source_id'], PDO::PARAM_INT);
$stmt->bindValue(16, $_GET['language'], PDO::PARAM_STR);
$stmt->bindValue(17, $_GET['age_verification'], PDO::PARAM_INT);
$stmt->bindValue(18, $_GET['last_check'], PDO::PARAM_STR);
$stmt->bindValue(19, $_GET['status'], PDO::PARAM_STR);
$stmt->bindValue(20, $_GET['featured'], PDO::PARAM_INT);
$stmt->bindValue(21, $_GET['restricted'], PDO::PARAM_INT);
$stmt->bindValue(22, $_GET['allow_comments'], PDO::PARAM_INT);
$stmt->bindValue(23, $_GET['allow_embedding'], PDO::PARAM_INT);
$stmt->bindValue(24, $_GET['video_slug'], PDO::PARAM_STR);
$stmt->bindValue(25, $_GET['SerieId'], PDO::PARAM_INT);
$stmt->bindValue(26, $_GET['SeasonId'], PDO::PARAM_INT);
$stmt->bindValue(27, $_GET['EpisodeId'], PDO::PARAM_INT);
$stmt->bindValue(28, $_GET['video_title_sub'], PDO::PARAM_STR);
$stmt->bindValue(29, $_GET['embed_servers'], PDO::PARAM_STR);
$stmt->bindValue(30, $_GET['video_type'], PDO::PARAM_STR);

// Execute the query
if ($stmt->execute()) {
    echo "Record inserted successfully!";
} else {
    echo "Error: " . $stmt->errorInfo()[2];
}

// Close the statement and connection
$stmt = null;
$pdo = null;
?>
