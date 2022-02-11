    <div id="container">
        <?= validation_errors(); ?>
        <?= form_open(base_url("myaccount/edit_profile/verify")) ?>
        <div id="emailContainer">
            <label for="email"><span>Email address <button type="button" class="toggleEdit"><img src="<?= base_url('assets/images/myaccount/edit.png') ?>"></button></span>
                <input type="email" id="email" name="email" disabled required>
            </label>
        </div>
        <div id="nameContainer">
            <label for="name"><span>First name <button type="button" class="toggleEdit"><img src="<?= base_url('assets/images/myaccount/edit.png') ?>"></button></span>
                <input type="text" id="name" name="name" disabled required> </label>
        </div>
        <div id="lastNameContainer">
            <label for="name"><span>Last name <button type="button" class="toggleEdit"><img src="<?= base_url('assets/images/myaccount/edit.png') ?>"></button></span>
                <input type="text" id="lastName" name="lastName" disabled required>
            </label>
        </div>
        <div id="birthdayContainer">
            <label for="month"><span>Birthday <button type="button" class="toggleEdit"><img src="<?= base_url('assets/images/myaccount/edit.png') ?>"></button></span>
                <div id="birthdayInputContainer">
                    <select name="month" id="month" disabled required>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <input type="number" min="0" max="31" placeholder="Day" name="day" disabled required>
                    <input type="number" min="1900" max="2025" placeholder="Year" name="year" disabled required>
                </div>
            </label>
        </div>

        <button>Confirm edit</button>
        </form>

    </div>

    <?php
    $data["jsFile"] = "editProfile.js";
    $this->load->view("templates/modals.php", $data); ?>
    </div>

    </body>

    </html>