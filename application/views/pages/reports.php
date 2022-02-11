<div id="reportsContainer">
    <?php
    foreach ($surveys as $survey) {
        echo "<div class='createdFormContainer'>";
        echo "<h3 class='formTitle'>" . $survey->survey_title . "</h3>";
        echo "<p class='formDescription'>" . $survey->survey_description . "</p>";
        echo "<div class='linksContainer'>";
        echo "<a href='" . base_url("reports/charts/" . $survey->survey_id) . "'>View reports</a>";
        echo "<a href='" . base_url("answer_form/" . $survey->survey_id) . "'>Answer form</a>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>

<?php
$data["jsFile"] = "answerForm.js";
$this->load->view("templates/modals.php", $data);
?>
</body>

</html>