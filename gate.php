<?php
if (isset($_POST['calculeaza'])) {
include './src/includes/header.php';
include './src/classes/ConstructorPoarta.php';

$constructor_poarta = new ConstructorPoarta();

$poarta = $constructor_poarta->poarta12(1800,1000,3000);

    print("<pre>".print_r($poarta,true)."</pre>");

include './src/includes/footer.php';
} else {
    header('Location: ./error.php');
    exit();
}