<?php
if (isset($_POST['calculeaza'])) {
include './src/includes/header.php';

//echo var_dump($_POST);
print_r(var_dump($_POST));

include './src/includes/footer.php';
} else {
    header('Location: ./error.php');
    exit();
}