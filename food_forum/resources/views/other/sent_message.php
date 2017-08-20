<!-- 模态框（Modal）data-toggle="modal" data-target="#sent_message"     -->
<div class="modal fade" id="sent_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
                    向<span id="sent_message_target_name"></span>致信
                </h4>
            </div>
            <form enctype="multipart/form-data" method="post" action="../other/sent_message_save.php">
            <div class="modal-body">
                
            
                <div class="input-group">
                    <span class="input-group-addon">内容</span>
                    <textarea class="form-control" name="sent_message_content" placeholder=""></textarea>
                </div>       
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭  
                </button>
                <button type="submit" class="btn btn-primary">
                    发送信息
                </button>
            </div>
         </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal -->
