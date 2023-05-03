<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>

<?php
$brand = new brand;
$show_brand = $brand -> show_brand();
// var_dump($cartegory_name)---- Xem biến đã nhận được chưa 
?>


<div class="admin-content-right">
<div class="admin-content-right-cartegory_list">
                <h1>Danh Sách Loại Sản Phẩm</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Danh Sách Danh Mục</th>
                        <th>Loại Sản Phẩm</th>
                        <th>Chức Năng</th>
                    </tr>
                    <?php
                    if($show_brand ) {$i=0;
                        while($result = $show_brand->fetch_assoc()){$i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['brand_id']?></td>
                        <td><?php echo $result['cartegory_name']?></td>
                        <td><?php echo $result['brand_name']?></td>
                        <td><a href="brandedit.php?brand_id=<?php echo $result['brand_id']?>">Sửa</a><a href="branddelete.php?brand_id=<?php echo $result['brand_id']?>">|Xóa</a></td>
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