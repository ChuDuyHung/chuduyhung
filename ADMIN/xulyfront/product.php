<?php
include "index_header.php";
include "../Class/index_class.php";
if (isset($_GET['chitiet'])) {
    $id = $_GET['chitiet'];
    $product = mysqli_query($conn, "SELECT * FROM tbl_product WHERE product_id = '$id'");
    $resultA = mysqli_fetch_assoc($product);
    $id_product = $resultA['product_id'];
    $product_mota = mysqli_query($conn, "SELECT * FROM tbl_product_img_mota WHERE product_id = '$id_product'");
    $result = mysqli_fetch_assoc($product_mota);

    $show_product = mysqli_query($conn, "SELECT * FROM tbl_product ORDER BY product_id DESC limit 5 ");
    $resultB = mysqli_fetch_assoc($show_product);

    //  var_dump($_GET);
}

?>
<?php
// $index = new index;
// if($_SERVER['REQUEST_METHOD']=== 'POST'){
//     $product_id = $_POST['product_id'];
//     $size = $_POST['size'];
//     $quantily = $_POST['quantily'];
//     $price =  $_POST['price'];
//     $insert_order = $index -> insert_order($product_id, $size, $quantily, $price);
    
//  var_dump($_POST);
// }




?>

    </header>
    <section class="product">
        <form  action="cart.php" method="post">
            <div class="container">
                <div class="product-top row">
                    <!-- <p>Trang chủ</p> <span>&#62;</span>
                    <p>NIKE</p><span>&#62;</span> -->

                    <input type="hidden" name= "product_id" value="<?php echo $resultA['product_id'] ?>" ><p <?php echo $resultA['product_id'] ?>>

                </div>
                
                <div style="padding: 0 20px ;" class="product-content row">
                    <div class="product-content-left row">
                        <div class="product-content-left-big-img">
                            <img src="../uploads/<?php echo $resultA['product_img'] ?>"  alt="" >
                            <input name="img" type="hidden" value="<?php echo $resultA['product_img'] ?>">
                        </div>
                        <br>
                        <?php foreach ($product_mota as $result) { ?>
                            <div class="product-content-left-small-img">
                                <img src="../uploads/<?php echo $result['product_img_mota'] ?>  "  alt=""  style=" max-height: 200px">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-content-right">
                        <div class="product-content-right-product-name">
                            <h1><?php echo $resultA['product_name'] ?></h1>
                            <input type="hidden" name= "product_name" value="<?php echo $resultA['product_name'] ?>">
                            <br>
                            <h1><?php echo $resultA['product_color'] ?></h1>
                            <input type="hidden" name= "product_color" value="<?php echo $resultA['product_color'] ?>">
                        </div>
                        <div class="product-content-right-product-prize">
                            <input type="hidden" name= "price" value="<?php echo $resultA['product_price'] ?>" ><p><?php echo $resultA['product_price'] ?><sup>đ</sup></p>
                        </div>
                        

                        <div class="product-content-right-product-size">
                            <p style="font-weight: bold;">Size :</p>
                            <div class="size">
                                
                                    <select name="size">
                                        <option>36</option>
                                        <option>37</option>
                                        <option>38</option>
                                        <option>39</option>
                                        <option>40</option>
                                        <option>41</option>
                                        <option>42</option>
                                        <option>43</option>
                                    </select>
                                

                            </div>
                        </div>
                        <br>
                        <div class="quantity">
                            <p  style="font-weight: bold;">Số lượng :</p>
                            <input name = "quantily" type="number" min="0" value="1">
                        </div>
                        <p style="color:red ;">Vui lòng chọn size, số lượng.</p>
                        <div class="product-content-right-product-button">
                            
                             <br>
                            <input type="submit" name="addcart" value="MUA HÀNG"  >
                            
                            <button>
                                <p>TÌM TẠI CỬA HÀNG</p>
                            </button>
                        </div>
                        <div class="product-content-right-product-icons">
                            <div class="product-content-right-product-icons-item">
                                <i class="ti-headphone-alt">
                                    <p>Hotline</p>
                                </i>
                            </div>
                            <div class="product-content-right-product-icons-item">
                                <i class="ti-comment-alt">
                                    <p>Chat</p>
                                </i>
                            </div>
                            <div class="product-content-right-product-icons-item">
                                <i class="ti-email">
                                    <p>Mail</p>
                                </i>
                            </div>
                        </div>
                        <div class="product-content-right-bottom">
                            <div class="product-content-right-bottom-top">
                                &#8744;
                            </div>
                            <div class="product-content-right-bottom-content-big">
                                <div class="product-content-right-bottom-content-title row">
                                    <div class="product-content-right-bottom-content-title-item ghdt">
                                        <p>Chính sách giao hàng và đổi trả</p>
                                    </div>
                                    <div class="product-content-right-bottom-content-title-item bq">
                                        <p>Hướng dẫn bảo quản</p>
                                    </div>
                                    <div class="product-content-right-bottom-content-title-item">
                                        <a href="img/size.png"><p>Tham khảo size</p></a>
                                    </div>
                                </div>
                                <div class="product-content-right-bottom-content">
                                    <div class="product-content-right-bottom-content-ghdt">
                                        <ul>
                                            <li><i class="ti-truck"></i>Giao hàng hoàn toàn miễn phí 100%</li>
                                            <li><i class="ti-shield"></i>An toàn với nhận hàng và trả tiền tại nhà</li>
                                            <li><i class="ti-exchange-vertical"></i>Bảo hành đổi trả trong vòng 60 ngày</li>
                                        </ul>
                                    </div>
                                    <div class="product-content-right-bottom-content-bq">
                                        <div> Khử mùi bên trong giày<br><br>
                                            Bạn hãy đặt túi đựng viên chống ẩm vào bên trong giày để hút ẩm và rắc phấn rôm
                                            (có
                                            thể thay bằng cách đặt vào bên trong giày gói trà túi lọc chưa qua sử dụng) để
                                            khử
                                            mùi, giúp giày luôn khô thoáng.

                                            Để hạn chế mùi hôi và sự ẩm ướt cho giày, hãy chọn vớ chân loại tốt, có khả năng
                                            thấm hút cao. Ngoài ra, dùng các loại lót giày khử mùi cũng là một phương pháp
                                            tốt.<br><br>
                                        </div>
                                        <div>
                                            Bảo quản giày khi không sử dụng<br><br>
                                            Khi sử dụng giày, bạn đừng vội vứt hộp đi mà hãy cất lại để dành. Khi không sử
                                            dụng,
                                            hãy nhét một ít giấy vụn vào bên trong giày để giữ cho dáng giày luôn chuẩn,
                                            đẹp.
                                            Sau đó đặt giày vào hộp bảo quản cùng túi hút ẩm
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </section>

    <section>
        <div style="padding: 0 20px ;" class="product-related container">
            <div class="product-related-title">
                <p>SẢN PHẨM MỚI NHẤT</p>
            </div>
            <div class="product-content row">
            <?php foreach ($show_product as $resultB) { ?>          
                <div class="product-related-item">
                    <a href="product.php?chitiet=<?php echo $resultB['product_id'] ?>"><img src="../uploads/<?php echo $resultB['product_img'] ?>" alt=""></a>
                    <h1><?php echo $resultB['product_name'] ?> <?php echo $resultB['product_color'] ?></h1>
                    <p><?php echo $resultB['product_price'] ?><sup>đ</sup></p>
                </div>
            <?php } ?>
            </div>
        </div>
        
    </section>
    <script>
        const bigimg = document.querySelector(".product-content-left-big-img img")
        const smallimg = document.querySelectorAll(".product-content-left-small-img img")
        smallimg.forEach(function (imgItem, X) {
            imgItem.addEventListener("click", function () {
                bigimg.src = imgItem.src
            })
        })

        const bq = document.querySelector(".bq")
        const ghdt = document.querySelector(".ghdt")
        if (bq) {
            bq.addEventListener("click", function () {
                document.querySelector(".product-content-right-bottom-content-ghdt").style.display = "none"
                document.querySelector(".product-content-right-bottom-content-bq").style.display = "block"
            })
        }
        if (ghdt) {
            ghdt.addEventListener("click", function () {
                document.querySelector(".product-content-right-bottom-content-ghdt").style.display = "block"
                document.querySelector(".product-content-right-bottom-content-bq").style.display = "none"
            })
        }
        const button = document.querySelector(".product-content-right-bottom-top")
        if (button) {
            button.addEventListener("click", function () {
                document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
            })
        }
    </script>