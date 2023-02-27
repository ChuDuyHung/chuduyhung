<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneaker Shoes Store</title>
    <link rel="stylesheet" href="main1.css">
    <link rel="stylesheet" href="./themify-icons-font/themify-icons/themify-icons.css">
</head>

<body>
    <header>
        <div class="logo">
           <a href="index.php"><img style="width: 100px;height:70px;" src="img/logo.png" ></a> 
        </div>


        <div class="menu">
           
            <li><a href="index.php"  >TRANG CHỦ</a></li>
            <li><a href=""  >VOUCHER</a></li>
            <li><a href=""  >FLASH SALE</a></li>
            <li><a href="cartegory.php"  >DANH MỤC SẢN PHẨM</a></li>
            <li><a href="cart.php"  >GIỎ HÀNG</a></li>


           
            
        </div>
        
        <div class="other">
            <li><input name = "timkiem" placeholder="Tìm sản phẩm" type="text"> <a href=""><i class="ti-search"></i></li></a>
            <!-- <li><a href=""><i class="ti-shopping-cart"></i></a></li> -->
            <li><button class="js-ti-marker-alt" style="width: 30px; height: 35px;"><i class="ti-user"></i></li></button>
        </div>
    </header>


    <script>
        $(document).ready(function(){
            $("#cartegory_id").change(function(){
                // alert($(this).val())
                var x = $(this).val()
                $.get("productadd_ajax.php",{cartegory_id:x},function(data){
                    $("#brand_id").html(data)

                 })
            })
         })

    </script>
