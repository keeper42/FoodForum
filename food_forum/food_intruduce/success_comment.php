<?php 
	if(isset($_COOKIE['success_comment'])){
		
?>
<!-- 模态框（Modal） -->
<div class="modal fade" id="success_comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
						aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					添加评论成功
				</h4>
			</div>
			<div class="modal-body">
				请继续美食之旅
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" 
						data-dismiss="modal">关闭
				</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
$(function () { $('#success_comment').modal({
	keyboard: true
})});
</script>
<?php } ?>