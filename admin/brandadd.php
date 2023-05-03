<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>

<?php
$brand = new brand;
if($_SERVER['REQUEST_METHOD']==='POST') {
    $cartegory_id= $_POST['cartegory_id'];
    $brand_name = $_POST['brand_name'];
    $insert_brand = $brand -> insert_brand($cartegory_id,$brand_name);
}
// var_dump($cartegory_name)---- Xem biến đã nhận được chưa 
?>
<style>
    select {
        height: 30px;
        width: 200px;
        cursor: pointer;
    }
</style>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Thêm Loại Sản Phẩm</h1><br>
                <form action="" method="POST">
                   <select name="cartegory_id" id="">
                    <option value="#">---Chọn Danh Mục</option>
                   <?php 
                   $show_cartegory = $brand -> show_cartegory();
                   if ($show_cartegory) {while($rusult = $show_cartegory -> fetch_assoc() ){

                       ?>
                    <option value="<?php echo $rusult['cartegory_id']  ?>"><?php echo $rusult['cartegory_name']  ?></option>
                    <?php 
                    
                        }}
                    ?>
                   </select> <br>
                   <input name="brand_name" type="text" placeholder="Nhập Tên Loại Sản Phẩm">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>


</body>
</html>