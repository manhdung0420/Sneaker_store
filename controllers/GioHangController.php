<?php

class GioHangController
{
    public $modelSanPham;
    // public $modelTaikhoan;
    public $modelGioHang;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        // $this->modelTaikhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
    }

    public function addGioHang()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_SESSION["user_client"])) {
                // Đã đăng nhập
                $mail = $this->modelGioHang->getTaiKhoanFromEMail($_SESSION['user_client']);
                $gioHang = $this->modelGioHang->getGiohangFromUser($mail['id']);

                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail["id"]);
                    $gioHang = ['id' => $gioHangId];
                } else {
                    $gioHang = $gioHang[0];
                }

                $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHang["id"]);

                // Lấy thông tin sản phẩm từ form
                $san_pham_id = $_POST["san_pham_id"];
                $so_luong = $_POST["so_luong"];
                $size_id = $_POST["size_id"];

                // Kiểm tra sản phẩm đã có trong giỏ chưa
                $checkSanPham = false;
                foreach ($chiTietGioHang as &$item) {
                    if ($item["san_pham_id"] == $san_pham_id && $item["size_id"] == $size_id) {
                        $item["so_luong"] += $so_luong;
                        $checkSanPham = true;
                        break;
                    }
                }

                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang["id"], $san_pham_id, $so_luong, $size_id);
                }
            } else {
                // Chưa đăng nhập, xử lý với session
                if (!isset($_SESSION["gio_hang"])) {
                    $_SESSION["gio_hang"] = [];
                }
                $gioHang = $_SESSION["gio_hang"];
                $san_pham_id = $_POST["san_pham_id"];
                $so_luong = $_POST["so_luong"];
                $size_id = $_POST["size_id"];

                $checkSanPham = false;
                foreach ($gioHang as &$item) {
                    if ($item["san_pham_id"] == $san_pham_id && $item["size_id"] == $size_id) {
                        $item["so_luong"] += $so_luong;
                        $checkSanPham = true;
                        break;
                    }
                }

                if (!$checkSanPham) {
                    $gioHang[] = [
                        "san_pham_id" => $san_pham_id,
                        "size_id" => $size_id,
                        "so_luong" => $so_luong
                    ];
                }

                $_SESSION["gio_hang"] = $gioHang;  // Cập nhật lại giỏ hàng vào session
            }
            header("Location: " . BASE_URL . '?act=gio-hang');
        }
    }


    public function gioHang()
    {
        if (isset($_SESSION['user_client']) && !empty($_SESSION['user_client'])) { // Kiểm tra trạng thái đăng nhập
            $mail = $this->modelGioHang->getTaiKhoanFromEMail($_SESSION['user_client']);

            if (!$mail) {
                // Nếu không tìm thấy tài khoản trong DB, xóa session và yêu cầu đăng nhập lại
                unset($_SESSION['user_client']);
                echo "Tài khoản không tồn tại. Vui lòng đăng nhập lại.";
                return;
            }

            // Lấy giỏ hàng từ tài khoản
            $gioHang = $this->modelGioHang->getGiohangFromUser($mail['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
            } else {
                $gioHang = $gioHang[0];
            }

            $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHang['id']);
            require_once './views/gioHang.php';
        } else {
            // Xử lý giỏ hàng khi chưa đăng nhập
            if (isset($_SESSION['gio_hang']) && !empty($_SESSION['gio_hang'])) {
                $gioHang = $_SESSION['gio_hang'];
                $chiTietGioHang = [];

                foreach ($gioHang as $item) {
                    $sanPham = $this->modelSanPham->getSanPhamById($item['san_pham_id']);
                    $size = $this->modelGioHang->getSizeById($item['size_id']);
                    $chiTietGioHang[] = [
                        'san_pham' => $sanPham,
                        'size' => $size,
                        'so_luong' => $item['so_luong']
                    ];
                }
                // var_dump($chiTietGioHang);die;

                require_once './views/gioHang.php';
            } else {
                echo "Giỏ hàng trống!";
            }
        }
    }
}