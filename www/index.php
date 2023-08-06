<?php
require_once 'db_connect.php';
include_once 'header.php';
?>
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
                <!-- Add your FAQs for General here -->
            </div>

            <div id="faqsShipping" class="tabcontent">
                <!-- Add your FAQs for Shipping here -->
            </div>

            <div id="faqsBuyingOnline" class="tabcontent">
                <!-- Add your FAQs for Buying Online here -->
            </div>

            <div id="faqsStatus" class="tabcontent">
                <!-- Add your FAQs for Status here -->
            </div>

            <div id="csrProcesses" class="tabcontent">
                <!-- Add your CSR Processes here -->
            </div>
        </div>
    </main>
<?php
include_once 'footer.php';
?>
