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
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHang["id"]);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHang["id"]);
                }

                // Lấy thông tin sản phẩm từ form
                $san_pham_id = $_POST["san_pham_id"];
                $so_luong = $_POST["so_luong"];
                $size_id = $_POST["size_id"];

                // Kiểm tra sản phẩm trong chi tiết giỏ hàng

                $checkSanPham = false;

                foreach ($chiTietGioHang as $item) {
                    if ($item["san_pham_id"] == $san_pham_id && $item["size_id"] == $size_id) {
                        $newSoLuong = $item["so_luong"] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang["id"], $san_pham_id, $newSoLuong, $size_id);
                        $checkSanPham = true;
                        break;
                    }
                }

                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang["id"], $san_pham_id, $so_luong, $size_id);
                }

                header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id=" . $san_pham_id);
                exit;
            } else {
                echo "<script>
                    alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
                    window.location.href = '" . BASE_URL . "?act=formlogin';
                  </script>";
                exit;
            }
        }
    }

    public function gioHang()
    {
        if (isset($_SESSION["user_email"])) {
            $user = $this->modelTaikhoan->getTaiKhoanFromEMail($_SESSION["user_email"]);


            $gioHang = $this->modelGioHang->getGioHangFromUser($user["id"]);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user["id"]);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHang["id"]);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHang["id"]);
            }
            // Đếm số lượng sản phẩm trong giỏ hàng
            $tongSanPham = $this->modelGioHang->countSanPhamTrongGioHang($gioHang["id"]);
            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            require_once './views/gioHang.php';
        } else {
            echo "<script>
                    alert('Bạn cần đăng nhập để xem giỏ hàng.');
                    window.location.href = '" . BASE_URL . "?act=formlogin';
                  </script>";
            exit;
        }
    }

    public function deleteSPGioHang()
    {
        $id = $_GET["id"];
        $ctGioHang = $this->modelGioHang->getDetailChiTietGioHang($id);

        if ($ctGioHang) {
            $this->modelGioHang->destroyGioHang($id);
        }

        header("location:" . BASE_URL . '?act=gio-hang');
        exit();
    }
}
