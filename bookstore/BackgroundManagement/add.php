<html>
<meta charset="utf-8"/>
<?php

header('content-type:text/html;charset=utf-8;');

?>




<script type="text/javascript">
    function myform_Validator(theForm)
    {

        if (theForm.name.value == "")
        {
            alert("请输入书名。");
            theForm.name.focus();
            return (false);
        }
        if (theForm.price.value == "")
        {
            alert("请输入书名价格。");
            theForm.price.focus();
            return (false);
        }
        if (theForm.type.value == "")
        {
            alert("请输入书名所属类别。");
            theForm.type.focus();
            return (false);
        }
        return (true);
    }
</script>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP图书管理系统新书添加</title>
    <style>
        .table{
            border: 1px solid #CAF2FF;/*边框颜色*/
            margin-top: 5px;
            margin-bottom: 5px;
            background:#a8c7ce;
        }
        .td_bgf {
            background:#d3eaef;
            color:#000000;
        }

        .td_bg {
            background:#ffffff;
            color:#344b50;
        }
        .bg_tr {
            font-family: "微软雅黑,Verdana, 新宋体";
            color:#e1e2e3;/*标题字体色*/
            font-size:12px;
            font-weight:bolder;
            background:deepskyblue;/*标题背景色*/
            line-height: 22px;
        }
        td {
            color:#1E5494;
            font-size:12px;
            line-height: 18px;
        }
    </style>
</head>
<body>
<form id="myform" name="myform" method="post" action="upload.php" onsubmit="return myform_Validator(this) "  enctype="multipart/form-data">
    <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
            <td colspan="2" align="left" class="bg_tr"> 后台管理 >> 新书入库</td>
        </tr>

        <tr>
            <td width="31%" align="right" class="td_bg">书本图片：</td>
            <td width="69%" class="td_bg">
                <input name="myFile" type="file"><br/>
                <input type="hidden" name="MAX_FILE_SIZE"
                       value="5120"/>
            </td>

        </tr>


        <tr>
            <td width="31%" align="right" class="td_bg">书名id：</td>
            <td width="69%" class="td_bg">
                <input name="book_id" type="text" id="book_id" size="15" maxlength="30" />
            </td>
        </tr>


        <tr>
            <td width="31%" align="right" class="td_bg">书名：</td>
            <td width="69%" class="td_bg">
                <input name="book_title" type="text" id="book_title" size="15" maxlength="30" />
            </td>
        </tr>

        <tr>
            <td width="31%" align="right" class="td_bg">作者：</td>
            <td width="69%" class="td_bg">
                <input name="author" type="text" id="author" value="" size="15" maxlength="30" />
            </td>
        </tr>

        <tr>
            <td width="31%" align="right" class="td_bg">出版社id：</td>
            <td width="69%" class="td_bg">
                <input name="publish_id" type="text" id="publish_id" value="" size="15" maxlength="30" />
            </td>
        </tr>

        <tr>
            <td width="31%" align="right" class="td_bg">书本内容：</td>
            <td width="69%" class="td_bg">
                <input name="introduction" type="text" id="introduction" value="" size="15" maxlength="30" />
            </td>
        </tr>

        <tr>
            <td width="31%" align="right" class="td_bg">类型：</td>
            <td width="69%" class="td_bg">
                <input name="type" type="text" id="type" value="" size="15" maxlength="30" />
            </td>
        </tr>



        <tr>
            <td width="31%" align="right" class="td_bg">书本库存：</td>
            <td width="69%" class="td_bg">
                <input name="total" type="text" id="total" value="" size="15" maxlength="30" />本
            </td>
        </tr>

        <tr>
            <td width="31%" align="right" class="td_bg">价格：</td>
            <td width="69%" class="td_bg">
                <input name="price" type="text" id="price" value="" size="15" maxlength="30" />
            </td>
        </tr>


        <tr>
            <td align="right" class="td_bg">
                <input type="hidden" name="action" value="insert">
                <input type="submit" name="button" id="button" value="提交" />
            </td>
            <td class="td_bg">　　
                <input type="reset" name="button2" id="button2" value="重置" />
            </td>
        </tr>
    </table>

</form>
</body>
</html>