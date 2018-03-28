<?php

include_once(dirname(__FILE__) . '/../../class/include.php');


if (isset($_POST['register'])) {
    $MEMBER = new Member(NULL);
    $VALID = new Validator();


    $pw = md5($_POST['password']);
    $cpw = md5($_POST['confirm_password']);
    $email = $_POST['email'];
    $cemail = $_POST['cnfemail'];


    if ($cpw == $pw) {

        if ($email == $cemail) {

            $MEMBER->name = filter_input(INPUT_POST, 'name');
            $MEMBER->email = $email;
            $MEMBER->contact_number = filter_input(INPUT_POST, 'contact_number');
            $MEMBER->username = filter_input(INPUT_POST, 'username');
            $MEMBER->password = $cpw;


            $VALID->check($MEMBER, [
                'name' => ['required' => TRUE],
                'email' => ['required' => TRUE],
                'contact_number' => ['required' => TRUE],
                'username' => ['required' => TRUE],
                'password' => ['required' => TRUE]
            ]);

            if ($VALID->passed()) {
                $MEMBER->create();

                if (!isset($_SESSION)) {
                    session_start();
                }
                $VALID->addError("Your data was saved successfully", 'success');
                $_SESSION['ERRORS'] = $VALID->errors();

                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {

                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['ERRORS'] = $VALID->errors();
            }
            header('location: ../profile.php?message=10');
        } else {
            header('Location: ../register.php?message=19');
        }
    } else {
        header('Location: ../register.php?message=17');
    }
}

if (isset($_POST['login'])) {

    $MEMBER = new Member(NULL);

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));



    if ($MEMBER->login($username, $password)) {
        header('Location: ../profile.php?message=5');
        exit();
    } else {
        header('Location: ../login.php?message=7');
        exit();
    }
}

if (isset($_POST['update'])) {

    $MEMBER = new Member($_POST['id']);

    $MEMBER->profile_picture = $imgName;
    $MEMBER->name = mysql_real_escape_string($_POST['name']);
    $MEMBER->email = mysql_real_escape_string($_POST['email']);
    $MEMBER->nic_number = filter_input(INPUT_POST, 'nic_number');
    $MEMBER->date_of_birthday = filter_input(INPUT_POST, 'date_of_birthday');
    $MEMBER->contact_number = filter_input(INPUT_POST, 'contact_number');
    $MEMBER->driving_licence_number = filter_input(INPUT_POST, 'driving_licence_number');
    $MEMBER->home_address = filter_input(INPUT_POST, 'home_address');
    $MEMBER->city = filter_input(INPUT_POST, 'city');
    $MEMBER->contact_number = mysql_real_escape_string($_POST['contact_number']);
    $MEMBER->about_me = filter_input(INPUT_POST, 'about_me');
    $MEMBER->username = mysql_real_escape_string($_POST['username']);


    $VALID = new Validator();

    $VALID->check($MEMBER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'nic_number' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'driving_licence_number' => ['required' => TRUE],
        'username' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $MEMBER->update();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your changes saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
