<?php 
include_once "models/ProductModel.php";
class HomeController extends ProductModel
{
    public $modelSanPham;
    public $product;
    public function __construct()
    {
        $this->product = new ProductModel(); 
        $this->modelSanPham = new SanPham();
    }
    public function index()
    {
        $products = $this->product->getAllProduct();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once "./views/home.php";
    }
    public function search() {
        // Lấy từ khóa từ yêu cầu GET hoặc POST
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        
        if (!empty($keyword)) {
            $searchproducts = $this->product->searchProducts($keyword);
            $products = $this->product->getAllProduct();
            require_once './views/home.php'; // Gửi dữ liệu tới View
        } else {
            echo "Vui lòng nhập từ khóa tìm kiếm.";
        }
    }
    
}

    

     

       


    
    

    

