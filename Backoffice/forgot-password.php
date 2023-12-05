<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Kanit:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="img/adorable-white-black-kitty-with-monochrome-wall-her.jpg" class="img-fluid">
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">ลืมรหัสผ่าน</h1>
                                    </div>
                                    <form class="user mt-3" action="forget_db.php" method="GET">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="อีเมล" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" name="exampleInputPassword"
                                                    placeholder="รหัสผ่าน" required>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="password" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" name="exampleRepeatPassword"
                                                    placeholder="ยืนยันรหัสผ่าน" required>
                                            <span class="pl-3 small" id="password_error"style="color: red;"></span>
                                        </div>
                                        <button type="submit"
                                        class="btn btn-primary btn-user btn-block">เปลี่ยนรหัสผ่าน</button>
                                    </form>
                                    <div class="text-center mt-2">
                                        <a class="small" href="register.php">สมัครสมาชิก !</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">เป็นสมาชิกอยู่เเล้ว ? เข้าสู่ระบบ !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // ฟังก์ชันตรวจสอบรหัสผ่าน
        function validatePassword() {
            var exampleInputPassword = document.getElementById("exampleInputPassword").value;
            var exampleRepeatPassword = document.getElementById("exampleRepeatPassword").value;
            var password_error = document.getElementById("password_error");

            if (exampleInputPassword !== exampleRepeatPassword) {
                password_error.textContent = "รหัสผ่านไม่ตรงกัน";
            } else {
                password_error.textContent = "";
            }
        }
     
        var exampleRepeatPassword = document.getElementById("exampleRepeatPassword");
        exampleRepeatPassword.addEventListener("input", validatePassword);
    </script>

</body>

</html>