<!-- 模态框（Modal） -->
<div class="modal fade" id="together_eat_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
                    发布约饭贴
                </h4>
            </div>
            <form enctype="multipart/form-data" method="post" action="../other/eat_together_invite_save.php">
            <div class="modal-body">
                
                <div class="input-group">
                    <span class="input-group-addon">约饭地点</span>
                    <input type="text" class="form-control" name="eat_together_invite_address" placeholder="例如：T4奶茶">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">约饭时间范围</span>
                    <input type="datetime-local" class="form-control" name="eat_together_invite_starttime" >
                    <input type="datetime-local" class="form-control" name="eat_together_invite_endtime" >
                </div>
                <div class="input-group">
                    <span class="input-group-addon">备注</span>
                    <textarea class="form-control" name="eat_together_invite_node" placeholder="没有可不填"></textarea>
                </div>

        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
                <button type="submit" class="btn btn-primary">
                    发帖
                </button>
            </div>
         </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal -->