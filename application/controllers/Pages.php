<?php

class Pages extends CI_Controller
{

    public function home()
    {

        // $this->sendEmail();

        $data['title'] = 'TUP Open Stat';
        $data['css'] = "home.css";
        $data += $this->setSessionData();

        // $this->session->sess_destroy();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }

    public function register()
    {
        $this->load->view('pages/register.php');

        $this->form_validation->set_rules('registerEmail', 'Email address', 'is_unique[surveyor.email]');
        $this->form_validation->set_rules('registerNewPassword', 'New password', 'matches[registerConfirmPassword]');
        $this->form_validation->set_rules('registerConfirmPassword', 'Confirm password', 'required');

        if ($this->form_validation->run() == FALSE) {
        } else {
            $emailCode = md5((string)date('Y-m-d H:i:s'));
            $emailCode = substr($emailCode, 0, 7);

            $birthmonth = $this->input->post("registerMonth");
            $birthday = $this->input->post("registerDay");
            $birthyear = $this->input->post("registerYear");
            $birthdate = $birthyear . "-" . $birthmonth . "-" . $birthday;

            $regData['email'] = $this->input->post("registerEmail");
            $regData['first_name'] = $this->input->post("registerName");
            $regData['last_name'] = $this->input->post("registerLastName");
            $regData['birthday'] = $birthdate;
            $regData['gender'] = $this->input->post("registerGender");
            $regData['contact'] = $this->input->post("registerContact");
            $regData['password'] = $this->input->post("registerConfirmPassword");
            $regData['verification_code'] = $emailCode;

            $this->Surveyor->insertSurveyor(...$regData);
            $this->sendEmail($emailCode, $regData['email']);
        }
    }

    public function sendEmail($code, $sendto)
    {
        $emailConfig = array(
            "protocol" => "smtp",
            "smtp_host" => "smtp.gmail.com",
            "smtp_port" => 587,
            "smtp_crypto" => "tls",
            "smtp_user" => "arvinlaya283@gmail.com",
            "smtp_pass" => "qcvdfrtsdizujypn",
            "charset" => "utf-8",
            "newline" => "\r\n"
        );

        $this->email->initialize($emailConfig);

        $this->email->from("arvinlaya283@gmail.com", "TUP Open Stat");
        $this->email->to($sendto);
        $this->email->subject("TUP Open Stat Verification");
        $this->email->message("You are registered successfuly in TUP Open Stat. To proceed please enter the verification code: " . $code);

        $this->email->send();
    }

    public function verify()
    {
        if ($this->session->userdata("verification_code") == $this->input->post("verificationInput")) {
            $this->session->set_userdata("activated", "1");
            $this->Surveyor->editSurveyor($this->session->userdata("surveyor_id"), "activated", "1");
            redirect(base_url());
        } else {
            redirect(base_url());
        }
    }

    public function login()
    {
        $username = $this->input->post("loginEmail");
        $password = $this->input->post("loginPassword");

        $result = $this->Surveyor->loginSurveyor($username, $password);
        if ($result) {
            $session_data = array(
                'surveyor_id' => $result->surveyor_id,
                'email' => $result->email,
                'last_name' => $result->last_name,
                'first_name' => $result->first_name,
                'birthday' => $result->birthday,
                'gender' => $result->gender,
                'contact' => $result->contact,
                'password' => $result->password,
                'activated' => $result->activated,
                'verification_code' => $result->verification_code,
                'login' => true
            );
            $this->session->set_userdata($session_data);
            redirect($this->agent->referrer());
            // redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'Invalid username and password');
            redirect(base_url());
        }
    }

    public function setSessionData()
    {
        $data['id'] = $this->session->userdata("surveyor_id");
        $data['email'] = $this->session->userdata("email");
        $data['last_name'] = $this->session->userdata("last_name");
        $data['first_name'] = $this->session->userdata("first_name");
        $data['age'] = $this->session->userdata("age");
        $data['birthday'] = $this->session->userdata("birthday");
        $data['gender'] = $this->session->userdata("gender");
        $data['password'] = $this->session->userdata("password");
        $data['login'] = $this->session->userdata("login");
        $data['activated'] = $this->session->userdata("activated");
        $data['verification_code'] = $this->session->userdata("verification_code");
        return $data;
    }

    public function myaccount()
    {
        $data['css'] = "myaccount/myaccount.css";
        $data['title'] = "My account";
        $data += $this->setSessionData();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/myaccount/myaccount', $data);
    }

    public function editprofile()
    {
        $data['css'] = "myaccount/editprofile.css";
        $data['title'] = "Edit profile";
        $data += $this->setSessionData();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/myaccount/editprofile', $data);
    }

    public function verifyEdit()
    {
        $email = str_replace(" ", "", $this->input->post("email"));
        $name = str_replace(" ", "", $this->input->post("name"));
        $lastName = str_replace(" ", "", $this->input->post("lastName"));
        $month = str_replace(" ", "", $this->input->post("month"));
        $day = str_replace(" ", "", $this->input->post("day"));
        $year = str_replace(" ", "", $this->input->post("year"));
        $id = $this->session->userdata("surveyor_id");
        if (strlen($email) > 0) {
            $this->Surveyor->editSurveyor($id, "email", $email);
            $this->session->set_userdata("email", $email);
        }

        if (strlen($name) > 0) {
            $this->Surveyor->editSurveyor($id, "first_name", $name);
            $this->session->set_userdata("first_name", $name);
        }

        if (strlen($lastName) > 0) {
            $this->Surveyor->editSurveyor($id, "last_name", $lastName);
            $this->session->set_userdata("last_name", $lastName);
        }

        if (strlen($month) > 0 && strlen($day) > 0 && strlen($year) > 0) {
            $birthday = $year . "-" . $month . "-" . $day;
            $this->Surveyor->editSurveyor($id, "birthday", $birthday);
            $this->session->set_userdata("birthday", $birthday);
        }

        redirect($this->agent->referrer());
    }

    public function changepassword()
    {
        $data['css'] = "myaccount/changepassword.css";
        $data['title'] = "Change password";
        $data += $this->setSessionData();

        $this->form_validation->set_rules("oldPass", "Old Password", array(
            "required",
            array(
                "wrong pass",
                function ($input) {
                    return password_verify($input, $this->session->userdata("password"));
                }
            )
        ));
        $this->form_validation->set_message("wrong pass", "Wrong password.");
        $this->form_validation->set_rules("newPass", "New Password", "required");
        $this->form_validation->set_rules('confirmPass', 'Confirm Password', 'matches[newPass]|required');

        if ($this->form_validation->run() == false) {
            $data["error"] = validation_errors();
        } else {
            $data["success"] = "Password changed successfuly.";
            $this->session->set_userdata("password", password_hash($this->input->post("newPass"), PASSWORD_DEFAULT));
            $this->Surveyor->editSurveyor($data["id"], "password", password_hash($this->input->post("newPass"), PASSWORD_DEFAULT));

            $data += $this->setSessionData();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pages/myaccount/changepassword', $data);
    }

    public function createdforms()
    {
        $data['css'] = "myaccount/createdforms.css";
        $data['title'] = "Created forms";
        $data += $this->setSessionData();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/myaccount/createdforms', $data);
    }
}
