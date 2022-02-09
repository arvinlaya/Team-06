<div id="container">
    <h2>Change Password</h2>

    <?php
    if (isset($success)) {
        echo "<p id='success'>Password changed successfuly</p>";
    } else if (isset($error)) {
        echo $error;
    }
    ?>

    <?= form_open(base_url("/myaccount/change_password/")); ?>
    <div id="oldPassContainer">
        <label for="oldPass">Old Password
            <input type="password" id="oldPass" name="oldPass">
        </label>
    </div>
    <div id="newPassContainer">
        <label for="newPasss">New Password
            <input type="password" id="newPass" name="newPass">
        </label>
    </div>
    <div id="confirmNewPassContainer">
        <label for="confirmPass">Confirm Password
            <input type="password" id="confirmPass" name="confirmPass">
        </label>
    </div>

    <button>Submit</button>
    </form>
</div>

<?php $this->load->view("templates/modals.php"); ?>

</body>

</html>