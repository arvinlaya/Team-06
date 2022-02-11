<div id="answerContainerWrapper">
    <div id="answerContainer">
        <?= form_open() ?>
        <div id="formContainer">
            <header id="answerHeader">
                <h1><?= $survey["survey_title"] ?></h1>
                <h3><?= $survey["survey_description"] ?></h3>
            </header>

            <?php
            foreach ($questions as $question) {
                echo "<div class='questionContainer'>";
                echo "<h3 class='questionText'>" . $question["question_text"] . "</h3>";
                echo "<div class='choicesContainer'>";

                switch ($question["question_type"]) {
                    case 1:
                        foreach ($choices as $choice) {
                            if ($choice["question_id"] == $question["question_id"]) {
                                echo "<label class='choiceContainer' for='radioChoice'>";
                                echo "<input type='radio' class='radioChoice' name='" . $choice["question_id"] . "' value='" . $choice["choice_id"] . "'required>";
                                echo $choice["choice_text"];
                                echo "</label>";
                            }
                        }
                        break;

                    case 2:
                        foreach ($choices as $choice) {
                            if ($choice["question_id"] == $question["question_id"]) {
                                echo "<label class='choiceContainer' for='radioChoice'>";
                                echo "<input type='radio' class='checkboxChoice' name='" . $choice["question_id"] . $choice["choice_id"] . "' value='" . $choice["choice_id"] . "'>";
                                echo $choice["choice_text"];
                                echo "</label>";
                            }
                        }
                        break;

                    case 3:
                        echo "<input type='text' class='textChoice' name='" . $question["question_id"] . "' required>";
                        break;
                }

                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <button type="submit" id="submit">Submit</button>
        </form>
    </div>
</div>

<?php
if ($this->session->userdata("currentCode") != $survey["access_code"]) {
    echo "<div id='verifyFormModal'></div>";
    echo '
    <div id="verifyFormContainer">
        <form method="post">
            <h2>Insert verification code</h2>
            <input placeholder="Input code" id="verificationInput" type="text" name="verificationInput" required><br>
            <button type="submit">Verify</button>
        </form>
    </div>
    ';
}

$data["jsFile"] = "answerForm.js";
$this->load->view("templates/modals.php", $data);
?>
</body>

</html>