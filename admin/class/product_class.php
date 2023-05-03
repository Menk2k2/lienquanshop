<?php
include "database.php";
?>

<?php

class product {
    private $db;

    public function __construct()
    {
        $this -> db = new Database();
    }

    public function show_cartegory(){
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC ";
        $result = $this ->db-> select($query);
        return $result;
    }

    public function show_product(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC ";
        $query = "SELECT tbl_product.*, tbl_brand.brand_name
        FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
        ORDER BY tbl_product.product_id DESC";
        $result = $this ->db-> select($query);
        return $result;

    }
    // public function show_product1(){
    //     // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC ";
    //     $query = "SELECT tbl_product.*, tbl_cartegory.cartegory_name
    //     FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id
    //     ORDER BY tbl_product.product_id DESC";
    //     $result = $this ->db-> select($query);
    //     return $result;


    public function show_brand_ajax($cartegory_id) {
        $query = "SELECT * FROM tbl_brand WHERE cartegory_id = '$cartegory_id' ";
        $result = $this ->db-> select($query);
        return $result;
    }

    public function insert_product() {
        $product_name = $_POST['product_name'];
        $cartegory_id = $_POST['cartegory_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_img = $_FILES['product_img']['name'];
        $filetarget = basename($_FILES['product_img']['name']);
        $filestyle = strtolower(pathinfo($product_img,PATHINFO_EXTENSION));
        $filesize = $_FILES['product_img']['size'];

        if (file_exists("uploads/$filetarget")) {
            $alert = "File đã tồn tại";
            return $alert;
        }/* alert = cảnh báo ảnh/file đã tồn tại */
        else {
            if ($filesize > 1000000){
                $alert = "File không được lớn hơn 1MB ";
                return $alert;
            }
            else {

                if($filestyle != "jpg" && $filestyle != "png" && $filestyle != "jepg" && $filestyle != "gif") {
                    $alert = "Chỉ nhận file jpg, png, jepg, gif";
                return $alert;
                }
                else {
                    move_uploaded_file( $_FILES['product_img']['tmp_name'], "uploads/".$_FILES['product_img']['name'] );
    
                    $query = "INSERT INTO tbl_product (
                        product_name,
                        cartegory_id, 
                        brand_id, 
                        product_price, 
                        product_desc, 
                        product_img)
                        VALUES (
                        '$product_name',
                        '$cartegory_id',
                        '$brand_id',
                        '$product_price',
                        '$product_desc',
                        '$product_img')";
            
                    $result = $this ->db-> insert($query);
                    if($result){
                        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                        $result = $this -> db -> select($query)->fetch_assoc();
                        $product_id = $result['product_id'];        /*lấy product_id mới nhất*/
                        $filename = $_FILES['product_img_desc']['name'];
                        $filttmp = $_FILES['product_img_desc']['tmp_name'];
            
                        foreach ($filename as $key => $value )
                        {
                            move_uploaded_file( $filttmp[$key], "uploads/".$value );
                            $query = "INSERT INTO tbl_product_img_desc ( product_id,product_img_desc) VALUES ('$product_id','$value') ";
                            $result = $this ->db-> insert($query);
            
                        }
                    }
            }

            }
    
        }

        header('Location:productlist.php');
        return $result;

    }
   
  


    // public function update_brand($cartegory_id,$brand_name,$brand_id,) {
    //     $query = "UPDATE tbl_brand SET brand_name = '$brand_name',cartegory_id = '$cartegory_id'  WHERE brand_id='$brand_id'";
    //     $result = $this ->db->update($query);
    //     header('Location:brandlist.php');
    //     return $result;
    // }
    // public function delete_brand($brand_id) {
    //     $query = "DELETE FROM tbl_brand WHERE brand_id='$brand_id'";
    //     $result = $this ->db->delete($query);
    //     header('Location:brandlist.php');
    //     return $result;
    // }
}

?>



