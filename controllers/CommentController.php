<?php
require_once 'models/Comment.php';

class CommentController {
    private $commentModel;

    public function __construct() {
        $this->commentModel = new Comment();
    }
    // Thêm bình luận mới
    public function addComment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $san_pham_id = $_POST['san_pham_id'];
            $tai_khoan_id = $_SESSION['user_id'];  // ID người dùng đã đăng nhập
            $noi_dung = $_POST['noi_dung'];
            $ngay_dang = date('Y/m/d');

            if (!empty($noi_dung)) {
                if ($this->commentModel->addComment($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang)) {
                } else {
                    echo "Không thể thêm bình luận.";
                }
            } else {
                echo "Nội dung bình luận không được để trống.";
            }
        }
        header("Location: index.php?act=chi-tiet-san-pham&id=$san_pham_id");
        exit;
    }
}
?>
