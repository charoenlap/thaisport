<div class="preloader"></div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- <button onclick="playPause()" id="btnplay" class="btn ">Play/Pause</button>  -->
            <video width="100%" height="100%" controls id="video1" autoplay>
              <source src="uploads/คู่เอกยก4.mp4" type="video/mp4">
            Your browser does not support the video tag.
            </video>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h2>ชิง 2,2000,000 บาท</h2>
                    <span class="tag"><b>วันอาทิตย์ที่ 26 กุมภาพันธ์ 2566</b></span>
                    <p>ซุ้ม บ้านเมืองนนท์ VS ซุ้ม บ่อทอง ฟาร์ม</p>
                    
                </div>
            </div>
        </div>
        <div class="col-4 mt-4 text-right">
            <a href="<?php echo route('home/live');?>" class="btn btn-primary"><img src="assets/images/play.png" alt="icn">เข้าชม</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h2>ชิง 1,1000,000 บาท</h2>
                    <span class="tag"><b>วันอาทิตย์ที่ 26 กุมภาพันธ์ 2566</b></span>
                    <p>ซุ้ม เพชรธงชัยฟาร์ม VS ซุ้ม ใจสั่งลุย</p>
                </div>
            </div>
        </div>
        <div class="col-4 mt-4 text-right">
            <a href="<?php echo route('home/live');?>" class="btn btn-primary"><img src="assets/images/play.png" alt="icn">เข้าชม</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h2>ชิง 1,1000,000 บาท</h2>
                    <span class="tag"><b>วันอาทิตย์ที่ 26 กุมภาพันธ์ 2566</b></span>
                    <p>ซุ้ม เพชรรางลึก VS ซุ้ม วรฉัตร</p>
                </div>
            </div>
        </div>
        <div class="col-4 mt-4 text-right">
            <a href="<?php echo route('home/live');?>" class="btn btn-primary"><img src="assets/images/play.png" alt="icn">เข้าชม</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-4 text-center">
            <a href="#">การแข่งขัน</a>
        </div>
        <div class="col-4 text-center">
            <a href="#">ซื้อตั๋ว</a>
        </div>
        <div class="col-4 text-center">
            <a href="#">ของตั๋วล่วงหน้า</a>
        </div>
    </div>
</div>
<?php /*<header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
<div class="inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1 class="ct-page-header__title">Live</h1>
            </div>
            <div class="col-sm-8">
                <ul class="breadcrumb">
                    <li><a href="#">หน้าหลัก</a>
                </li>
                <li>Live</li>
            </ul>
        </div>
    </div>
</div>
</div>
</header>
<main>
<section class="container ct-u-padding-bottom-50">
<div class="ct-u-padding-top-60 hidden-xs"></div>
<div class="row">
    <div class="col-12">
        
        <iframe width="100%" height="500" src="https://www.youtube.com/embed/pcUatVHjt5A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<div class="ct-separator"></div>
</section>
</main>
*/ ?>
<script> 
var myVideo = document.getElementById("video1"); 
setInterval(function () {btnplay.click();}, 2000); 

function playPause() { 
  if (myVideo.paused) 
    myVideo.play(); 
  else 
    myVideo.pause(); 
} 

function makeBig() { 
    myVideo.width = 560; 
} 

function makeSmall() { 
    myVideo.width = 320; 
} 

function makeNormal() { 
    myVideo.width = 420; 
} 
</script> 