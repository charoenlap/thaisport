
<main>
    <section class="ct-u-scratches--top ct-u-padding-both-50">
        <div class="ct-u-padding-top-50 hidden-xs"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <h2 class="ct-u-padding-bottom-30">เข้าสู่ระบบ</h2>
                    <?php if($detail){?>
                        <p class="alert alert-danger"><?php echo $detail;?></p>
                    <?php } ?>
                    <form action="<?php echo $action;?>" method="POST">
                        <input type="hidden" name="id_package" value="<?php echo $id_package; ?>">
                        <input type="hidden" name="id_content" value="<?php echo $id_content; ?>">
                        <input type="hidden" name="redirect" value="<?php echo $redirect; ?>">
                        <div class="form-group">
                            <input type="text" placeholder="เบอร์มือถือ" id="phone" name="phone" required="required" class="form-control">
                            <label for="name" class="sr-only">เบอร์มือถือ</label>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="รหัสผ่าน" id="password" name="password" required="required" class="form-control">
                            <label for="name" class="sr-only">รหัสผ่าน</label>
                        </div>
                        <?php if($result){?>
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-danger texxt-center"><?php echo $result;?></p>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <a href="<?php echo route('member/register'.($id_content?'&id_content='.$id_content:''));?>" class="btn btn-motive">สมัครสมาชิก</a>
                            </div>
                            <div class="col-xs-6 col-md-6 text-right">
                                <a href="<?php echo route('member/forgot');?>" class="btn ">ลืมรหัสผ่าน</a>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 text-right">
                                <button type="submit" class="btn btn-motive btn-primary btn-block">เข้าสู่ระบบ</button>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-12">
                                <a href="<?php echo $link_line;?>" class="btn " style="color:#00be00;border:solid 1px #00be00;width:100%;">เข้าสู่ระบบด้วย LINE</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="ct-u-padding-top-80 hidden-xs"></div>
    </section>
</main>