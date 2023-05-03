<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>

<?php
$product = new product;
$show_product = $product -> show_product();
// var_dump($cartegory_name)---- Xem biến đã nhận được chưa 
?>

<div class="admin-content-right">
<div class="admin-content-right-cartegory_list">
                <h1>Danh sách sản phẩm</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <!-- <th>Danh Sách Danh Mục</th> -->
                        <th>Loại Sản Phẩm</th>
                        <th>Sản Phẩm</th>
                        <th>Chức Năng</th>
                    </tr>
                    <?php
                    if($show_product ) {$i=0;
                        while($result = $show_product->fetch_assoc()){$i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['product_id']?></td>
                        <td><?php echo $result['brand_name']?></td>
                        <td><?php echo $result['product_name'] ?> </td>
                        <td><a href="productedit.php?product_id=<?php echo $result['product_id']?>">Sửa</a><a href="productdelete.php?product_id=<?php echo $result['product_id']?>">|Xóa</a></td>
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