<?php
$link = "index.php?com=theloai_list";

    if (isset($_GET['category_id']) && $_GET['category_id'] > 0) {
        $category_id = (int) $_GET['category_id'];      
        $link.="&category_id=$category_id";
    } else {
        $category_id = -1;
    }
    $page_show = 5;

    $limit = 20;

    $trangs = $modelArticle->getListArticleByCategory($category_id, -1, -1);

    $total_record = mysql_num_rows($trangs);

    $total_page = ceil($total_record / $limit);

    if (isset($_GET['page']) == false) {
        $page = 1;
    } else {
        $page = (int) $_GET['page'];       
    }

    $offset = $limit * ($page - 1);

    $list_trang = $modelArticle->getListArticleByCategory($category_id, $offset, $limit);

?>
<script type="text/javascript">
     $(document).ready(function(){		
        $(".linkxoa").live('click',function(){			
            var flag = confirm("Bạn có chắc chắn xóa");
            if(flag == true){
                var article_id = $(this).attr("article_id");
                $.get('xoa.php',{loai:"baiviet",id:article_id},function(data){
                    window.location.reload();			
                });	
            }
        });               
    });
</script>
<div>
    <div>
        <div style="width: 48%;float: left"><h3>Quản lý bài viết : Xem danh sách</h3></div>
        <div style="width: 48%;float: left;text-align: right;padding-top: 20px;text-transform: uppercase;font-size: 15px;font-weight: bold"><a href="index.php?com=baiviet_add">Thêm bài viết</a></div>
    </div>

    <div class="clr" style="clear: both"></div>
</div>
<div id="main_admin">

    <div>

        <div>
            <table>
                <thead>
                    <tr>
                        <td colspan="6">
                            <form method="get" action="" name="formTim" id="formTim">
                                Category
                                <select name='category_id' id="category_id">
                                    <option value='0'>Tất cả</option>
                                    <option value='1' <?php echo ($category_id==1) ? "selected" : ""; ?>>Nội dung website</option>
                                    <option value='2' <?php echo ($category_id==2) ? "selected" : ""; ?>>Tin tức</option>
                                    
                                </select>                               
                                <input type="submit" name="btnSubmit" id="btnSubmit" value="  Xem " />
                                <br /><br />
                                <input type="hidden" name="com" value="baiviet_list"  />
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"><?php echo $modelArticle->phantrang($page, $page_show, $total_page, $link); ?></td>
                    </tr>
                    <tr>
                        <th width="1%"></th>
                        <th align="center" width="1%">STT</th>
                        <th align="left">Tiêu đề</th>
                        <th align="left">Hình ảnh </th>
                        <th width="1%">Action</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = ($page-1)*$limit;;
                    while ($row = mysql_fetch_assoc($list_trang)) {                       
                        $i++;
                        ?>
                        <tr <?php if ($i % 2 == 0) echo "bgcolor='#CCC'"; ?>>
                            <td><input type="checkbox" name="chon" idDM=<?php echo $row['article_id'] ?>></td>
                            <td align="center"><?php echo $i; ?></td>
                            <td align="left"><?php echo $row['title']; ?></td>
                            <td align="left"><img src="<?php echo $row['url_images']; ?>" width="100"/></td>
                            <td style="white-space:nowrap"><a href="index.php?com=baiviet_edit&amp;article_id=<?php echo $row['article_id'] ?>"><img src="img/icons/user_edit.png" alt="" title="" border="0"></a>
                            &nbsp;&nbsp;
                                <img class="linkxoa" article_id="<?php echo $row['article_id'] ?>" src="img/icons/trash.png" alt="Xóa" title="Xóa" border="0"></td>

<?php } ?>
                    <tr>
                        <td colspan="6"><?php echo $modelArticle->phantrang($page, $page_show, $total_page, $link); ?></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>


    <div class="clr"></div>
</div>
