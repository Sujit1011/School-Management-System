<?php
session_start();

require "../partials/config.php";
$class_joined=$_SESSION['class_joined'];

$sql1="select count(*) as total from schedule_assignment where assignment_class='$class_joined'";
$result1=mysqli_query($conn,$sql1);
$data1=mysqli_fetch_assoc($result1);


$sql2="select count(*) as total from schedule_meeting where meeting_class='$class_joined'";
$sql3="select count(*) as total from teacher";
$result2=mysqli_query($conn,$sql2);
$data2=mysqli_fetch_assoc($result2);

$sid = $_SESSION['sid'];

$sql3="select * from student where sid = $sid ";
$result3=mysqli_query($conn,$sql3);
$data3=mysqli_fetch_assoc($result3);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #FF4584;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-king"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">Discussion Forum</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

           <!-- Heading -->
           <div class="sidebar-heading">
                Tables
            </div>

            <li class="nav-item">
                <a class="nav-link" href="join_class.php">
                <i class="fa fa-user-plus" ></i>
                    <span>Join Class</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="meet_link.php">
                <i class="fa fa-users" ></i>
                    <span>All Meetings</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="completed_assignment.php">
                <i class="fa fa-check-square"></i>
                    <span>Completed Assignment</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="all_assignment.php">
                <i class="fa fa-book"></i>
                    <span>All Pending Assignment</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="attendance.php">
                <i class="fa fa-tasks"></i>
                    <span>Attendance</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="see_results.php">
                <i class="fa fa-percent"></i>
                    <span>See Grade</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../student_exam/index.php">
                <i class="fa fa-file"></i>
                    <span>Examination</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow sticky-top">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <!-- Nav Item - Alerts -->

                        <!-- Nav Item - Messages -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $_SESSION['name'] . '</span>';
                                } ?>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                                <!-- <span class="caret"></span> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
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
                <div class="container-fluid" style="height: 100%;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-6 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 4px solid #FF4584;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Assignments</div>
                                             <?php
                                                    echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $data1['total'] . '</div>';
                                                    ?> 
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 4px solid #FF4584;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Meetings</div>
                                             <?php
                                                    echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $data2['total'] . '</div>';
                                                    ?> 
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container px-5">
                            <div class="d-sm-flex align-items-center justify-content-between my-4">
                                <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                            </div>
                            <?php
                            
                            echo '
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h3 class="card-title mb-4">'. $data3['fname'] .' '. $data3['lname'] .'</h3>
                                    <div class="d-flex">
                                        <h6 class="card-subtitle mb-2 text-muted">Email Id: '. $data3['email'] .'</h6>
                                        <h6 class="card-subtitle mb-2 ml-4 text-muted">Phone No.: '. $data3['phone'] .'</h6>
                                    </div>
                                    <p class="card-text">Class Joined: '. $data3['class_joined'] .'</p>
                                    <a href="'. $data3['id_card'] .'">Id Card</a>
                                </div>
                            </div>
                            ';
                            ?>
                        </div>

                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->

                            <!-- Pie Chart -->
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">

                                <!-- Project Card Example -->

                                <!-- Color System -->
                            </div>

                            <div class="col-lg-6 mb-4">

                                <!-- Illustrations -->

                                <!-- Approach -->

                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                    <!-- <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <h1 class="h3 mb-0 text-gray-800">Notice</h1>
                    </div> -->

                  
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
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
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="logout.php" method="post">
                            <button class="btn btn-primary" type="submit" name="logout">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

</body>
</html>