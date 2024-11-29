<?php
class adminLienHeController
{
    public $modelLienHe;
    public function __construct()
    {
        $this->modelLienHe = new AdminLienHe();
    }
    public function danhsachLienHe(){
        $listLienHe = $this->modelLienHe->getAllLienHe();
        require_once './views/lienhe/listLienHe.php';

    }
    public function deleteLienHe()
    {
        $id = $_GET["id_lien_he"];
        $lienhe = $this->modelLienHe->getDetailLienHe($id);

        if ($lienhe) {
            $this->modelLienHe->destroyLienHe($id);
        }

        header("location:" . BASE_URL_ADMIN . '?act=lien-he');
        exit();
    }
}
?>