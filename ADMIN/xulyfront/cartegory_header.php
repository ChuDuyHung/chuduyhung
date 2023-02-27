<?php
include "index_header.php";
include "../Class/index_class.php";


?>

<?php

$index = new index;
$show_cartegory = $index->show_cartegory();

?>
<section class="cartegory">
    <div class="container">
        <!-- <div class="cartegory-top row">
            <p>Trang chủ</p> <span>&#62;</span>
            <p>NIKE</p><span>&#62;</span>
        </div> -->
        <br>
        <br>
        <br>
        <br>
        
    </div>
    <div style="padding: 0 20px;" class="container">
        <div class="row">
            <div class="cartegory-left">
                <ul>
                    <?php
                    if ($show_cartegory) {
                        while ($result = $show_cartegory->fetch_assoc()) {
                            $cartegory_id = $result['cartegory_id'];
                            
                    ?>

                    <li class="cartegory-left-li"><a href="#" id="cartegory_id"><?php echo $result['cartegory_name'] ?></a>
                        <ul>
                            <?php
                            $show_brand = $index->show_brand_by_cartegory_id($cartegory_id);
                            if ($show_brand) {
                                while ($resultA = $show_brand->fetch_assoc()) {
                                   
                            ?>
                            <li><a href="cartegory_product.php?sp=<?php echo $resultA['slug'] ?>"><?php echo $resultA['brand_name'] ?></a></li>
                               
                            <?php       
                                }
                             }
                            ?>
                        </ul>
                    </li>
                    <?php
                        }
                    }
                    ?>

                </ul>
                
            </div>



            