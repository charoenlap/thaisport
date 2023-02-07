<div class="container">
	<form action="<?php echo $action;?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo (isset($id)?$id:'');?>">
		<div class="row mt-2">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
				    <li class="breadcrumb-item"><a href="#">สมาชิก</a></li>
				    <li class="breadcrumb-item active" aria-current="page"><?php echo (isset($detail['username'])?$detail['username']:'');?></li>
				  </ol>
				</nav>
			</div>	
		</div>
		<div class="row mt-2">
			<div class="col-2">
				<label for="">Username</label>
			</div>
			<div class="col-10">
				<input type="text" class="form-control" name="username" value="<?php echo (isset($detail['username'])?$detail['username']:'');?>">
			</div>
		</div>
		<div class="row mt-2 mb-4">
			<input type="submit" class="btn btn-primary btn-block">
		</div>
	</form>
</div>
<div class="container">
		<div class="row">
			<div class="col-3">
				<label for="">แพคเกจ</label>
				<select name="" id="id_package" class="form-control">
					<option value="1">รายเดือน</option>
					<option value="2">รายครั้ง</option>
				</select>
			</div>
			<div class="col-4">
				<label for="">เนื้อหา</label>
				<select name="" id="id_content" class="form-control">
					<option value="">เลือกเนื้อเฉพาะแบบรายครั้ง</option>
					<?php foreach($banners as $banner){ ?>
					<option value="<?php echo $banner['ref_content_sub_id']; ?>"><?php echo $banner['title']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-2">
				<label for="">วันที่สร้าง</label>
				<input type="text" class="form-control" id="date_create" value="<?php echo date('Y-m-d H:i:s');?>">
			</div>
			<div class="col-2">
				<label for="">วันที่หมดอายุ</label>
				<?php 
					$stop_date = date('Y-m-d H:i:s');
					$stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));
				?>
				<input type="text" class="form-control" id="date_expired" value="<?php echo $stop_date;?>">
			</div>
			<div class="col-1">
				<input type="button" class="btn btn-primary" id="add-package" value="เพิ่ม">
			</div>
		</div>
	<?php 
		// echo $sql = "SELECT * FROM gs_member_history LEFT JOIN gs_package ON gs_member_history.id_package = gs_package.id WHERE id_user = '".(int)$id."' AND date_expired >= '".date('Y-m-d H:i:s')."'";
	?>
	<div class="row">
		<div class="col-12">
			<table class="table">
				<thead>
					<th>ชื่อแพคเกจ</th>
					<th>เนื้อหา</th>
					<th>วันที่สร้าง</th>
					<th>วันหมดอายุ</th>
					<th></th>
				</thead>
				<tbody>
					<?php foreach($package as $val){ ?>
					<tr>
						<td>
							<?php echo $val['package_title'];?>
						</td>
						<td>
							<?php echo $val['id_content'];?> <?php echo $val['content_title'];?>
						</td>
						<td>
							<?php echo $val['date_create'];?>
						</td>
						<td>
							<?php echo $val['date_expired'];?>
						</td>
						<td>
							<a href="#" class="btn-del-package-member btn btn-danger btn-xs" data-id="<?php echo $val['id'];?>">ลบ</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
.tox-notifications-container {
	display:none;
}
</style>
<script>
	$(document).on('click','#add-package',function(e){
		$.ajax({
			url: 'index.php?route=member/addPackageMember',
			type: 'GET',
			dataType: 'json',
			data: {
				id_user:'<?php echo (isset($id)?$id:'');?>',
				id_package:$('#id_package').val(),
				id_content:$('#id_content').val(),
				date_create:$('#date_create').val(),
				date_expired:$('#date_expired').val(),
			},
		})
		.done(function() {
			console.log("success");
			window.location = 'index.php?route=member/edit&id=<?php echo (isset($id)?$id:'');?>';
		})
		.fail(function(a,b,c) {
			console.log("error");
			console.log(a);
			console.log(b);
			console.log(c);
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	$(document).on('click','.btn-del-package-member',function(e){
		var ele = $(this);
		$.ajax({
			url: 'index.php?route=member/deleteMemberPackage',
			type: 'GET',
			dataType: 'json',
			data: {
				id:$(ele).attr('data-id'),
			},
		})
		.done(function() {
			console.log("success");
			window.location = 'index.php?route=member/edit&id=<?php echo (isset($id)?$id:'');?>';
		})
		.fail(function(a,b,c) {
			console.log("error");
			console.log(a);
			console.log(b);
			console.log(c);
		})
		.always(function() {
			console.log("complete");
		});
		
	});
</script>	
