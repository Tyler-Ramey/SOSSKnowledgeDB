<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Knowledge Base</title>
        <link rel="stylesheet" href="..\config\styles.css">
    </head>
    <body>

        <?php
        // Include the database connection file
        require_once 'db_connect.php';

        // Include the header
        include 'header.php';
        ?>

        <div class="content">
            <?php
            // Check if the ID is passed from the link
            if (isset($_GET['id'])) {
                // Sanitize the ID to prevent SQL injection
                $id = intval($_GET['id']);

                try {
                    // Query the database to retrieve the content based on the ID
                    $sql = "SELECT * FROM knowledge_base WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();

                    // Check if the entry with the given ID exists
                    if ($stmt->rowCount() > 0) {
                        // Display the content
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "<div class='entry'>";
                        echo "<h2>" . $row['title'] . "</h2>";
                        echo $row['content'];
                        echo "</div>";
                    } else {
                        echo "Entry not found.";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "Invalid request.";
            }
            ?>
        </div>

        <?php
        // Include the footer
        include 'footer.php';
        ?>

    </body>
</html>
