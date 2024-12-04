<?php

include_once "models/ProductModel.php";

include_once "models/userModel.php";
class HomeController extends ProductModel
{
    public $modelSanPham;
    public $product;
    public $modelTaiKhoan;
    public $modelGioHang;
    public function __construct()
    {
        $this->product = new ProductModel();
        $this->modelSanPham = new SanPham();
        $this->modelGioHang = new GioHang();
    }
    public function index()
    {
        $userModel = new UserModel();
        if (isset($_SESSION["user_email"])) {
            $user = $userModel->getTaiKhoanFromEMail($_SESSION["user_email"]);
            $gioHang = $this->modelGioHang->getGioHangFromUser($user["id"]);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user["id"]);
                $gioHang = ['id' => $gioHangId];
            }

            // Đếm số lượng sản phẩm trong giỏ hàng
            $tongSanPham = $this->modelGioHang->countSanPhamTrongGioHang($gioHang["id"]);
        }
        $products = $this->product->getAllProduct();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once "./views/home.php";
    }

    public function search()
    {
        $userModel = new UserModel();
        if (isset($_SESSION["user_email"])) {
            $user = $userModel->getTaiKhoanFromEMail($_SESSION["user_email"]);
            $gioHang = $this->modelGioHang->getGioHangFromUser($user["id"]);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user["id"]);
                $gioHang = ['id' => $gioHangId];
            }

            // Đếm số lượng sản phẩm trong giỏ hàng
            $tongSanPham = $this->modelGioHang->countSanPhamTrongGioHang($gioHang["id"]);
        }
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

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
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
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
                    $success = "Đăng ký thành công. Vui lòng đăng nhập.";
                    header('Location:http://localhost/Sneaker_store/?act=formlogin ');
                    exit();
                } else {
                    $error = "Không thể đăng ký. Vui lòng thử lại sau.";
                }
            }
        }

        // Hiển thị view đăng ký với thông báo lỗi hoặc thành công
        require_once "./views/login.php";
    }

    public function getAllKhachHang()
    {
        $userModel = new UserModel();
        if (isset($_SESSION["user_email"])) {
            $user = $userModel->getTaiKhoanFromEMail($_SESSION["user_email"]);
            $gioHang = $this->modelGioHang->getGioHangFromUser($user["id"]);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user["id"]);
                $gioHang = ['id' => $gioHangId];
            }

            // Đếm số lượng sản phẩm trong giỏ hàng
            $tongSanPham = $this->modelGioHang->countSanPhamTrongGioHang($gioHang["id"]);
        }
        $email = $_SESSION["user_email"];
        $thongTin = $userModel->getTaiKhoanFromEMail($email);
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once "./views/thongTinKhachHang.php";
    }

    public function postEditMatKhauCaNhan()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $old_pass = $_POST["old_pass"];
            $new_pass = $_POST["new_pass"];
            $confirm_pass = $_POST["confirm_pass"];

            $userModel = new UserModel();
            $user = $userModel->getTaiKhoanFromEmail($_SESSION["user_email"]);

            // Kiểm tra mật khẩu cũ
            $checkPass = ($old_pass === $user["mat_khau"]);
            $errors = [];

            // Kiểm tra các điều kiện lỗi
            if (empty($old_pass)) {
                $errors['old_pass'] = 'Vui lòng nhập mật khẩu cũ.';
            } elseif (!$checkPass) {
                $errors['old_pass'] = 'Mật khẩu cũ không đúng.';
            }

            if (empty($new_pass)) {
                $errors['new_pass'] = 'Vui lòng nhập mật khẩu mới.';
            }

            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Vui lòng nhập lại mật khẩu mới.';
            } elseif ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không khớp.';
            }

            $_SESSION["error"] = $errors;

            if (empty($errors)) {
                // Cập nhật mật khẩu mới
                $status = $userModel->resetPassword($user["id"], $new_pass);
                if ($status) {
                    $_SESSION["success"] = "Đã đổi mật khẩu thành công.";
                    $_SESSION["flash"] = true;

                    // Chuyển hướng đến tab Account Details sau khi thành công
                    header("Location: " . BASE_URL . "?act=thong-tin");
                    exit();
                }
            } else {
                $_SESSION["flash"] = true;
                // Chuyển hướng về trang thông tin và ở lại phần Account Details
                header("Location: " . BASE_URL . "?act=thong-tin");
                exit();
            }
        }
    }

    public function About(){
        $userModel = new UserModel();
        if (isset($_SESSION["user_email"])) {
            $user = $userModel->getTaiKhoanFromEMail($_SESSION["user_email"]);
            $gioHang = $this->modelGioHang->getGioHangFromUser($user["id"]);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user["id"]);
                $gioHang = ['id' => $gioHangId];
            }

            // Đếm số lượng sản phẩm trong giỏ hàng
            $tongSanPham = $this->modelGioHang->countSanPhamTrongGioHang($gioHang["id"]);
        }
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once './views/GioiThieu.php';
    }
}
