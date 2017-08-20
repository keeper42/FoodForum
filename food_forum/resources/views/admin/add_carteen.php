<!-- 模态框（Modal） -->

<div class="modal fade" id="carteenM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
                    添加食堂
                </h4>
            </div>
            <form enctype="multipart/form-data" method="post" action="add_carteen_receive.php">
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">食堂  ID</span>
                    <input type="text" class="form-control" name="id" placeholder="这个最重要">
                </div> 
                <div class="input-group">
                    <span class="input-group-addon">食堂名称</span>
                    <input type="text" class="form-control" name="name" placeholder="又开了一家食堂？">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">食堂地点</span>
                    <input type="text" class="form-control" name="region" placeholder="在哪里啊(比如说南区)">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">食堂评价</span>
                    <input type="text" class="form-control" name="grade" placeholder="做人留一面">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">食堂卫生</span>
                    <input type="text" class="form-control" name="santiation" placeholder="日后好相见">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">食堂简介</span>
                    <textarea class="form-control" name="intruduce" placeholder="没有可不填"></textarea>
                </div>
                <div class="form-group">
                    <!-- <input id="file" name="file[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="" data-preview-file-icon=""> -->
                    <input id="file-5" class="file" name="carteen_picture[]" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-preview-file-icon=""> 
                </div>
                
            
        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
                <button type="submit" class="btn btn-primary">
                    确认添加
                </button>
            </div>
         </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal -->