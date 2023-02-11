<div class="main-wrapper">
        <section class="form-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    
                    <div class="col-xl-7">
                        <ul class="member-ul">
                            <li class="active"><a href="#"><span>01</span><b>แสกน QR Code</b></a></li>
                            <li><a href="#"><span>02</span><b>ยืนยันการชำระเงิน</b></a></li>
                            <li><a href="#"><span>03</span><b>สำเร็จ</b></a></li>
                        </ul>
                        <div class="form-div member-1 p-4 text-center mb-4">
                            <div class="price-wrap">
                                <div class="left-price">
                                    <img src="images/exqrcode.jpg" alt="icon" style="width:100%;height:auto;">
                                    <h2>100 <i>฿</i></h2>
                                    <h4></h4>
                                </div>
                                <div class="middle-price">
                                    <h6>ซุ้ม ลานไม้วุฒิพงษ์ VS ซุ้ม พญาบ้านดอน</h6>
                                    <h6>วันอาทิตย์ที่ 31 กรกฎาคม 2565</h6>
                                    <h6>ชิง 2,200,000</h6>
                                </div>
                                <div class="right-price ">
                                    <a href="#" class="btn member-bttn2">ยืนยัน</a>
                                    <!-- <span>include tax *</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-div member-2 text-center mb-4" style="display: none;">
                            <h2>กรุณารอซักครู่</h2>
                            <p>ระบบกำลังตรวจสอบรายการชำระเงิน</p>
                            <form action="#">
                                <div class="form-group button-block text-center">
                                  <button class="form-btn member-bttn3">ต่อไป</button>
                                </div>
                                
                            </form>
                        </div>

                        <div class="form-div member-3 text-center mb-4" style="display: none;">
                            <h2>สำเร็จ</h2>
                            <p >ท่านสามารถรับชมได้โดย <a href="<?php echo route('home/live');?>">คลิกที่นี่</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </section>



    </div>
<?php /* ?><header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="ct-page-header__title"></h1>
                </div>
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li><a href="#">หน้าหลัก</a>
                        </li>
                        <li><a href="#">ชำระเงิน</a>
                        </li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="ct-blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center" style="color:#0033ff;">กรุณาสแกน QR Code ผ่าน Application ของธนาคาร</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class="col-md-3 text-center">
                <img src="data:image/png;base64, <?php echo $result['data']['qrImage']; ?>" alt="">
            </div>
            <div class="col-md-6">
                <h3><b><?php echo (isset($detail_muay['title'])?$detail_muay['title']:''); ?></b></h3>
                <p>ยอดเงินที่ชำระ</p>
                <p><b><?php echo $amount;?></b> บาท</p>
                <p>หมายเลขอ้างอิง</p>
                <p><?php echo $invoice;?></p>
                <p id="demo" class="text-center"><?php //var_dump($detail);?></p>
                <div class="text-center">
                    <a href="<?php echo route('payment/confirm&id_content='.(int)$id_content);?>" class="btn btn-primary" id="btn-confirm">กดปุ่มนี้เพื่อยืนยันการชำระเงิน</a>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
// Set the date we're counting down to
var countDownDate = new Date(<?php echo date('Y');?>, <?php echo date('m')-1;?>, <?php echo date('d');?>, <?php echo date('H');?>, <?php echo date('i')+15;?>, <?php echo date('s');?>, 0).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  // days + "d " + hours + "h " + 
  document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "หมดเวลากรุณาทำรายการใหม่อีกครั้ง";
    $('#btn-confirm').remove();
  }
}, 1000);
</script>
<?php */?>