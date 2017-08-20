<!-- 模态框（Modal） -->
<div class="modal fade" id="complain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
                    投诉
                </h4>
            </div>
            <form enctype="multipart/form-data" method="post" action="../food_post/complain_save.php">
            <div class="modal-body">
                
                <div class="input-group">
                    <span class="input-group-addon">投诉菜名</span>
                    <input type="text" class="form-control" name="complain_food_name" placeholder="差不多就行">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">投诉缘由</span>
                    <input type="text" class="form-control" name="complain_reason" placeholder="简要说明一下">
                </div>
                <div class="input-group">
                    <select class="selectpicker" name="complain_carteen_name">
                        <?php
                            $search = new my_search("distinct region","carteen");
                                if($search->success){
                                    for($i=0;$i<$search->num;$i++){
                                        echo '<optgroup label='.$search->rows[$i]['region'].'>';
                                        $search2 = new my_search("*","carteen","region = '".$search->rows[$i]['region']."'");
                                        if($search2->success){
                                            for($j=0;$j<$search2->num;$j++)
                                                echo '<option>'.$search2->rows[$j]['name'].'</option>';
                                        }
                                        echo '</optgroup>';
                                    }
                                }
                        ?>
                    </select>
                    <select class="selectpicker" name="complain_type">
                        <option>卫生原因</option>
                        <option>价格不合理</option>
                        <option>偷工减料</option>
                        <option>难以下咽</option>
                        
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">具体说明</span>
                    <textarea class="form-control" name="complain_details" placeholder="具体说明一下，下面可以上传图片说明"></textarea>
                </div>
                <div class="form-group">
                    <!-- <input id="file" name="file[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="" data-preview-file-icon=""> -->
                    <input id="file-5" class="file" name="complain_picture" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-preview-file-icon=""> 
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