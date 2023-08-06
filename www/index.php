<!DOCTYPE html>
<html>
<head>
    <title>Knowledge Base</title>
    <link rel="stylesheet" href="..\config\styles.css">
</head>
<body>
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

// Function to get the content for a specific tab
function getTabContent($pdo, $tabName) {
    try {
        $stmt = $pdo->prepare("SELECT content FROM knowledge_base WHERE category = :tabName");
        $stmt->bindParam(':tabName', $tabName, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
?>

<!-- Header -->
<header>
        <div class="container">
            <a href="#" class="logo">
                <img src="logo.png" alt="SOSS Logo">
            </a>
            <nav>
                <input type="text" id="search-bar" placeholder="Search...">
                <a href="#" class="home-btn">Home</a>
            </nav>
        </div>
    </header>

<!-- Main content -->
<main>
    <div class="container">
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'faqsGeneral')">FAQs General</button>
            <button class="tablinks" onclick="openTab(event, 'faqsShipping')">FAQs Shipping</button>
            <button class="tablinks" onclick="openTab(event, 'faqsBuyingOnline')">FAQs Buying Online</button>
            <button class="tablinks" onclick="openTab(event, 'faqsStatus')">FAQs Status</button>
            <button class="tablinks" onclick="openTab(event, 'csrProcesses')">CSR Processes</button>
        </div>

        <div id="faqsGeneral" class="tabcontent">
            <?php echo getTabContent($pdo, 'General'); ?>
        </div>

        <div id="faqsShipping" class="tabcontent">
            <?php echo getTabContent($pdo, 'Shipping'); ?>
        </div>

        <div id="faqsBuyingOnline" class="tabcontent">
            <?php echo getTabContent($pdo, 'BuyingOnline'); ?>
        </div>

        <div id="faqsStatus" class="tabcontent">
            <?php echo getTabContent($pdo, 'Status'); ?>
        </div>

        <div id="csrProcesses" class="tabcontent">
            <?php echo getTabContent($pdo, 'CSRProcesses'); ?>
        </div>
    </div>
</main>

<!-- Footer -->
<footer>
    Designed by T. Ramey for INFR 495
</footer>

<script>
    // JavaScript for tab functionality
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("active");
    }

    // Open the first tab by default
    document.getElementsByClassName("tablinks")[0].click();
</script>
</body>
</html>
