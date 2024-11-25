<?php
session_start();
include_once "models/ProductModel.php";

include_once "models/userModel.php";
class HomeController extends ProductModel
{
    public $product;
    public function __construct()
    {
        $this->product = new ProductModel();
    }
    public function index()
    {
        $products = $this->product->getAllProduct();
        require_once "./views/home.php";
    }
    public function search()
    {
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

    // Login Logout
    // Form login 
    public function formlogin()
    {
        require_once "./views/login.php";
    }

    // Xử lý login
    public function login()
    {
        // Khởi tạo model
        $userModel = new UserModel();

        // Biến để lưu lỗi
        $error = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];

            // Gọi phương thức login trong UserModel
            $user = $userModel->login($email, $mat_khau);

            if ($user) {
                // Đăng nhập thành công, lưu thông tin người dùng vào session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_chuc_vu'] = $user['chuc_vu_id'];

                header('Location: http://localhost/Sneaker_store/'); // Chuyển hướng sau khi đăng nhập
                exit();
            } else {
                $error = "Sai thông tin đăng nhập"; // Sai thông tin đăng nhập
                require_once "./views/login.php";
            }
        }
    }
    public function logout()
    {


        // Hủy toàn bộ session
        if (isset($_SESSION)) {
            session_unset(); // Xóa tất cả biến session
            session_destroy(); // Hủy session
        }

        // Chuyển hướng về trang login
        header('Location: http://localhost/Sneaker_store/?act=formlogin');
        exit();


    }

    // Phân quyền trang admin
    public function checkAdmin()
    {
        if (isset($_SESSION['user_chuc_vu']) && $_SESSION['user_chuc_vu'] == 1) {
            return header('Location: http://localhost/Sneaker_store/admin/');
        }
        return header('Location: http://localhost/Sneaker_store/');
    }

    // Đăng ký
    public function register()
    {
        $userModel = new UserModel();
        $error = "";
        $success = "";

        // Kiểm tra nếu form được gửi
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoTen = $_POST['ho_ten'];
            $username = $_POST['usename'];
            $email = $_POST['email'];
            $soDienThoai = $_POST['so_dien_thoai'];
            $matKhau = $_POST['mat_khau'];
            $confirmPassword = $_POST['confirm_password'];

            // Kiểm tra các lỗi nhập liệu
            if ($matKhau !== $confirmPassword) {
                $error = "Mật khẩu không khớp.";
                require_once "./views/login.php";
                exit();
            } elseif ($userModel->checkEmailExists($email)) {
                $error = "Email đã tồn tại. Vui lòng sử dụng email khác.";
                require_once "./views/login.php";
                exit();
            } else {
                // Đăng ký tài khoản
                $isRegistered = $userModel->registerUser($hoTen, $username, $email, $matKhau, $soDienThoai,);

                if ($isRegistered) {
                    $success= "Đăng ký thành công. Vui lòng đăng nhập.";
                    header('Location:http://localhost/Sneaker_store/?act=formlogin ');
                    exit();
                } else {
                    $error= "Không thể đăng ký. Vui lòng thử lại sau.";
                }
            }
        }

        // Hiển thị view đăng ký với thông báo lỗi hoặc thành công
        require_once "./views/login.php";
    }


}