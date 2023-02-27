<?php
    include "../header.php";
    include "../slider.php";
    include "../Class/product_class.php";

?>

<?php
$product = new product;
$show_product = $product -> show_product();

?>

<div class="admin-content-right">
 <div class="admin-content-right-cartegory_list">
                    <h1>Danh sách  sản phẩm</h1>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá SP</th>
                            <th>Giá Sale</th>
                            <th>Màu</th>
                            <th>Ảnh</th>
                            <th>Tùy Biến</th>
                        </tr>

                        <?php
                            if($show_product){
                                $i = 0;
                                while($result = $show_product->fetch_assoc()){
                                $i++;            
                             
                        ?>

                        <tr>
                            <td> <?php echo "$i" ?> </td>
                            <td><?php echo $result['product_id'] ?></td>
                            <td><?php echo $result['product_name'] ?></td>
                            <td><?php echo $result['product_price'] ?></td>
                            <td><?php echo $result['product_sale'] ?></td>
                            <td><?php echo $result['product_color'] ?></td>
                            <td><?php echo $result['product_img'] ?></td>
                            <td><a href=" productedit.php?product_id=<?php echo $result['product_id']  ?> ">Sửa</a> 
                                | <a href = "productdelete.php?product_id=<?php echo $result['product_id']  ?>">Xóa</a></td>
                        </tr>

                        
                        <?php
                        }
                    }
                        ?>
                    </table>
            </div>      
       </div>
    </section>
</body>
</html>