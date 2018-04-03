<?php
    print_r($_POST);

    if(isset($_POST['delete'])) {
        if(isset($_POST['checked'])) {
            echo $_POST['checked'];
        }
    }
    if(isset($_POST['addToCart'])) {
        echo "add to cart btn pressed";
    }
?>