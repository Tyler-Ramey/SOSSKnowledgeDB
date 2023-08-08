<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Link to your CSS file -->
    <link rel="stylesheet" href='..\config\styles.css'>
</head>
<?php
// Include your database connection code here
include('db_connect.php');
include 'header.php';
?>
<div class="search_container">
    <?php
    if (isset($_GET['q'])) {
    $searchTerm = $_GET['q'];

    // Prepare and execute the search query
    $stmt = $pdo->prepare("SELECT id, title FROM knowledge_base WHERE title LIKE :searchTerm");
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
    $stmt->execute();

    // Fetch and display the search results
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $title = $row['title'];

        // Display the result as a link to content.php
        echo '<a href="content.php?id=' . $id . '">' . $title . '</a><br>';
    }
}
    ?>
</div>

<?php include 'footer.php'; ?>

