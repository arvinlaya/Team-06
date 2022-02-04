<div id="bgModal"></div>
<?php $this->load->view("templates/login.php"); ?>
<?php
if (isset($activated) && $activated == 0) {
    $this->load->view('templates/verify');
}
?>

<script type="text/javascript" src="<?= base_url('assets/js/verify.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/login.js') ?>"></script>

<?php
if (isset($jsFile)) {
    $path = base_url("assets/js/" . $jsFile);
    echo '<script type="text/javascript" src="' . $path . '"></script>';
}
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>