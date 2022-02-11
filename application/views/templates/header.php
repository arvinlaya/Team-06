<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/boilerplate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/header.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/' . $css); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@100;300&family=Karla&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title><?php echo $title ?></title>
</head>

<body>
    <nav id="navContainer">
        <ul id="navlinks">
            <li><a href="<?= base_url() ?>" id="logo">TUPOpenStat</a></li>
            <li><a href="#">FORM<span style="font-size: 1.3rem;">&#9660;</span></a>
                <ul>
                    <li><a href="<?= base_url("create_form") ?>">Create form</a></li>
                    <li><a href="<?= base_url("reports") ?>">Answer form</a></li>
                </ul>
            </li>
            <li><a href="<?= base_url("reports") ?>">DATA REPORTS</a></li>
        </ul>
        <?php
        if (isset($login) == false) {
            echo '<a href="#" id="sign-in">Sign in</a>';
        } else {
            echo "<div id='profileLinks'>";
            echo '<h2 id="signed-in">', $first_name, ' ', $last_name, '</h2>';
            echo '<a href="' . base_url("myaccount") . '"><img src="' . base_url("assets/images/profile.png") . '"></a>';
            echo "</div>";
        }
        ?>

    </nav>