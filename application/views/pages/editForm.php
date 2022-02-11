<div id="createContainerWrapper">
    <div id="createContainer">
        <?= form_open(base_url("create_form")) ?>
        <div id="formContainer">
            <header id="createHeader">
                <input type="text" placeholder="Title" name="formTitle" value="<?= $survey["survey_title"] ?>" required><br>
                <input type="text" placeholder="Description" name="formDescription" value="<?= $survey["survey_description"] ?>" required><br>
                <input type=" date" placeholder="Start date" name="formStartDate" value="<?= $survey["start_date"] ?>" required><br>
                <input type=" date" placeholder="Due date" name="formDueDate" value="<?= $survey["end_date"] ?>" required>
            </header>

        </div>
        <?php
        foreach ($questions as $question) {
            // var questionText = document.createElement("input");
            // questionText.type = "text";
            // questionText.placeholder = "Question title";
            // questionText.className = "questionText"
            // questionText.required = true;

            // echo "<div class='questionContainer'>";
            // echo "<input type='text' placeholder='Question title' class='questionText' required>";
            // echo "</div>";
        }
        ?>
        <button type=" button" id="addQuestion">Add question</button>
        <button type="submit" id="save">Save</button>
        </form>


    </div>
</div>
<?php
$data["jsFile"] = "createForm.js";
$this->load->view("templates/modals.php", $data);
?>
</body>

</html>