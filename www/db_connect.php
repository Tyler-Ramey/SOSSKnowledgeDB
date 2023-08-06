<?php
// Database connection
try {
    $pdo = new PDO('mysql:host=localhost;dbname=soss_knowledge_base', 'tramey', 'TMRtmr2021!');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();
}
?>
