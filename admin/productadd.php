<?php
include "header.php";
include "slider.php";
include "class/product_class.php"
?>

<?php
$product = new product;
if($_SERVER['REQUEST_METHOD']==='POST') {
    $insert_product = $product -> insert_product($_POST,$_FILES);
    // echo '<pre>';
    // echo  print_r($_FILES ['product_img_desc']['name']); /* in ra cac file anh da chon*/
    // echo '</pre>';
}
// // echo  print_r($_POST); /* in ra cac thong tin da ghi*?
// var_dump($_POST,$_FILES); /* xem cac bien da nhan duoc chua */ 
?>


<div class="admin-content-right">
<div class="admin-content-right-product_add">
                <h1>Thêm Sản Phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập Tên Sản Phẩm <span style="color: red;">*</span></label>
                    <input name="product_name" required type="text">
                    <label for="">Chọn Danh Mục <span style="color: red;">*</span></label>
                    <select name="cartegory_id" id="cartegory_id">
                        <option value="#">---Chọn---</option>
                        <?php 
                        $show_cartegory = $product -> show_cartegory();
                        if($show_cartegory) {while($result = $show_cartegory -> fetch_assoc()){
                        
                        ?>
                        <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name']?></option>
                        <?php 
                            }}
                        ?>
                    </select>
                    <label for="">Chọn Loại Sản Phẩm<span style="color: red;">*</span></label>
                    <select name="brand_id" id="brand_id">
                        <option value="#">---Chọn---</option>
                        
                    </select>
                    <label for="">Giá Sản Phẩm <span style="color: red;">*</span></label>
                    <input name="product_price" required type="text">
                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label>
                    <textarea required name="product_desc" id="editor1" cols="30" rows="10"></textarea>
                    <!-- desc là mô tả  -->
                    <label for="">Ảnh Sản Phẩm <span style="color: red;">*</span></label>
                    <span style="color:red"> <?php if(isset($insert_product)){
                        echo ($insert_product);
                    } ?> </span>
                    <input name="product_img" required type="file">
                    
                    <label for="">Ảnh Mô Tả Sản Phẩm <span style="color: red;">*</span></label>
                    <input name="product_img_desc[]" required multiple type="file">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>


</body>





<script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.

                CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    
} );


</script>

<script>
    $(document).ready(function(){
        $("#cartegory_id").change(function(){
            // alert(($this).val())
            var x = $(this).val()
            $.get("productadd_ajax.php",{cartegory_id:x},function(data){
                $("#brand_id").html(data);

            })
        })

    })


</script>



</html>