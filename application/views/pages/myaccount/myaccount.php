 <!-- put code here -->
 <div id="container">
     <div id="left">
         <h1>My Account</h1>
         <div id="profilePicture">
             <svg xmlns="http://www.w3.org/2000/svg" width="10rem" height="10rem" viewBox="0 0 24 24">
                 <path d="M12 2c2.757 0 5 2.243 5 5.001 0 2.756-2.243 5-5 5s-5-2.244-5-5c0-2.758 2.243-5.001 5-5.001zm0-2c-3.866 0-7 3.134-7 7.001 0 3.865 3.134 7 7 7s7-3.135 7-7c0-3.867-3.134-7.001-7-7.001zm6.369 13.353c-.497.498-1.057.931-1.658 1.302 2.872 1.874 4.378 5.083 4.972 7.346h-19.387c.572-2.29 2.058-5.503 4.973-7.358-.603-.374-1.162-.811-1.658-1.312-4.258 3.072-5.611 8.506-5.611 10.669h24c0-2.142-1.44-7.557-5.631-10.647z" />
             </svg>
             <h4><?= $first_name . " " . $last_name ?></4>
         </div>
         <div id="options">
             <ul id="optionList">
                 <li style="list-style-image: url('<?= base_url("assets/images/myaccount/pen.png") ?>')"><a href="<?= base_url("/myaccount/edit_profile") ?>">Edit Profile</a></li>
                 <li style="list-style-image: url('<?= base_url("assets/images/myaccount/lock.png") ?>')"><a href="<?= base_url("/myaccount/change_password") ?>">Change Password</a></li>
                 <li style="list-style-image: url('<?= base_url("assets/images/myaccount/form.png") ?>')"><a href="<?= base_url("/myaccount/created_forms") ?>">Created Form</a></li>
                 <li style="list-style-image: url('<?= base_url("assets/images/myaccount/logout.png") ?>')"><a href="<?= base_url("/myaccount/logout") ?>">Logout</a></li>
             </ul>
         </div>
     </div>
     <div id="right">
         <div id="emailContainer">
             <h4>E-mail:</h3>
                 <h5><?= $email ?></h5>
             </h4>
         </div>
         <div id="createdFormContainer">
             <h4>Recently created form</h4>
             <ul id="createdFormList">

             </ul>
         </div>
     </div>
 </div>

 <?php $this->load->view("templates/modals.php"); ?>

 </body>


 </html>