<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Thaisport</title>
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="assets/css/style.css?time=<?php echo time();?>">
        <link rel="stylesheet" href="assets/css/video-player.css">

        
        
        <script src="assets/js/plugin.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </head>
    <body>
        <div class="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar p-0" style="">
                        <a href="#" class="logo">
                            <img src="images/Logo Thaisport.png" alt="logo" class="light">
                            <img src="images/Logo Thaisport.png" alt="logo" class="dark">
                        </a>
                        <a class="nav-link first mobile" href="<?php echo route('home');?>">หน้าหลัก</a>
                        <a class="nav-link mobile active-build" href="<?php echo route('home/live');?>">
                             ถ่ายทอดสด
                        </a>
                        
                        <?php if($username){ ?>
                            <a class="nav-link mobile" href="<?php echo route('member/login');?>"><?php echo mb_strimwidth($username,0,10,'..','utf8'); ?></a>
                        <?php }else{?>
                            <a class="nav-link mobile" href="<?php echo route('member/login');?>">สมาชิก</a>
                        <?php } ?>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                        aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav nav-menu float-none text-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo route('home');?>">หน้าหลัก</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active-build" href="<?php echo route('home/live');?>">
                                         ถ่ายทอดสด
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo route('home/page');?>">ชมย้อนหลัง</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo route('home/book');?>">ซื้อตั๋วล่วงหน้า</a>
                                </li>
                                <?php if($username){ ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo route('member/historyPayment');?>">
                                        <?php echo mb_strimwidth($username,0,10,'..','utf8'); ?>
                                    </a>
                                </li>
                                <?php }else{?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo route('member/login');?>">
                                        สมาชิก
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo route('home/blog');?>">ข่าวสาร</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>