<?php include"../overlook_food/register_user.php"; ?>
<div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" 
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
                    欢迎来深圳大学美食论坛
                </h4>
            </div>
            <form id="form" class="form-horizontal" action="../overlook_food/register_save.php" method="post">
                <div class="modal-body">
                    
                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-2 control-label">账号</label>
                            <div class="col-sm-8">
                                <input type="text" name="user_ID" class="form-control" id="inputEmail3" />
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-8">
                                <input type="password" name="pwd" class="form-control" id="inputPassword3" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <div class="checkbox" id="checkbox">
                                     <label><input id="check" type="checkbox" value="1" />管理员登录</label>
                                </div>
                            </div>
                            
                        </div>
                        
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="login_click()" >登录</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    
                </div>
            </form> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    var form = document.getElementById("form");
    var check = document.getElementById("check");
    var str = form.action;
    function login_click(){
   if(check.checked==true)
   {
      form.action = str+"?flag=1"
   }
   else
    form.action = str+"?flag=0"
}

</script>