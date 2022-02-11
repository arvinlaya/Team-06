<h2>Survey Forms</h2>
<div id="createdFormsContainer">
    <?php
    foreach ($surveys as $survey) {
        echo "<div class='linkWrapper'>";
        echo "<div class='createdFormContainer'>";
        echo "<a href='" . base_url("answer_form/" . $survey->survey_id) . "'>";
        echo "<h3 class='formTitle'>" . $survey->survey_title . "</h3>";
        echo "<p class='formDescription'>" . $survey->survey_description . "</p>";
        echo "</a>";
        echo "<button class='deleteForm' onclick='location.href=`" . base_url("delete_form/" . $survey->survey_id) . "`'><img src='" . base_url("assets/images/myaccount/delete.png") . "'</button>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>
<?php $this->load->view("templates/modals.php"); ?>
</body>

</html>