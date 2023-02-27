
<?php
include "cartegory_header.php";
// var_dump($_GET); 
if(isset($_GET['sp'])){
    $slug = $_GET['sp'];
    $category = mysqli_query($conn,"SELECT * FROM tbl_brand WHERE slug = '$slug'");
    $resultA = mysqli_fetch_assoc($category);
    $id_cate = $resultA['brand_id'];
    $product = mysqli_query($conn, "SELECT * FROM tbl_product WHERE brand_id = '$id_cate'");
    $result= mysqli_fetch_assoc($product);
}



?>

            

                <div class="cartegory-right row">
                
                        <p><?php  echo $resultA['brand_name'] ?></p>
                    </div>
                    <!-- <div class="cartegory-right-top-item">
                        <select name="" id="">
                            <option value="">Bộ lọc</option>
                            <option value="">Lọc theo màu</option>
                            <option value="">Lọc theo size</option>
                            <option value="">Lọc theo giới tính</option>
                        </select>

                    </div>
                    <div class="cartegory-right-top-item">
                        <select name="" id="">
                            <option value="">Sắp xếp</option>
                            <option value="">Giá cao đến thấp</option>
                            <option value="">Giá thấp đến cao</option>
                        </select>
                    </div> -->

                
                   
                        <div style = " " class="cartegory-right-content row">
                            <?php foreach($product as $result){ ?>
                                <div class="cartegory-right-content-item">
                                    
                                        <a href="product.php?chitiet=<?php echo $result['product_id'] ?>"><img src="../uploads/<?php echo $result['product_img']  ?>" alt="" style=" max-height: 200px"></a>
                                        <h1><?php echo $result['product_name']  ?></h1>
                                        <h1><?php echo $result['product_color']  ?></h1>
                                        <p><?php echo $result['product_price']  ?><sup>đ</sup></p>
                                    
                                </div>
                            <?php } ?>
                            

                    
                    
                        </div>
                    
                    <div class="cartegory-right-bottom row">
                        <div class="cartegory-right-bottom-item">
                            <!-- <p>Hiển thị 2 <span>|</span>4 sản phẩm</p> -->
                        </div>
                        <div class="cartegory-right-bottom-item">
                            <!-- <p><span>&#171;</span>1 2 3 4<span>&#187;</span>Trang cuối</p> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?= include "footer.php"; ?>
    </section>
    <script>
        const itemsliderbar = document.querySelectorAll(".cartegory-left-li")
        itemsliderbar.forEach(function(menu,index){
        menu.addEventListener("click",function(){
        menu.classList.toggle("block")
            })
        })
    </script>
    <!-- <script>
        $(document).ready(function(){
            $("#cartegory_id").change(function(){
                // alert($(this).val())
                var x = $(this).val()
                $.get("productadd_ajax.php",{cartegory_id:x},function(data){
                    $("#brand_id").html(data)

                })
            })
        })

    </script> -->


