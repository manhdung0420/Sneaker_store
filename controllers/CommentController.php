<?php
require_once 'models/Comment.php';

class CommentController
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment();
    }
    // Thêm bình luận mới
    public function addComment()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!isset($_SESSION['user_id'])) {
            echo "<script>
                    alert('Bạn cần đăng nhập để bình luận.');
                    window.location.href = '" . BASE_URL . "?act=formlogin';
                  </script>";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $san_pham_id = $_POST['san_pham_id'];
            $tai_khoan_id = $_SESSION['user_id']; // ID người dùng đã đăng nhập
            $noi_dung = $_POST['noi_dung'];
            $ngay_dang = date('Y/m/d');

            if (!empty($noi_dung)) {
                if ($this->commentModel->addComment($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang)) {
                    echo "Thêm bình luận thành công.";
                } else {
                    echo "Không thể thêm bình luận.";
                }
            } else {
                echo "Nội dung bình luận không được để trống.";
            }
        }

        // Chuyển hướng về trang chi tiết sản phẩm
        header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id=' . $san_pham_id);
        exit;
    }
}
