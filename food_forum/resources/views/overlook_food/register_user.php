<div class="modal fade" id="modal_register_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" 
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
                    注册用户
                </h4>
            </div>
            <form class="form-horizontal" action="../overlook_food/register_user_save.php" method="post">
                <div class="modal-body">
                    
                        <div class="form-group">
                             <label for="register_user_inputEmail3" class="col-sm-2 control-label">账号</label>
                            <div class="col-sm-8">
                                <input type="text" name="register_user_ID" class="form-control" id="register_user_inputEmail3" />
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-8">
                                <input type="password" name="register_pwd" class="form-control" id="inputPassword3" />
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="register_user_inputEmail4" class="col-sm-2 control-label">昵称</label>
                            <div class="col-sm-8">
                                <input type="text" name="register_user_name" class="form-control" id="register_user_inputEmail4" />
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="textarea" class="col-sm-2 control-label">个性签名</label>
                            <div class="col-sm-8">
                                <textarea name="register_signature" class="form-control" id="textarea"></textarea>
                            </div>
                        </div>
                        
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >提交</button>
                    <button type="reset" class="btn btn-primary" >重置</button>
                    
                </div>
            </form> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->