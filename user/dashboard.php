<?php
include_once('../function/db_func.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANAJEMEN LAB - mahasiswa</title>
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="user.css">
</head>
<body>
    <div class="wrapper">
        <div class="header mb-5">
            <nav class="navbar navbar-dark fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="dashboard.php"><i class="fa-regular fa-calendar-days "></i> PENJADWALAN</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                    <h4><?php echo $_SESSION['nim'] ?> | <?php echo $_SESSION['fullname'] ?></h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php?hal=request">Request Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Jadwal</a>
                        </li>
                        </ul>
                        <a href="../logout.php"><button class="btn btn-danger">LOG OUT</button></a>
                    </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main-content">
            <div class="card">
            <?php
                if(isset($_GET['hal'])){
                    if(@$_GET['hal'] == "request"){
                            require_once "request.php";                        
                    }
                }
                else{
                    require_once "jadwal.php";
                }
            ?>
            </div>
            
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

