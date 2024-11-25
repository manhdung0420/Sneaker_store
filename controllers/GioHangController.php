<?php

class GioHangController
{
    public $modelSanPham;
    public $modelTaikhoan;
    public $modelGioHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaikhoan = new UserModel();
        $this->modelGioHang = new GioHang();
    }

    public function addGioHang()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_SESSION["user_email"])) {
                // Lấy thông tin tài khoản người dùng
                $user = $this->modelTaikhoan->getTaiKhoanFromEMail($_SESSION["user_email"]);

                // Lấy giỏ hàng hoặc tạo mới
                $gioHang = $this->modelGioHang->getGioHangFromUser($user["id"]);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($user["id"]);
                } else {
                    $gioHangId = $gioHang[0]["id"];
                }

                // Lấy thông tin sản phẩm từ form
                $san_pham_id = $_POST["san_pham_id"];
                $so_luong = $_POST["so_luong"];
                $size_id = $_POST["size_id"];

                // Kiểm tra sản phẩm trong chi tiết giỏ hàng
                $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHangId);
                $productExists = false;

                foreach ($chiTietGioHang as $item) {
                    if ($item["san_pham_id"] == $san_pham_id && $item["size_id"] == $size_id) {
                        $newSoLuong = $item["so_luong"] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHangId, $san_pham_id, $newSoLuong, $size_id);
                        $productExists = true;
                        break;
                    }
                }

                if (!$productExists) {
                    $this->modelGioHang->addDetailGioHang($gioHangId, $san_pham_id, $so_luong, $size_id);
                }

                header("Location: " . BASE_URL . "?act=gio-hang");
                exit;
            } else {
                echo "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.";
            }
        }
    }

    public function gioHang()
    {
        if (isset($_SESSION["user_email"])) {
            $user = $this->modelTaikhoan->getTaiKhoanFromEMail($_SESSION["user_email"]);
            if (!$user) {
                echo "User not found!";
                return;
            }

            $gioHang = $this->modelGioHang->getGioHangFromUser($user["id"]);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user["id"]);
                $chiTietGioHang = [];
            } else {
                $gioHangId = $gioHang[0]["id"];
                $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHangId);
            }
            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            require_once './views/gioHang.php';
        } else {
            echo "Bạn cần đăng nhập để xem giỏ hàng.";
        }
    }
}
