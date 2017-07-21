<?php 
	if($collect_flag == 1){
		$collect_flag=-1;
?>
<div class="modal fade" id="collect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
						aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					成功收藏
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
<script type="text/javascript">
$(function () { $('#collect').modal({
	keyboard: true
})});
</script>
<?php }
else if($collect_flag==0){ 
	$collect_flag=-1;
?>
<div class="modal fade" id="collect_fail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
						aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					你已经收藏了
				</h4>
			</div>
			<div class="modal-body">
				是太喜欢宝宝了么
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" 
						data-dismiss="modal">确定
				</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
$(function () { $('#collect_fail').modal({
	keyboard: true
})});
</script>

<?php } ?>