<?php
include "index_header.php";
include "../Class/index_class.php";

?>



<?php 
session_start();

if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];


if(isset($_POST['addcart']) && ($_POST['addcart'])){
    // lay du lieu
    $product_color = $_POST['product_color'];
    $product_name = $_POST['product_name'];
    $quantily = $_POST['quantily'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $img = $_POST['img'];

    //bien kt
    $kt = 0;
    //kiem tra lap sp trong gio
    for ($i=0; $i < sizeof($_SESSION['giohang']) ; $i++) { 
        if($_SESSION['giohang'][$i][1] == $product_name){
            $quantilyNew = $quantily + $_SESSION['giohang'][$i][2];
            $_SESSION['giohang'][$i][2] = $quantilyNew;
            $kt=1;
            break;     
        }
    }

    // them sp
if ($kt == 0) {
    $sp = [$product_color,$product_name, $quantily, $price, $size, $img];
    $_SESSION['giohang'][] = $sp;
}
    // unset($_SESSION['giohang']);
    // var_dump($_SESSION['giohang']);
}


?>





    <section class="delivery">
        <form action="" method="post">
            <div class="container">
                <div class="delivery-top-wrap">
                    <div class="delivery-top">
                        <div class="delivery-top-delivery delivery-top-item">
                            <i class="ti-shopping-cart-full"></i>
                        </div>
                        <div class="delivery-top-address delivery-top-item">
                            <i class="ti-location-pin"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div style="padding-left: 20px ;" class="container row">
                <div class="delivery-content">
                    <div class="delivery-content-left"  >
                        <p style=" font-size: larger ; " >Đặt hàng thành công</p>
                        <div class="payment-content row">
                            <br>
                    <div class="payment-content-left"  >
                    
                        
                </div>

                    </div>
                    <div class="delivery-content-right">

                        <br>
                        <br>
                        <br>
                        <br>
                        <table>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giảm giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            <?php
                                    $a = 100000;
                                    $ttsp = 0;
                                    $i = 0;
                                    if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))){
                                        
                                        for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                                            $tt= $_SESSION['giohang'][$i][3] * $_SESSION['giohang'][$i][2];
                                            $ttsp = $ttsp + $tt;
                                            echo'
                                            <tr>
                                                <td>'.$_SESSION['giohang'][$i][1].'</td>
                                                <td> 0% </td>
                                                <td>'.$_SESSION['giohang'][$i][2].'</td>
                                                <td style="font-weight: bold ;" colspan="3">'.$tt.'<sup>đ</sup></p></td>
                                            </tr>';
                                        }
                                        
                                    }
                                    
                            ?>

                                            <tr>
                                                <p></p>
                                                <td style="font-weight: bold ;" colspan="3">Tổng</td>
                                                <td style="font-weight: bold ;" colspan="3"><?php  echo " $ttsp" ?><sup>đ</sup></p></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold ;" colspan="3">Thuế VAT</td>
                                                <td style="font-weight: bold ;" colspan="3"><?php  echo - " $a" ?><sup>đ</sup></p></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold ;" colspan="3">Tổng tiền hàng</td>
                                                <!-- <?= $o = $ttsp - $a; ?> -->
                                                <td style="font-weight: bold ;" colspan="3"><?php  echo " $o" ?><sup>đ</sup></p></td>
                                            </tr>

                    
                        </table>
                    </div>
                </div>
            </div>
        </form>



<?php

$order_detail = new index;
$order = new index;
$show_order_detail = $order_detail -> show_order_detail();

if(isset($_POST['add']) && ($_POST['add'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $total = $o;
    $pttt = $_POST['method-payment'];
    $order_id = taodonhang($name, $phone, $address, $total, $pttt);



    for ($i=0; $i < sizeof($_SESSION['giohang']) ; $i++) { 
        $quantily = $_SESSION['giohang'][$i][2];
        $price = $_SESSION['giohang'][$i][3];
        $tong = $o;
        $size = $_SESSION['giohang'][$i][4];
        
        taogiohang($quantily, $price, $tong, $size, $order_id);

    }
    unset($_SESSION['giohang']);
    $ttkh = '
        <h2> Mã đơn hàng: '.$order_id.' </h2>
        <div class="delivery-content-left-input-top row">
            <div class="delivery-content-left-input-top-item">
                <label  for="">Họ tên <span style="color: red;">*</span></label>
                <p>'.$name.'</p>
                
                
            </div>
            <div class="delivery-content-left-input-top-item">
                <label for="">Điện thoại <span style="color: red;">*</span></label>
                
                <p>'.$phone.'</p>
            </div>
            
            <div class="delivery-content-left-input-bottom">
                <label for="">Địa chỉ <span style="color: red;">*</span></label>

                <p>'.$address.'</p>
            </div>

        </div>

';




    // var_dump($insert_order);    
}







?>

