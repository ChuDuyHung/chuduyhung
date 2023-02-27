<?php
include "../database.php";

?>
<?php
class index
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function show_cartegory()
    {
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC ";
        $result = $this->db->select($query);
        return $result;

    }

    public function show_brand_ajax($cartegory_id)
    {
        $query = "SELECT * FROM tbl_brand WHERE cartegory_id = '$cartegory_id' ";
        $result = $this->db->select($query);
        return $result;

    }
    public function show_brand()
    {
        $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC ";
        // $query = "SELECT tbl_brand.*, tbl_cartegory.cartegory_name
        // FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.cartegory_id
        // ORDER BY tbl_brand.brand_id DESC";
        $result = $this->db->select($query);
        return $result;

    }

    public function show_brand_by_cartegory_id($id)
    {
        // $query = "SELECT * FROM tbl_cartegory, tbl_brand WHERE tbl_cartegory.cartegory_id = tbl_brand.cartegory_id";
        $query = "SELECT * FROM tbl_brand LEFT JOIN tbl_cartegory ON tbl_cartegory.cartegory_id = tbl_brand.cartegory_id WHERE tbl_cartegory.cartegory_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product_by_brand_id($id)
    {
        // $query = "SELECT * FROM tbl_cartegory, tbl_brand WHERE tbl_cartegory.cartegory_id = tbl_brand.cartegory_id";
        $query = "SELECT * FROM tbl_product_img_mota LEFT JOIN tbl_product ON tbl_product.product_id = tbl_product_img_mota.product_id WHERE tbl_product.product_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product(){
        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC ";
        $result = $this -> db -> select($query);
        return $result;

    }



    public function show_order_detail()
    {
        $query = "SELECT * FROM tbl_product,tbl_order_detail WHERE tbl_product.product_id = tbl_order_detail.product_id ORDER BY id DESC ";
        $result = $this->db->select($query);
        return $result;

    }

    public function delete_product($id){
        $query = "DELETE FROM tbl_order_detail 
        WHERE id = '$id' ";
        $result = $this -> db -> delete($query);
        header('Location: cart.php');
        return $result;

   }

// function insert_order($name, $phone, $address, $total, $pttt){
//     $query = "INSERT INTO tbl_order (name, phone, address, total, pttt) VALUES ('$name', '$phone', '$address', '$total', '$pttt' )";
//     $result = $this -> db -> insert($query);
//     // header('Location: );
//     return $result;
// }

// function insert_order_detail($quantily, $price, $tong, $size, $order_id){
//     $query = "INSERT INTO tbl_order_detail (quantily, price, tong, size, order_id) VALUES ('$quantily', '$price', '$tong', '$size', '$order_id')";
//     $result = $this -> db -> insert($query);
//     // header('Location: );
//     return $result;
// }










}


function ketnoi(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Bangiay";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    } catch(PDOException $e) {
    return $e->getMessage();
    }

}

function taodonhang($name, $phone, $address, $total, $pttt){
    $conn = ketnoi();
    $sql = "INSERT INTO tbl_order (name, phone, address, total, pttt) VALUES ('$name', '$phone', '$address', '$total', '$pttt')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $last_id = $conn -> lastInsertId();
    $conn = null;
    return $last_id;


}

function taogiohang($quantily, $price, $tong, $size, $order_id){
    $conn = ketnoi();
    $sql = "INSERT INTO tbl_order_detail (quantily, price, tong, size, order_id) VALUES ('$quantily', '$price', '$tong', '$size', '$order_id')";
    // use exec() because no results are returned
    $conn->exec($sql);

    $conn = null;



}





?>