<?php
    include "../header.php";
    include "../slider.php";
    include "../Class/product_class.php";


?>

<?php

$product = new product;
if($_SERVER['REQUEST_METHOD']=== 'POST'){

// var_dump($_POST,$_FILES);

    $insert_product = $product ->insert_product($_POST,$_FILES);
}

?>




<div class="admin-content-right">
<div class="admin-content-right-product_add">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style = "color: red;" >*</span></label>
                    <input name="product_name" required type="text" >

                    <label for="">Chọn danh mục <span style = "color: red;" >*</span></label>
                    <select name="cartegory_id" id="cartegory_id">
                    <option value="#">--Chọn--</option>
                        <?php 
                            $show_cartegory = $product -> show_cartegory();
                            if($show_cartegory){
                                while($result = $show_cartegory -> fetch_assoc()){

                        ?>

                        <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                        <?php
                             }
                            }
                        ?>

                    </select>

                    <label for="">Chọn loại sản phẩm <span style = "color: red;" >*</span></label>
                    <select name="brand_id" id="brand_id">
                       <option value="#">--Chọn--</option>
                      
                    </select>

                    <label for="">Nhập Giá sản phẩm <span style = "color: red;" >*</span></label>
                    <input name= "product_price" required type="text" >

                    <label for="">Nhập giá khuyến mãi <span style = "color: red;" >*</span></label>
                    <input name= "product_sale" required type="text" >
                    
                    <label for="">Nhập Màu sản phẩm <span style = "color: red;" >*</span></label>
                    <input name= "product_color" required type="text" >

                    <textarea name="product_mota" id="" cols="30" rows="10" placeholder="Mô tả sản phẩm"></textarea>
                    <br>

                    <label for="">Chọn ảnh sản phẩm <span style = "color: red;" >*</span></label>
                    <input name= "product_img" multiple type="file">

                    <label for="">Chọn ảnh mô tả <span style = "color: red;" >*</span></label>
                    <input name= "product_img_mota[]" multiple type="file">


                    <button type="submit">Thêm</button>
                </form>

            </div>
            
        </div>
    </section>
</body>
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
</html>