<?php session_start(); 
if ($_SESSION["Userlevel"] !== "Z") {  //check session

    Header("Location: formlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-2">
                            </div>

                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="img/LOGO_PEA3.jpg" class="rounded " alt="">
                                        <h1 class="h4 text-gray-900 mb-4"><br>ADDMIN</h1>
                                    </div>
                                    <form method="post" action="adduser.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="Username" required name="Username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="Password" required name="Password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                        <select class="custom-select" id="section" name="section">
                                            <option selected value="A">บัญชี</option>
                                            <option value="M">มิเตอร์</option>
                                            <option value="K">ก่อสร้าง</option>
                                            <option value="B">บริการลูกค้า</option> 
                                            <option value="P">ปฏิบัติการและบํารุงรักษา</option> 
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        
                                        <select class="custom-select" id="inputGroupSelect01" name="Department">
                                            <option selected value="1">กฟจ.อุตรดิตถ์</option>
                                            <option value="2">กฟส.พิชัย</option>
                                            <option value="3">กฟส.น้ำปาด</option>
                                        </select>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">ADD</button>
                                


                                </form>       
                                  
                                <a href="logout.php" class="btn btn-primary btn-user btn-block">LOGOUT</a>           


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

</body>

</html>
<?php } ?>