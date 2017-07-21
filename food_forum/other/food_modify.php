<!-- 模态框（Modal） -->
<div class="modal fade" id="food_modify_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
                    对发表的食物进行修改
                </h4>
            </div>
            <form enctype="multipart/form-data" method="post" action="../overlook_food/add_food_receive.php">
            <div class="modal-body">
                
                <div class="input-group">
                    <span class="input-group-addon">美食名称</span>
                    <input type="text" class="form-control" name="food_name" placeholder="晒晒你的美食吧">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">饭菜价格</span>
                    <input type="text" class="form-control" name="food_price" placeholder="RMB">
                </div>
                <div class="input-group">
                    <select class="selectpicker" name="carteen_name">
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
                    <select class="selectpicker" name="food_type">
                        <?php
                            $type = new my_search("distinct food_type","carteen_type");
                                if($type->success){
                                    for($i=0;$i<$type->num;$i++)
                                            echo '<option>'.$type->rows[$i]['food_type'].'</option>';
                                }
                        ?>
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">分享感言</span>
                    <textarea class="form-control" name="food_content" placeholder="没有可不填"></textarea>
                </div>
                <div class="form-group">
                    <!-- <input id="file" name="file[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="" data-preview-file-icon=""> -->
                    <input id="file-5" class="file" name="food_picture[]" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-preview-file-icon=""> 
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