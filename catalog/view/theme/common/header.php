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
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/video-player.css">
    </head>
    <body>
        <div class="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar p-0" style="">
                        <a href="#" class="logo">
                            <img src="assets/images/logo-2-t-c.png" alt="logo" class="light">
                            <img src="assets/images/logo-2-t-c.png" alt="logo" class="dark">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                        aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav nav-menu float-none text-center">
                                <li class="nav-item"><a class="nav-link" href="<?php echo route('home');?>">หน้าหลัก</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo route('home/page');?>">ชมย้อนหลัง</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo route('home/blog');?>">ข่าวสาร</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo route('home/live');?>">
                                        <img src="images/logo.png" alt="" width="35px">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <div class="user-avater">
                                        <a class="nav-link" href="#">&nbsp;สมาชิก</a>
                                        <div class="user-menu">
                                            <ul>
                                                <li><a href="<?php echo route('member/register');?>">สมัครสมาชิก</a></li>
                                                <li><a href="<?php echo route('member/login');?>">เข้าสู่ระบบ</a></li>
                                                <li><a href="<?php echo route('member/historyPayment');?>">ข้อมูลสมาชิก</a></li>
                                                <li><a href="<?php echo route('member/logout');?>">ออกจากระบบ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        
                        <!-- <div class="search-div">
                            <input type="text" placeholder="ค้นหา">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>