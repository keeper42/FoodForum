<!-- 模态框（Modal） -->
<div class="modal fade" id="ask_food_post_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
                    发布打饭贴
                </h4>
            </div>
            <form enctype="multipart/form-data" method="post" action="../other/ask_food_post_save.php">
            <div class="modal-body">
                <div class="input-group">
                    发帖须知：本吧的打饭贴是本着人人互助而发的，所以每个人都有自己的的打饭积分，每次打饭需要支付一定打饭积分，打饭积分太低会导致无法发布打饭贴
                    
                </div>
                <div class="input-group">
                    <span class="input-group-addon">简明要求</span>
                    <input type="text" class="form-control" name="ask_food_post_demand" placeholder="扼要就行">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">送饭地点</span>
                    <input type="text" class="form-control" name="ask_food_post_address" placeholder="例如：冬筑1150">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">打饭时间范围</span>
                    <input type="datetime-local" class="form-control" name="ask_food_post_starttime" >
                    <input type="datetime-local" class="form-control" name="ask_food_post_endtime" >
                </div>
                <div class="input-group">
                    <span class="input-group-addon">备注</span>
                    <textarea class="form-control" name="ask_food_post_node" placeholder="没有可不填"></textarea>
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