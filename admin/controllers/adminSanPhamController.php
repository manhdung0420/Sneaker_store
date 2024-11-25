<?php
class adminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelBienThe;

    public function __construct()
    {
        $this->modelSanPham = new adminSanPham();
        $this->modelDanhMuc = new adminDanhMuc();
        $this->modelBienThe = new adminBienThe();

    }
    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
        
    }

    public function formAddSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';
    }
    
    public function postAddSanPham()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ten_san_pham = $_POST["ten_san_pham"];
            $gia_san_pham = $_POST["gia_san_pham"];
            $gia_khuyen_mai = $_POST["gia_khuyen_mai"];
            $so_luong = $_POST["so_luong"];
            $ngay_nhap = $_POST["ngay_nhap"];
            $danh_muc_id = $_POST["danh_muc_id"] ;
            $trang_thai = $_POST["trang_thai"];
            $mo_ta = $_POST["mo_ta"];

            $hinh_anh = $_FILES['hinh_anh'] ?? '';

            // Lưu hình ảnh
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            $errors = [];
            if(empty($ten_san_pham)){
                $errors["ten_san_pham"] = "Tên Sản phẩm là bắt buộc";
            }
            if(empty($gia_san_pham)){
                $errors["gia_san_pham"] = "Giá sản phẩm là bắt buộc";
            }
            if(empty($gia_khuyen_mai)){
                $errors["gia_khuyen_mai"] = "Giá Khuyến mãi Sản phẩm là bắt buộc";
            }
            if(empty($so_luong)){
                $errors["so_luong"] = "Vui lòng nhập số lượng";
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập không được trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh muc không được trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được trống';
            }
            if (!isset($hinh_anh) || $hinh_anh['error'] !== UPLOAD_ERR_OK) {
                $errors['hinh_anh'] = 'Phải chọn ảnh sản phẩm';
            }
            if(empty($errors)){
                $san_pham_id = $this->modelSanPham->insertSanPham(
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $file_thumb
                );

                // Xử lý thêm album ảnh sản phẩm
                $img_array = $_FILES["img_array"];
                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]
                        ];

                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }
                // var_dump($_SERVER);die;
                unset($_SESSION['errors']);
                header("location:" . BASE_URL_ADMIN . '?act=san-pham');
            }else{
                $_SESSION["errors"] = $errors;
                header("location:" . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }  
    }

    public function formEditSanPham(){
        $id = $_GET["id_san_pham"];
        $sanPham = $this -> modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        // var_dump($listAnhSanPham);die;
        if($sanPham){
            require_once './views/sanpham/editSanPham.php';
        }else{
            header("location:" . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

    public function postEditSanPham(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $san_pham_id = $_POST['san_pham_id'];

            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld["hinh_anh"];

            $ten_san_pham = $_POST["ten_san_pham"];
            $gia_san_pham = $_POST["gia_san_pham"];
            $gia_khuyen_mai = $_POST["gia_khuyen_mai"];
            $so_luong = $_POST["so_luong"];
            $ngay_nhap = $_POST["ngay_nhap"];
            $danh_muc_id = $_POST["danh_muc_id"] ?? '';
            $trang_thai = $_POST["trang_thai"];
            $mo_ta = $_POST["mo_ta"];

            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            // var_dump($_POST);die;
            

            $errors = [];
            if(empty($ten_san_pham)){
                $errors["ten_san_pham"] = "Tên Sản phẩm là bắt buộc";
            }
            if(empty($gia_san_pham)){
                $errors["gia_san_pham"] = "Giá sản phẩm là bắt buộc";
            }
            if(empty($gia_khuyen_mai)){
                $errors["gia_khuyen_mai"] = "Giá Khuyến mãi Sản phẩm là bắt buộc";
            }
            if(empty($so_luong)){
                $errors["so_luong"] = "Vui lòng nhập số lượng";
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập không được trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh muc không được trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được trống';
            }

            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($hinh_anh, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }
   
            if(empty($errors)){
                $resault = $this->modelSanPham->updateSanPham(
                    $san_pham_id,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $new_file
                );

                
                unset($_SESSION['errors']);
                header("location:" . BASE_URL_ADMIN . '?act=san-pham');
            }else{
                $_SESSION["errors"] = $errors;
                header("location:" . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }  
    }

    public function deleteSanPham(){
        $id = $_GET["id_san_pham"];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        if($sanPham){
            deleteFile($sanPham["hinh_anh"]);
            $this->modelSanPham->destroySanPham($id);
        }

        header("location:" . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }

    public function postEditAnhSanPham()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $san_pham_id = $_POST["san_pham_id"] ?? '';

            //lấy danh sách ảnh hiện tại cuar sản phẩm
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

            //Xử lý các ảnh được gửi từ form
            $img_array = $_FILES["img_array"];
            $img_delete = isset($_POST["img_delete"]) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST["current_img_ids"] ?? [];

            // khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cũ
            $upload_file = [];

            // Upload ảnh mới hoặc thay thế ảnh cũ
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }

            // làm ảnh mới vào db và xóa ảnh cũ nếu có
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

                    // cập nhật ảnh cũ
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

                    //Xóa ảnh cũ
                    deleteFile($old_file);
                } else {
                    //Thêm ảnh mới
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }

            // Xử lý xóa ảnh
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    // xóa ảnh
                    $this->modelSanPham->destroyAnhSanPham($anh_id);

                    // xóa file
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }

    public function detailSanPham(){
        $id = $_GET["id_san_pham"];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);       
        $listSizeSP = $this->modelSanPham->getAllSizeSP($id);

        if($sanPham){
            require_once './views/sanpham/detailSanPham.php';
        }else{
            header("location" . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

}
