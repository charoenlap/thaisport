<header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="ct-page-header__title">สมัครสมาชิก</h1>
                </div>
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo route('home');?>">หน้าหลัก</a>
                        </li>
                        <li>สมัครสมาชิก</li>
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
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <h3 class="ct-u-padding-bottom-30">สมัครสมาชิก</h3>
                    <?php if($detail){?>
                        <p class="alert alert-danger"><?php echo $detail;?></p>
                    <?php } ?>
                    <form action="<?php echo $action; ?>" method="POST" >
                        <input type="hidden" name="redirect" value="<?php echo $redirect; ?>">
                        <div class="form-group">
                            <input type="text" placeholder="เบอร์มือถือ" id="phone" name="phone" required="required" class="form-control">
                            <label for="name" class="sr-only">เบอร์มือถือ</label>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="รหัสผ่าน" id="password" name="password" required="required" class="form-control">
                            <label for="name" class="sr-only">รหัสผ่าน</label>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="ยืนยันรหัสผ่าน" id="cPassword" name="cPassword" required="required" class="form-control">
                            <label for="name" class="sr-only">ยืนยันรหัสผ่าน</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo route('home'); ?>" class="btn">กลับสู่หน้าหลัก</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-motive">สมัครสมาชิก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="ct-u-padding-top-80 hidden-xs"></div>
    </section>
</main>