<div id="createContainerWrapper">
    <div id="createContainer">
        <?= form_open(base_url("create_form")) ?>
        <div id="formContainer">
            <header id="createHeader">
                <input type="text" placeholder="Title" name="formTitle" required><br>
                <input type="text" placeholder="Description" name="formDescription" required><br>
                <input type="date" placeholder="Start date" name="formStartDate" required><br>
                <input type="date" placeholder="Due date" name="formDueDate" required>
            </header>

        </div>
        <button type="button" id="addQuestion">Add question</button>
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