<?php
$chungloai = $modelTheloai->TheLoai_List();
$link = "index.php?com=loaitin_list";
$limit = 20;
$page_show = 5;
if (isset($_GET['idTL']) && $_GET['idTL'] > 0) {
    $idTL = (int) ($_GET['idTL']);    
    $link.="&idTL=$idTL";
} else {
    $idTL = -1;
}

$danhmucs = $modelLoaisp->loaisp_list($idTL, -1, -1);
$total_record = mysql_num_rows($danhmucs);

$total_page = ceil($total_record / $limit);

if (isset($_GET['page']) == false) {
    $page = 1;
} else {
    $page = (int) $_GET['page'];    
}

$offset = $limit * ($page - 1);

if($idTL > 0){
    $loai = $modelLoaisp->loaisp_List($idTL, $limit, $offset);
}else{
    $loai = $modelLoaisp->all_loaisp_List();
}
  

?>
<script type="text/javascript">
     $(document).ready(function(){
         //alert('a');
        $(".linkxoa").live('click',function(){			
            var flag = confirm("Bạn có chắc chắn xóa");
            if(flag == true){
                var article_id = $(this).attr("article_id");
                $.get('xoa.php',{loai:"loaisp",id:article_id},function(data){
                    window.location.reload();			
                });	
            }
        });
        
    });
</script>
<div>
    <div>
        <div style="width: 48%;float: left"><h3>Quản lý bài viết : Xem danh sách</h3></div>
        <div style="width: 48%;float: left;text-align: right;padding-top: 20px;text-transform: uppercase;font-size: 15px;font-weight: bold"><a href="index.php?com=loaisp_add">Thêm bài viết</a></div>
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
                                <select name='idTL' id="idTL">
                                    <option value='0'>Tất cả</option>
                                    <?php while ($row_cl = mysql_fetch_assoc($chungloai)) { ?>
                                    <option 
                                    <?php echo ($_GET['idTL'] == $row_cl['idTL']) ? "selected" : ""; ?>
                                        value="<?php echo $row_cl['idTL']; ?>"><?php echo $row_cl['Ten']; ?></option>
                                    <?php } ?>
                                    
                                </select>                               
                                <input type="submit" name="btnSubmit" id="btnSubmit" value="  Xem " />
                                <br /><br />
                                <input type="hidden" name="com" value="loaisp_list"  />
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"><?php echo $modelLoaisp->phantrang($page, $page_show, $total_page, $link); ?></td>
                    </tr>
                    <tr>
                        <th width="1%"></th>
                        <th align="center" width="1%">STT</th>
                        <th align="left">Tên sản phẩm</th>
                        <th align="left">Hình ảnh </th>
                        <th width="1%">Action</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = ($page-1)*$limit;;
                    while ($row = mysql_fetch_assoc($loai)) {                       
                        $i++;
                        ?>
                        <tr <?php if ($i % 2 == 0) echo "bgcolor='#CCC'"; ?>>
                            <td><input type="checkbox" name="chon" idDM=<?php echo $row['article_id'] ?>></td>
                            <td align="center"><?php echo $i; ?></td>
                            <td align="left"><?php echo $row['Ten']; ?></td>
                            <td align="left"><img src="<?php echo $row['url_images']; ?>" width="100"/></td>
                            <td style="white-space:nowrap"><a href="index.php?com=loaisp_edit&amp;idLoai=<?php echo $row['idLoai'] ?>"><img src="img/icons/user_edit.png" alt="" title="" border="0"></a>
                            &nbsp;&nbsp;
                                <img class="linkxoa" article_id="<?php echo $row['article_id'] ?>" src="img/icons/trash.png" alt="Xóa" title="Xóa" border="0"></td>

<?php } ?>
                    <tr>
                        <td colspan="6"><?php echo $modelLoaisp->phantrang($page, $page_show, $total_page, $link); ?></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>


    <div class="clr"></div>
</div>
