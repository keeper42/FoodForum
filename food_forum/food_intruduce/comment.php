<div class="modal fade" id="myModal_comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="comment_save.php?food_ID=<?php echo $food_ID ?>" method="post">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>

                <h4 class="modal-title" id="myModalLabel">
                    评论美食
                </h4>
                </div>
                <script type="text/javascript">
                            function star_on_click(argument) {
                                str= 'star'+argument;
                                star0 = document.getElementById(str);
                                s = star0.getAttribute("class");
                                var i;
                                for(i=1;i<=5;i++){
                                    str= 'star'+i;
                                    var star=document.getElementById(str);
                                    if(i<argument)star.setAttribute("class","btn btn-warning active");
                                    else if(i>argument) star.setAttribute("class","btn btn-warning");
                                }
                                if(s == "btn btn-warning active")argument--;
                                document.getElementById("star_grade").innerHTML = argument+"&nbsp分";
                                $.post('comment_save2.php',
                                    {
                                        grade:argument,
                                    }); 
                            }
                </script>
                <div class="modal-body">
                    评分：
                    <div class="btn-group" data-toggle="buttons" >
                        <label id="star1"  class="btn btn-warning" onclick="star_on_click(1)">
                            <input type="checkbox" name="star[]" value="1" > <span class="glyphicon glyphicon-star">
                        </label>
                        <label id="star2" class="btn btn-warning" onclick="star_on_click(2)">
                            <input  type="checkbox" name="star[]" value="2" > <span class="glyphicon glyphicon-star">
                        </label>
                        <label id="star3" class="btn btn-warning" onclick="star_on_click(3)">
                            <input type="checkbox" name="star[]" value="3" > <span class="glyphicon glyphicon-star">
                        </label>
                        <label id="star4" class="btn btn-warning" onclick="star_on_click(4)">
                            <input type="checkbox" name="star[]" value="4" > <span class="glyphicon glyphicon-star">
                        </label>
                        <label  id="star5" class="btn btn-warning" onclick="star_on_click(5)">
                            <input type="checkbox" name="star[]" value="5" > <span class="glyphicon glyphicon-star">
                        </label>
                    </div>
                    &nbsp;&nbsp;
                    <label id ="star_grade"></label>
                    <br>
                    <br>
                    <textarea style="min-height: 120px;" class="form-control" name="food_comment" placeholder="元芳，你怎么看"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary">
                        提交
                    </button>
                </div>
            </form>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>