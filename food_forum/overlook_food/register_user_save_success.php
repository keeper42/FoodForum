<?php 
	if(!empty($_COOKIE['register_user_save_'])){
		$register_user_save_=$_COOKIE['register_user_save_'];
		if($register_user_save_==1){

?>
<div class="modal fade" id="register_user_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
						aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					成功注册
				</h4>
			</div>
			<div class="modal-body">
				请尽情享受美食之旅
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" 
						data-dismiss="modal">关闭
				</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
$(function () { $('#register_user_success').modal({
	keyboard: true
})});
</script>
<?php }
else if($register_user_save_ == 2){ 
?>
<div class="modal fade" id="register_user_fail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
						aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					注册失败
				</h4>
			</div>
			<div class="modal-body">
				请重新登录或者注册
			</div>
			<div class="modal-footer">
				<a data-toggle="modal" data-target="#modal_register" class="btn btn-primary" >
					重新登录
				</a>
				<button type="button" data-toggle="modal" data-target="#modal_register_user" class="btn btn-default">继续注册</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
$(function () { $('#register_user_fail').modal({
	keyboard: true
})});
</script>

<?php }} ?>