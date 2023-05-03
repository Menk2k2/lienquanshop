<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php";
?>

<?php
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD']==='POST') {
    $cartegory_name= $_POST['cartegory_name'];
    $insert_cartegory = $cartegory -> insert_cartegory($cartegory_name);
}
// var_dump($cartegory_name)---- Xem biến đã nhận được chưa 
?>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Thêm Danh Mục</h1>
                <form action="" method="POST">
                    <input name="cartegory_name" type="text" placeholder="Nhập Tên Danh Mục">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>


</body>
</html>