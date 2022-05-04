<?php session_start(); ?>
<?php

if (!$_SESSION["UserID"]) {  //check session

    Header("Location: formlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {
    include("connection.php");

    if (isset($_GET['DEPRATMENT'])) {
        $DEPRATMENT = $_GET['DEPRATMENT'];
    } else {
        $DEPRATMENT = "0 OR 1 OR 2 OR 3";
    }
    if (isset($_GET['$perpage'])) {
        $perpage = $_GET['$perpage'];
    }else{
        $perpage = 10;
    }
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    if (isset($_GET['status'])) {
        $status = $_GET['status'];
    } else {
        $status = "0 OR 1 OR 2 ";
    }

    $year = date("y") + 43;


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "SELECT * FROM gisutd WHERE STATUS = 0 AND ( DEPRATMENT = {$DEPRATMENT} )";
    $result = mysqli_query($conn, $sql);
    $i = 0;
    $m = 0;

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $m = $m + 1;
        }
        $row['score'] = $m;
        //$data[] = $row['score'];


    }

    $sql = "SELECT * FROM gisutd WHERE STATUS = 1 AND ( DEPRATMENT = {$DEPRATMENT} )";
    $result = mysqli_query($conn, $sql);
    $i = 0;
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $i = $i + 1;
        }
        $row['score'] = $i;
        $data[] = $row['score'];
    }

    $sql = "SELECT * FROM gisutd WHERE STATUS = 2 AND ( DEPRATMENT = {$DEPRATMENT})";
    $result = mysqli_query($conn, $sql);
    $a = 0;
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $a = $a + 1;
        }
        $row['score'] = $a;
        $data[] = $row['score'];
    }

    $max = $i + $m + $a;
    $max2 = $i + $a;


    $b = ($a / $max2) * 100;

    $sql = "SELECT * FROM gisutd WHERE STATUS = 1 AND ( DEPRATMENT = 1 )";
    $result = mysqli_query($conn, $sql);
    $q = 0;
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $q = $q + 1;
        }

    }

    $sql = "SELECT * FROM gisutd WHERE STATUS = 2 AND ( DEPRATMENT = 1)";
    $result = mysqli_query($conn, $sql);
    $w = 0;
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $w = $w + 1;
        }
    }


    $sql = "SELECT * FROM gisutd WHERE STATUS = 1 AND ( DEPRATMENT = 2 )";
    $result = mysqli_query($conn, $sql);
    $e = 0;
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $e = $e + 1;
        }

    }

    $sql = "SELECT * FROM gisutd WHERE STATUS = 2 AND ( DEPRATMENT = 2)";
    $result = mysqli_query($conn, $sql);
    $r = 0;
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $r = $r + 1;
        }

    }

    $sql = "SELECT * FROM gisutd WHERE STATUS = 1 AND ( DEPRATMENT = 3 )";
    $result = mysqli_query($conn, $sql);
    $t = 0;
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $t = $t + 1;
        }

    }

    $sql = "SELECT * FROM gisutd WHERE STATUS = 2 AND ( DEPRATMENT = 3)";
    $result = mysqli_query($conn, $sql);
    $u = 0;
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $u = $u + 1;
        }

    }
    $m1 = $w/($w+$q)*100;
    $m2 = $r/($r+$e)*100;
    $m3 = $u/($u+$t)*100;
    




?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PEA GIS TEST</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                

                <!-- Main Content -->
                <div id="content">
                    

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    
                            
                            <img src="img/LOGO_PEA3.jpg" class="rounded float-left" alt="">
                           <h4 style=" margin-Top: 1em; margin-left: auto;margin-right: auto; width: 50em;color: 	#8B008B; "> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กระบวนการจัดการแผนผังงานก่อสร้างเพื่อบันทึกข้อมูล GIS  <p style=" color: 	#8B008B;font-size: 20px; "> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Construction Diagram Management Process for GIS Data Entry</p></h4>
                                          
                            
                          
                    




                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                        
                            
                            

                            
                    

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["User"]; ?> </span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                    
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Content Row -->
                        <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    งานทั้งหมด</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($max); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                
                                                <a href="index.php" class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    ยังไม่ได้ยืนยัน</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($m); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                
                                                <a href="index.php?status=0&DEPRATMENT=<?php echo $DEPRATMENT; ?>" class="btn btn-warning btn-circle">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    ยืนยันแล้ว</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($i+$a); ?></div>
                                            </div>
                                            <div class="col-auto">
                                            <a href="index.php?status=1&DEPRATMENT=<?php echo $DEPRATMENT; ?>" class="btn btn-success btn-circle">
                                        <i class="fas fa-check"></i>
                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-007bff text-uppercase mb-1">
                                                    โพสGIS</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($a); ?></div>
                                            </div>
                                            <div class="col-auto">
                                            <a href="index.php?status=2&DEPRATMENT=<?php echo $DEPRATMENT; ?>" class="btn btn-primary btn-circle">
                                         <i class="fas fa-flag "></i>
                                    </a>
                                               


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            


                        </div>

                        <!-- Content Row -->


                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">

                                    <?php
                                    //echo $_SESSION["Userlevel"];
                                    if ($_SESSION["Userlevel"] !== "A") { ?>
                                        <div class="card-header py-3">

                                            
                                            <a href="upload_pdf.php" class="btn btn-success btn-icon-split">

                                                <span class="text">เพิ่ม</span>
                                            </a>
                                            


                                            <input id="myInput" type="text" placeholder="Search..">
                                        </div>
                                    <?php }else { ?>
                                        <div class="card-header py-3">
                                            


                                            <input id="myInput" type="text" placeholder="Search..">
                                        </div>
                                        <?php }?>

                                        
                                    <div class="card-body">


                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>เลขที่</th>
                                                        <th>ชื่องาน</th>
                                                        <th>WBS</th>
                                                        <th>ไฟล์งาน</th>
                                                        <th>สถานะ</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <?php

                                                    
                                                        $start = ($page - 1) * $perpage;
                                                        $sql5 = "select * from gisutd WHERE (STATUS =  {$status}) AND ( DEPRATMENT = {$DEPRATMENT}) limit {$start} , {$perpage} ";
                                                        



                                                        $result1 = $conn->query($sql5);

                                                        while ($row = $result1->fetch_assoc()) {
                                                            $ok = $row["ID"];



                                                        ?>

                                                            <td>PD07-015/<?= $year; ?><?= $row["ID"]; ?></td>
                                                            <td><?= $row["NAME"]; ?></td>
                                                            <td><?= $row["WBS"]; ?></td>
                                                            <td><a href="docs/<?php echo $row['FILE']; ?>" target="_blank" class="btn btn-info btn-sm"> เปิดดู </a></td>

                                                            <?php
                                                            if ($row["STATUS"] == 1) {


                                                            ?>


                                                                <td>
                                                                    <?php if ($_SESSION["Userlevel"] !== "A" && $_SESSION["Depratment"] == $row["DEPRATMENT"]) { ?>
                                                                        <a href="ok1.php?ID=<?= $row['ID']; ?>" class="btn btn-success btn-icon-split" onclick="return confirm('ยืนยันการเปลี่ยนสถานะข้อมูล !!');">
                                                                            <span class="icon text-white-10">
                                                                                <i class="fas fa-check"></i>
                                                                            </span>
                                                                            <span class="text">ยืนยันแล้ว</span>
                                                                        </a>
                                                                    <?php } else { ?>
                                                                        <a class="btn btn-success btn-icon-split">
                                                                            <span class="icon text-white-10">
                                                                                <i class="fas fa-check"></i>
                                                                            </span>
                                                                            <span class="text">ยืนยันแล้ว</span>
                                                                        </a>
                                                                    <?php } ?>

                                                                </td>

                                                            <?php } else if ($row["STATUS"] == 0) { ?>
                                                                <td>
                                                                

                                                                    <?php if ($_SESSION["Userlevel"] == "A" && $_SESSION["Depratment"] == $row["DEPRATMENT"]) { ?> <a href="ok.php?ID=<?= $row['ID']; ?>" class="btn btn-warning btn-icon-split" onclick="return confirm('ยืนยันการเปลี่ยนสถานะข้อมูล !!');">
                                                                            <span class="icon text-white-10">
                                                                                <i class="fas fa-exclamation-triangle"></i>
                                                                            </span>
                                                                            <span class="text">ยังไม่ได้ยืนยัน</span>

                                                                        </a><?php } else { ?>
                                                                        <a class="btn btn-warning btn-icon-split">
                                                                            <span class="icon text-white-10">
                                                                                <i class="fas fa-exclamation-triangle"></i>
                                                                            </span>
                                                                            <span class="text">ยังไม่ได้ยืนยัน</span>

                                                                        </a>
                                                                    <?php } ?>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td>
                                                                    <a class="btn btn-primary btn-icon-split">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-flag"></i>
                                                                        </span>
                                                                        <span class="text">โพสGIS</span>
                                                                    </a>
                                                                </td>
                                                            <?php } ?>

                                                    </tr>


                                                </tbody>
                                            <?php
                                                        }
                                            ?>
                                            </table>



                                        </div>
                                    </div>
                                    <?php
                                    $sql2 = "select * from gisutd WHERE (STATUS =  {$status}) AND ( DEPRATMENT = {$DEPRATMENT})";
                                    $query2 = mysqli_query($conn, $sql2);
                                    $total_record = mysqli_num_rows($query2);
                                    $total_page = ceil($total_record / $perpage);
                                    ?>
                                    <div class="col-xl-12">
                                    <nav aria-label="...">
                                        <ul class="pagination">
                                            <li class="page-item ">
                                                <a class="page-link" href="index.php?page=1&$status=<?php echo $status; ?>&DEPRATMENT=<?php echo $DEPRATMENT; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                            </li>
                                            <?php for ($i = 1; $i <= $total_page; $i++) { 
                                                if($page==$i)
                                                {
                                                    $c="active";
                                                }
                                                else
                                                {
                                                    $c="";
                                                }?>
                                                
                                                <li class="page-item <?php echo $c; ?>"><a class="page-link" href="index.php?page=<?php echo $i; ?>&$status=<?php echo $status; ?>&DEPRATMENT=<?php echo $DEPRATMENT; ?>"><?php echo $i; ?></a></li>

                                            <?php } ?>


                                            <li class="page-item">
                                                <a class="page-link" href="index.php?page=<?php echo $total_page; ?>&$status=<?php echo $status; ?>&DEPRATMENT=<?php echo $DEPRATMENT; ?>">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    </div>

                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">

                            <div class="col-xl-12 col-md-12 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ร้อยละความสำเร็จ ภาพรวม กฟฟ.อุตรดิตถ์
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo intval($b); ?>%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo intval($b); ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                            <a href="index.php#" class="btn btn-primary btn-circle">
                                         
                                         <i class="fas fa-clipboard-check "></i>
                                         </a>


                                    
                                                


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">กราฟ</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myChart" width="400" height="200"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success"></i> โพสGIS
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-danger"></i> ยืนยันแล้ว
                                            </span>

                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-12 col-md-12 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ร้อยละความสำเร็จ กฟจ.อุตรดิตถ์
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo intval($m1); ?>%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo intval($m1); ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                            <a href="index.php?DEPRATMENT=1" class="btn btn-danger btn-circle">
                                         
                                         <i class="fas fa-clipboard-check "></i>
                                         </a>


                                    
                                                


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 col-md-12 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold  text-uppercase mb-1" style=" color:#FFA500 ">ร้อยละความสำเร็จ กฟส.อ.พิชัย
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo intval($m2); ?>%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo intval($m2); ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                            <a href="index.php?DEPRATMENT=2" class="btn btn-warning btn-circle">
                                         
                                         <i class="fas fa-clipboard-check "></i>
                                         </a>


                                     


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 col-md-12 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ร้อยละความสำเร็จ กฟส.อ.น้ำปาด
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo intval($m3); ?>%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo intval($m3); ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                            <a href="index.php?DEPRATMENT=3" class="btn btn-info btn-circle">
                                         
                                         <i class="fas fa-clipboard-check "></i>
                                         </a>


                                    


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            

                        </div>



                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>UTD &copy; Energize Power</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
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

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
        




        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                //type: 'bar',
                //type: 'line',
                type: 'pie',
                data: {

                    datasets: [{
                        label: ['Red',
                            'Blue'
                        ],
                        data: <?= json_encode($data, JSON_NUMERIC_CHECK); ?>,
                        backgroundColor: [


                            '#FF0000',
                            '#28a745'
                        ],
                        borderColor: [


                            '#FF0000',
                            '#28a745'
                        ],
                        borderWidth: 0
                    }]
                },

            });

        </script>
        

    </body>

    </html>
<?php } ?>