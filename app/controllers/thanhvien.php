
<?php
class thanhvien extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->data = []; // Khởi tạo $this->data
        $this->model = $this->model('Database');
    }

    function list()
    {
        $condition = '';
        if (isGet()) {
            if (!empty($_GET['search-ma'])) {
                $searchMa = htmlspecialchars($_GET['search-ma']); 
                $condition = " WHERE matv = '$searchMa'"; 
            }
        }
    
        $this->data['table'] = $this->model->select([], 'thanhvien', $condition);
        $this->view('thanhvien', $this->data);
    }

    public function add()
    {
        
        if (isPost()) {
            $check = $this->model->isDuplicate('thanhvien', 'matv', $_POST['matv']);
            if ($check == 0) {
                $this->model->insert('thanhvien', $_POST);
                echo "<script>alert('Thêm nhân viên thành công!')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/thanhvien'</script>";
            } else {
                echo "<script>alert('Thêm nhân viên thất bại, trùng mã nhân viên!')</script>";
            }
        }
    }
  /*  
    public function edit_lop($manhanvien = '')
    {
        $this->data['table'] = $this->model->select([], 'hsnhansu', "where Manv = '$manhanvien'"); 
        $this->view('suaHSnhansu', $this->data); 

        if (isPost()) {
            // Lấy dữ liệu từ form
            $data = $_POST;

            // Cập nhật dữ liệu trong cơ sở dữ liệu
            $this->model->update('hsnhansu', $data, "where Manv = '$manhanvien'");

            // Hiển thị thông báo thành công và chuyển hướng
            echo "<script>alert('Sửa nhân viên thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/HSnhansu'</script>"; 
        }
    }
        */
    public function delete_lop($matv = '')
    {
        if ($this->model->delete('thanhvien', "where matv = '$matv'")) {
            echo "<script>alert('Xóa nhân viên thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/thanhvien'</script>";
        } else {
            echo "<script>alert('Xóa nhân viên thất bại')</script>";
        }
    }

}

?>