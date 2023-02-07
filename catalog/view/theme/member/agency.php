<header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="ct-page-header__title">เอเย่นต์</h1>
                </div>
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo route('home');?>">หน้าหลัก</a>
                        </li>
                        <li>เอเย่นต์</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <section class="ct-u-scratches--top ct-u-padding-both-50">
        <div class="ct-u-padding-top-50 hidden-xs"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-danger">*เงื่อนไขการส่งต่อลิงก์ ผู้ที่ส่งต่อจะต้องเป็นสมาชิก ในระบบ</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    ลิงก์การสมัครสมาชิก 
                </div>
                <div class="col-md-8">
                    <?php 
                        $link_ref = "https://gosport.world/index.php?route=member/register&ref=".encode($username,'lap');
                    ?>
                    <input type="text" class="form-control" id="myInput" value="<?php echo $link_ref;?>" style="text-transform: lowercase;"> 
                </div>
                <div class="col-md-1">
                    <input type="button"  class="btn btn-primary" value="คัดลอกลิงก์" onclick="myFunction()">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-right">สถานะตอนนี้ <b><span class="<?php echo $status;?>"><?php echo $status_active; ?></span></b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    จำนวนผู้ที่สมัคร <?php echo count($agency);?> คน
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <th width="30px;">ลำดับ</th>
                            <th class="text-center">Username</th>
                            <th width="180px;">วันที่สมัคร</th>
                        </thead>
                        <tbody>
                            <?php $i=1;foreach($agency as $val){?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td class="text-center"><?php echo $val['username'];?></td>
                                <td><?php echo $val['date_create'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ct-u-padding-top-80 hidden-xs"></div>
    </section>
</main>
<script>
    function myFunction() {
      /* Get the text field */
      var copyText = document.getElementById("myInput");
 
      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */

       /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText.value);

      /* Alert the copied text */
      // alert("Copied the text: " + copyText.value);
    }
</script>