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
    <title>MANAJEMEN LAB - admin</title>
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../cssmain/main.css">
</head>
<body>
    <div class="wrapper">
        <div class="header mb-2">
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <a class="judul" href="dashboard.php"> <i class="fa-regular fa-calendar-days "></i> PENJADWALAN </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?hal=request"><i class="fa-sharp fa-solid fa-envelope"></i> Daftar Request</a>
                        </li>
                   
                        <li class="nav-item2">
                        <a class="nav-link" href="dashboard.php"><i class="fa-solid fa-circle-info"></i> Jadwal</a>
                        </li>
                    </ul>
                    <span class="navbar-text text-white">
                    <i class="fa-solid fa-user "></i>
                        <?php echo $_SESSION['fullname']?> - ADMIN
                        <a href="../logout.php"><button class="btn btn-light"><i class="fa-solid fa-right-from-bracket"></i> LOG OUT</button></a>
                </div>
            </nav>
        </div>
        <div class="main-content">
           <div class="card">
           <?php
                        if(isset($_GET['hal'])){
                            if (@$_GET['hal'] == "request") {
                                if (@$_GET['op'] == "terima") {
                                    require_once "request.php";
                                } else if (@$_GET['op'] == "tolak") {
                                    require_once "request.php";
                                } else {
                                    require_once "request.php";
                                }
                            }      
                        }else{
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
