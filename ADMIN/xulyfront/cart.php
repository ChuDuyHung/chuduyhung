<?php
include "index_header.php";
include "../Class/index_class.php";

?>

<?php
// $index = new index;

?>

<?php 
session_start();

if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];

if(isset($_GET['delcart']) && ($_GET['delcart'] == 1) ){
    unset($_SESSION['giohang']);
}

if(isset($_GET['delsp']) && ($_GET['delsp'] >= 0)){
    array_splice($_SESSION['giohang'], $_GET['delsp'], 1);

}

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
        if(($_SESSION['giohang'][$i][1] == $product_name) && ($_SESSION['giohang'][$i][0] == $product_color)){
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


<?php
$order_detail = new index;
$show_order_detail = $order_detail -> show_order_detail();
?>
    <section class="cart">
            <div class="container">
                <div class="cart-top-wrap">
                    <div class="cart-top">
                        <div class="cart-top-cart cart-top-item">
                            <i class="ti-shopping-cart-full"></i>
                        </div>
                        <div class="cart-top-address cart-top-item">
                            <i class="ti-location-pin"></i>
                        </div>
                        <!-- <div class="cart-top-payment cart-top-item">
                            <i class="ti-money"></i>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="cart-content row">
                    <div class="cart-content-left">
                        <table>
                            <tr>
                                <th>S???n ph???m</th>
                                <th>T??n s???n ph???m</th>
                                <th>M??u</th>
                                <th>Size</th>
                                <th>SL</th>
                                <th>Th??nh ti???n</th>
                                <th>X??a</th>
                            </tr>
                            <?php
                                $ttsp = 0;
                                $i = 0;
                                if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))){
                                    
                                    for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                                        $tt= $_SESSION['giohang'][$i][3] * $_SESSION['giohang'][$i][2];
                                        $ttsp = $ttsp + $tt;
                                        echo'
                                            <tr>
                                                <td><img src="../uploads/'.$_SESSION['giohang'][$i][5].'" alt=""></td>
                                                <td>
                                                    <p>'.$_SESSION['giohang'][$i][1].'</p>
                                                </td>
                                                <td>'.$_SESSION['giohang'][$i][0].'</td>
                                                <td>
                                                    <p>'.$_SESSION['giohang'][$i][4].'</p>
                                                </td>
                                                <td>'.$_SESSION['giohang'][$i][2].'</td>
                                                <td>
                                                    <p>'.$tt.'<sup>??</sup></p>
                                                </td>
                                                <td>
                                                    <a href="cart.php?delsp='.$i.'"> X??a </a>
                                                </td>
                                            </tr>';
                                        }
                                        
                                    }
                                    
                            ?>
                                            


                        </table>
                        <br>
                        <div class="cart-content-right-button">
                            <a href="cart.php?delcart=1"> <button type="submit"> X??a GI??? H??ng </button> </a>
                        </div>
                    </div>
                    <div class="cart-content-right">
                        <table>
                            <tr>
                                <th colspan="2">T???NG TI???N GI??? H??NG</th>
                            </tr>
                            <tr>
                                <td>T???NG S???N PH???M</td>
                                <td><?php echo "$i"; ?></td>
                            </tr>
                            <tr>
                                <td>T???NG TI???N H??NG</td>
                                <td>
                                    <p ><?php  echo "$ttsp" ?> <sup>??</sup></p>


                                </td>
                            </tr>
                            <tr>
                                <td>T???M T??NH</td>
                                <td>
                                    <p style="color: black; font-weight:bold;"><?php  echo "$ttsp" ?> <sup>??</sup></p>
                                </td>
                            </tr>
                        </table>
                        <div class="cart-content-right-text">
                            <p>B???n s??? ???????c mi???n ph?? ship khi ????n h??ng c???a b???n c?? t???ng gi?? tr??? tr??n 1.000.000 ??</p>
                            <p style="color: red; font-weight : bold;"> <span style="font-size:18px;">
                            <?php if($ttsp >= 1000000){
                                    echo "B???n ???? ????? ??i???u ki???n freeship";

                                }else{
                                    
                                    echo "B???n c???n mua th??m ????? ???????c freeship";
                                }
                            ?>
    
                        </div>
                        <div class="cart-content-right-button">
                            <a href="cartegory.php"><button>TI???P T???C MUA S???M</button></a>
                            <a href="delivery.php"><button type="submit" >THANH TO??N</button></a>
                        </div>
                        <!-- <div class="cart-content-right-dangnhap">
                            <p>T??i kho???n Google</p> <br>
                            <p> <a href="">H??y ????ng nh???p t??i kho???n c???a b???n ????? t??ch ??i???m th??nh vi??n</a></p>
                        </div> -->
                    </div>
                </div>
            </div>
    </section>