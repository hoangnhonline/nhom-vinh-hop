<?php
if (isset($_POST['btnSave'])) {    
    $modelLoaisp->insertLoaisp();    
    header("location:?com=loaisp_list&idLoai=".$_POST['idLoai']);
}
?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
</script>
<script type="text/javascript">
    $(document).ready(function(){		
        $(".linkxoa").live('click',function(){			
            var flag = confirm("Bạn có chắc chắn xóa");
            if(flag == true){
                var idTrang = $(this).attr("idTrang");
                $.get('xoa.php',{loai:"trang",id:idTrang},function(data){
                    window.location.reload();			
                });	
            }
        });               
    });
</script>
<script type="text/javascript">
    function validate(){
        var flg = true;
        if($('#category_id').val()==0){
            alert('Chưa chọn category!');
            flg = false;
        }
		if($('#tile').val()==''){
			alert('Chưa nhập tiêu đề!');
			flg = false;
		}
		var editorText = CKEDITOR.instances.content_bv.getData();
		if($('#editorText').val()==''){
			alert('Chưa nhập nội dung!');
			flg = false;
		}
        return flg;
    }	
</script>

<form action="" method="post" name="form_add_dm_ks">
  <div>
    <div>
      <h3>Quản lý thêm loại sản phẩm : <?php echo (isset($_GET['idLoai']) ? "Cập nhật" : "Thêm mới") ?></h3>
    </div>
    <div class="clr"></div>
  </div>
  <div id="main_admin">
  <div id="main_left">
    <table>
      <tr class="left">
        <td width="100px">Category</td>
        <td><select name='idTL' id="idTL">
            
            <?php 
                $chungloai = $modelTheloai->TheLoai_List();
                while ($row_cl = mysql_fetch_assoc($chungloai)) { 
            ?>
            <option 
            <?php echo ($_GET['idTL'] == $row_cl['idTL']) ? "selected" : ""; ?>
                value="<?php echo $row_cl['idTL']; ?>"><?php echo $row_cl['Ten']; ?></option>
            <?php } ?>
          </select></td>
      </tr>
      <tr class="left">
        <td>Tên loại sản phẩm</td>
        <td><input type="text" name="Ten" id="Ten" style="width:500px;height:25px" /></td>
      </tr>
      <tr class="left">
        <td>Hình ảnh</td>
        <td><input type="text" name="url_images" id="url_images" class="tf" value="" style="width:300px;height:25px"/>
          <input type="button" name="btnChonFile" value="Chọn hình" onclick="BrowseServer('Images:/','url_images')"  /></td>
      </tr>      
      <tr class="left">
        <td>Nội dung</td>
        <td><div style="width:800px;overflow: hidden">
            <textarea class="meta" name="content_bv" id="content_bv"></textarea>
            <script type="text/javascript">
    var editor = CKEDITOR.replace('content_bv', {
        uiColor: '#9AB8F3',
        language: 'vi',
        skin: 'office2003',
        filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
        filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        toolbar: [
            ['Source', '-', 'Bold', 'Italic', 'Underline', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'Link', 'Unlink', 'Image', 'Styles', 'Format', 'TextColor', 'BGColor'],
        ]
    });
                                </script> 
          </div></td>
      </tr>
      <tr class="left">
        <td>&nbsp;</td>
        <td>
        	<input type="submit" name="btnSave" value="  Save  " onclick="return validate();" />
        	<input type="reset" name="btnReset" value="  Reset  "/>
        </td>
      </tr>
    </table>
  </div>
</form>
</div>

