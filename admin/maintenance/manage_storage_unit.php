<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `unit_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="unit-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="unit_number" class="control-label">Ləvazimat adı</label>
			<input type="text" id="unit_number" name="unit_number" class="form-control rounded-0" value="<?php echo isset($unit_number) ? $unit_number : ''; ?>" required>
		</div>
		<div class="form-group">
			<label for="description" class="control-label">Açıqlama</label>
			<textarea name="description" id="" cols="30" rows="3" class="form-control form no-resize summernote"><?php echo isset($description) ? $description : ''; ?></textarea>
		</div>
		<div class="form-group">
			<label for="status" class="control-label">Status</label>
			<select name="status" id="status" class="custom-select selevt">
			<option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Əlçatan</option>
			<option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Əlçatmaz</option>
			<option value="2" <?php echo isset($status) && $status == 2 ? 'selected' : '' ?>>Təmirdə</option>
			</select>
		</div>
		<div class="form-group col-6">
					<label for="" class="control-label">Ləvazimat şəkli</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
						<label class="custom-file-label" for="customFile">Fayl seçin</label>
					</div>
				</div>
			
		
	</form>
</div>
<script>
  function displayImg(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#cimg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$(document).ready(function(){
        $('.select2').select2({placeholder:"Please Select here",width:"relative"})
		$('#unit-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			console.log(this);
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_unit",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.reload();
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>