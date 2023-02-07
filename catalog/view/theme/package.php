<header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="ct-page-header__title"><?php echo $detail['title']; ?></h1>
                </div>
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li><a href="#">หน้าหลัก</a>
                        </li>
                        <li><?php echo $detail['title']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="ct-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class="col-md-3">
                <img src="uploads/content/nophoto.jpg" alt="" class="w100">
                <div class="ct-u-padding-top-30 hidden-xs"></div>
            </div>
            <div class="col-md-3">
                <h3><?php echo $detail['title']; ?></h3>
                <div><?php echo $detail['detail']; ?></div>
                <?php if($id_package!=2){ ?>
                <div>
                    <!-- <a href="<?php echo route('member/register');?>" class="btn btn-motive">สมัครสมาชิก</a> -->
                    <a href="<?php echo route('payment&id_package='.$detail['id']); ?>" class="btn btn-motive">คลิกที่นี่เพื่อชำระเงิน</a>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-3">
                &nbsp;
            </div>
        </div>
    </div>
</main>