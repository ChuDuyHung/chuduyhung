
<?php
include "cartegory_header.php";
  

?>


                <div class="cartegory-right row">
                    <div class="cartegory-right-top-item">
                        <h1><p> Vui lòng chọn sản phẩm!  </p></h1>
                    </div>
                       
                    <!-- <div class="cartegory-right-bottom row">
                        <div class="cartegory-right-bottom-item">
                            <p>Hiển thị 2 <span>|</span>4 sản phẩm</p>
                        </div>
                        <div class="cartegory-right-bottom-item">
                            <p><span>&#171;</span>1 2 3 4<span>&#187;</span>Trang cuối</p>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        <?php include "footer.php" ?>
    </section>

    <script>
        const itemsliderbar = document.querySelectorAll(".cartegory-left-li")
        itemsliderbar.forEach(function(menu,index){
        menu.addEventListener("click",function(){
        menu.classList.toggle("block")
            })
        })
    </script>



