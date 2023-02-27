<?php
    include "../Class/product_class.php";
    $product = new product;

 
        $product_id = $_GET['product_id'];
    
        $delete_product = $product -> delete_product($product_id);

    


?>