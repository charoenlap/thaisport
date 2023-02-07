<header class="ct-page-header ct-u-scratches--bottom ct-u-scratches--inner ct-u-background--black">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="ct-page-header__title">ประวัติการดู</h1>
                </div>
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo route('home');?>">หน้าหลัก</a>
                        </li>
                        <li>ประวัติการดู</li>
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
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <th width="30px;">ลำดับ</th>
                            <th class="text-center">เนื้อหา</th>
                            <th width="130px;">วันที่เข้าชม</th>
                            <th width="130px;">วันที่เข้าชมล่าสุด</th>
                        </thead>
                        <tbody>
                            <?php $i=1;foreach($history as $val){?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td class="text-center"><?php echo $val['title'];?></td>
                                <td><?php echo $val['date_create'];?></td>
                                <td><?php echo $val['date_last_view'];?></td>
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