<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- Reset -->
  <link rel="stylesheet" href="public/css/reset.css" />       
  
   <!-- Boostrap -->
   <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        /> 
    
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    ></script>
  <title>Trang chủ</title>
  <style>
    
    html, body { 
        width: 100vw;
        height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Sử dụng font chữ đẹp hơn */
    }

    .container {
      width: 100vw;
      height: 100vh;
      padding: 0;
      background-color: #f5f5f5; /* Màu nền xám nhạt */
    }

    .header {
      width: 100%;
      height: 15%;
      background-color: #3498db; /* Màu xanh dương nhạt */
      color: #fff;
      text-align: left;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng */
    }

    .header h1 {
      /* margin: ; */
      margin-left: 20px;
      padding-top: 20px;
    }

    .body-con{
      display: flex;
      width: 100%;
      height:85%;
      
    }

    .sidebar {
      width: 15%;
      height:100%;
      background-color: #2980b9; 
      color: #fff;
    }

    .sidebar a {
      display: block;
      color: #fff;
      text-decoration: none;
      margin-bottom: 10px;
      padding: 15px;
      border-radius: 5px; /* Bo tròn góc */
      transition: background-color 0.3s ease; /* Hiệu ứng hover */
    }

    .sidebar a:hover {
      background-color: #34495e; /* Màu xanh đậm khi hover */
    }

    .sidebar ul {
      display: none;
      list-style: none;
      padding: 0;
      margin-top: 10px;
    }

    .sidebar ul li {
      margin-left: 10px;
      margin-bottom: 5px;
    }

    .sidebar a.active + ul {
      display: block;
    }

    .content {
      width: 85%;
      height: 100%;
      padding: 20px;
      background-color: #fff;
      color: #333;
    }

    .menu-icon {
      width: 20px;
      height: 20px;
      vertical-align: middle;
      margin-right: 10px;
    }
  </style>
</head>
<body>
    <div sty class="header">
      <h1>Hồ sơ thành viên</h1> 
    </div>

    <div class="body-con containercontainer">
      <div class="info">
        
      </div>
        <div class="table-data">
          <div class="function">
            <div class="search">             
            </div>

            <form action="<?=_WEB_HOST?>/thanhvien/add" method="post">
              <div class="form-group mt-3">
                    <label for="matv">Nhập Mã thành viên</label>
                    <input
                        type="text"
                        name="matv"
                        id="matv"
                        class="form-control"
                        placeholder="Nhập mã thành viên"
                      oninput="checkInput()"
                    />
                </div>

              <div class="form-group mt-3">
                  <label for="tentv">Nhập Tên thành viên</label>
                    <input
                      type="text"
                      name="tentv"
                      id="tentv"
                      class="form-control"
                      placeholder="Nhập tên thành viên"
                      oninput="checkInput()"
                    />
              </div>

              <div class="mt-5 d-flex align-items-center" style="margin-left: 0px">
                    <button
                        type="submit"
                        id="btnThem"
                        class="btn btn-success mx-auto"
                        style="
                          width: 100px     
                        "
                    >
                    Thêm
                    </button>
                </div>
            </form>
          </div>

          <div class="table_container" style="margin-top:20px">
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr style="height: 40px; font-weight: bold;text-align: center">
                  <th>Mã Thành Viên</th>
                  <th>Tên Thành Viên</th>
                </tr>
              </thead>  
              <tbody>
                <?php
                  foreach ($table as $row) :
                ?>
                  <tr>
                    <td><?php echo $row['matv'] ?></td>
                    <td><?php echo $row['tentv'] ?></td>
                    <td style="margin: 0 auto; text-align: center">
                      <a href="<?= _WEB_HOST ?>/thanhvien/delete_lop/<?= $row['matv'] ?>" class="btn btn-danger" onclick="return comfim('Xác nhận xóa!')">Xóa</a>
                    </td>          
                  </tr>
                <?php
                  endforeach;
                ?>
              </tbody> 
            </table> 
          </div>       
    </div>
  </div>
  </div>

  
</body>
</html>
<script>
    // JavaScript để xử lý menu (giống như trước)
    const menuToggle = document.querySelector('.menu-toggle');
    const menuList = menuToggle.nextElementSibling;

    menuToggle.addEventListener('click', function() {
      this.classList.toggle('active');
    });
  </script>