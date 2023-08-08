<!DOCTYPE html>
<html>
    <head>
        <title>Knowledge Base</title>
        <link rel="stylesheet" type="text/css" href="..\config\styles.css">
    </head>
    <body>
        <?php include_once 'db_connect.php' ?>

        <?php
    // Function to get the content for a specific tab
    function getTabContent($pdo, $tabName) {
    try {
        $stmt = $pdo->prepare("SELECT id, title FROM knowledge_base WHERE category = :tabName");
        $stmt->bindParam(':tabName', $tabName, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
        ?>

        <!-- Header -->
        <?php include 'header.php'; ?>

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
                    <?php
                    $titles = getTabContent($pdo, 'General');
                    foreach ($titles as $title) {
                        echo '<a class="title-link" href="content.php?id=' . $title['id'] . '">' . $title['title'] . '</a>';
                    }
                    ?>

                </div>

                <div id="faqsShipping" class="tabcontent">
                    <?php
                    $titles = getTabContent($pdo, 'Shipping');
                    foreach ($titles as $title) {
                        echo '<a class="title-link" href="content.php?id=' . $title['id'] . '">' . $title['title'] . '</a>';
                    }
                    ?>
                </div>

                <div id="faqsBuyingOnline" class="tabcontent">
                    <?php
                    $titles = getTabContent($pdo, 'BuyingOnline');
                    foreach ($titles as $title) {
                        echo '<a class="title-link" href="content.php?id=' . $title['id'] . '">' . $title['title'] . '</a>';
                    }
                    ?>
                </div>

                <div id="faqsStatus" class="tabcontent">
                    <?php
                    $titles = getTabContent($pdo, 'Status');
                    foreach ($titles as $title) {
                        echo '<a class="title-link" href="content.php?id=' . $title['id'] . '">' . $title['title'] . '</a>';
                    }
                    ?>
                </div>

                <div id="csrProcesses" class="tabcontent">
                    <?php
                    $titles = getTabContent($pdo, 'Processes');
                    foreach ($titles as $title) {
                        echo '<a class="title-link" href="content.php?id=' . $title['id'] . '">' . $title['title'] . '</a>';
                    }
                    ?>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <?php include 'footer.php' ?>

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
