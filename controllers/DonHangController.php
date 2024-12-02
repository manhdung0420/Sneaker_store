<?php
class DonHangController
{
    public $modelSanPham;
    public $modelTaikhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaikhoan = new UserModel();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }

    public function thanhToan(){
        if(isset($_SESSION['user_email'])){
            // Lấy thông tin tài khoản người dùng
            $user = $this->modelTaikhoan->getTaiKhoanFromEMail($_SESSION["user_email"]);

            // Lấy giỏ hàng hoặc tạo mới
            $gioHang = $this->modelGioHang->getGioHangFromUser($user["id"]);

            if(!$gioHang){
                $gioHangId = $this->modelGioHang->addGioHang($user["id"]);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHang["id"]);
            }else{
                $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHang["id"]);
            }
            // var_dump($chiTietGioHang);die;
            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            require_once './views/thanhToan.php';
            
            
        }else{
            var_dump('Chưa đăng nhập');die;
        }
        
    }

    public function postThanhToan(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_nguoi_nhan = $_POST["ten_nguoi_nhan"];
            $email_nguoi_nhan = $_POST["email_nguoi_nhan"];
            $sdt_nguoi_nhan = $_POST["sdt_nguoi_nhan"];
            $dia_chi_nguoi_nhan = $_POST["dia_chi_nguoi_nhan"];
            $ghi_chu = $_POST["ghi_chu"];
            $tong_tien = $_POST["tong_tien"];
            $phuong_thuc_thanh_toan_id = $_POST["phuong_thuc_thanh_toan_id"];

            $ngay_dat =  date('Y-m-d');
            $trang_thai_id = 1;

            $user = $this->modelTaikhoan->getTaiKhoanFromEMail($_SESSION['user_email']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH-' . rand(1000,9999);

            // Thêm thông tin vào db

            $donHang = $this->modelDonHang->addDonHang($tai_khoan_id, 
                                            $ten_nguoi_nhan,
                                            $email_nguoi_nhan,
                                            $sdt_nguoi_nhan,
                                            $dia_chi_nguoi_nhan,
                                            $ghi_chu, 
                                            $tong_tien, 
                                            $phuong_thuc_thanh_toan_id, 
                                            $ngay_dat, 
                                            $ma_don_hang,
                                            $trang_thai_id
            );
            // Lấy thông tin giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGiohangFromUser($tai_khoan_id);
            
            // Lưu sản phẩm vào chi tiết đơn hàng
            if($donHang){
                $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHang['id']);
                // Thêm từng sản phẩm từ giỏ hàng vào bảng chi tiết đơn hàng
                foreach($chiTietGioHang as $item){
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];

                    $this->modelDonHang->addChiTietDonHang(
                        $donHang, //ID Đơn hàng vừa tạo
                        $item['san_pham_id'], // ID sản phẩm
                        $donGia, // Đơn giá láy được từ sản phẩm
                        $item['so_luong'], // Số lượng 
                        $donGia * $item['so_luong'],// Thành tiền
                        $item['size']
                    );
                }

                // Sau khi thêm xong thì phải tiếng hành xóa sản phẩm trong giỏ hàng
                // Xóa toàn bộ sản phẩm trong chi tiết giỏ hàng
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);
                
                // Xóa thông tin giỏ hàng người dùng
                $this->modelGioHang->clearGioHang($tai_khoan_id);
                
                // chuyển hướng về trang lịch sử mua hàng
                header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
                exit;
            }else {
                var_dump("Lỗi đặt hàng. Vui lòng thử lại sau");die;
            }
        }
    }

    public function lichSuMuaHang(){
        if(isset($_SESSION['user_email'])){
            // Lấy thông tin tài khoảng đăng nhập
            $user = $this->modelTaikhoan->getTaiKhoanFromEMail($_SESSION['user_email']);
            $tai_khoan_id = $user['id'];

            // var_dump($tai_khoan_id);die;
            // Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            // Lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $PhuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
            // Lấy ra danh sách tất cả đơn hàng của tài khoản
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            
            // echo "<pre>";
            // print_r($donHangs);die;
            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            require_once "./views/lichSuMuaHang.php";

        }else {
            var_dump('Bạn chưa đăng nhập');die;
        }
    }


    public function chiTietMuaHang(){
        if(isset($_SESSION['user_email'])){
            // Lấy thông tin tài khoảng đăng nhập
            $user = $this->modelTaikhoan->getTaiKhoanFromEMail($_SESSION['user_email']);
            $tai_khoan_id = $user['id'];
            // Lấy id đơn truyền từ URL
            $donHangId = $_GET['id'];

            // Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            // Lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $PhuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
            
            // Lấy ra thông tin đơn hàng theo ID
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            // Lấy thông tin sản phẩm của đơn hàng trong bảng chi tiết đơn hàng
            $chiTietDonHang =  $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);
            // echo "<pre>";
            // print_r($donHang);
            // print_r($chiTietDonHang);

            if($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền hủy đơn hàng này";
                exit;
            }
            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            require_once "./views/chiTietMuaHang.php";

        }else {
            var_dump('Bạn chưa đăng nhập');die;
        }
    }


    public function huyDonHang(){
        if(isset($_SESSION['user_email'])){
            // Lấy thông tin tài khoảng đăng nhập
            $user = $this->modelTaikhoan->getTaiKhoanFromEMail($_SESSION['user_email']);
            $tai_khoan_id = $user['id'];

            // Lấy id đơn truyền từ URL
            $donHangId = $_GET['id'];
            

            // Kiểm tra đơn hàng
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            if($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền hủy đơn hàng này";
                exit;
            }

            if($donHang['trang_thai_id'] != 1) {
                echo "Chỉ có đơn hàng ở trạng thái 'Chưa xác nhận' mới có thể hủy";
                exit;
            }

            // Hủy đơn hàng
            $this->modelDonHang->updateTrangThaiDonHang($donHangId, 5);

            header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
                exit;


        }else {
            var_dump('Bạn chưa đăng nhập');die;
        }
    }
}