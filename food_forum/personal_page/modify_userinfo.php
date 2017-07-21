<!-- 模态框（Modal） -->
<div class="modal fade" id="modify_userinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
                    修改个人信息及和设置头像
                </h4>
            </div>
            <form enctype="multipart/form-data" method="post" action="modify_userinfo_save.php?user_ID=<?php echo $user; ?>">
            <div class="modal-body">
                
                <div class="input-group">
                    <span class="input-group-addon">昵称</span>
                    <input type="text" class="form-control" name="modify_name" value="<?php echo $userinfo->rows[0]['name'];?>">
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon">个性签名</span>
                    <textarea class="form-control" name="modify_signature"><?php echo $userinfo->rows[0]['signature'];?></textarea>
                </div>
                <div class="form-group">
                    <input id="file-5" class="file" name="modify_user_picture" type="file" data-preview-file-type="any" data-upload-url="#"  data-preview-file-icon="" > 
                </div>
                
            
        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
                <button type="submit" class="btn btn-primary">
                    提交更改
                </button>
            </div>
         </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal -->