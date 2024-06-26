<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>เข้าสู่ระบบ</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container ">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row p-0">
                            <div class="col-lg-6 d-none d-lg-block p-0">
                                <img src="img/แมว.jpg" class="img-fluid">
                            </div>
                            <div class="col-lg-6 align-self-center p-0">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">สมัครสมาชิก !</h1>
                                    </div>
                                    <!-- เก็บข้อมูลสมัครสมาชิก -->
                                    <form class="user" action="register_db.php" method="post">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleFirstName" name="FirstName" placeholder="ชื่อ" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleLastName" name="LastName" placeholder="นามสกุล" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleNumber" name="exampleNumber"
                                                placeholder="เบอร์โทรศัพท์" name="exampleNumber" required pattern="[0-9]{10}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email" placeholder="อีเมล" required>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" name="exampleInputPassword"
                                                    placeholder="รหัสผ่าน" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" name="exampleRepeatPassword"
                                                    placeholder="ยืนยันรหัสผ่าน" required>
                                            </div>
                                            <!-- error รหัสผ่านไม่ถูก -->
                                            <span class="pl-3 small mt-1" id="password_error"
                                                style="color: red;"></span>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary btn-user btn-block">สมัครสมาชิก</button>
                                    </form>
                                    <div class="text-center mt-2">
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