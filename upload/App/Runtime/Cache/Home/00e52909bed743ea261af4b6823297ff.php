<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
    <title>自定义图片显示</title>
    <script type="text/javascript" src="/upload/Public/jquery-1.11.2.js"></script>
    <style type="text/css">
        .file-box{
            display: inline-block;
            position: relative;
            padding: 3px 5px;
            margin: 10px 10px;
            overflow: hidden;
            color:#fff;
            background-color: #ccc;
        }
        .file-btn{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;

            background-color: transparent;
            filter:alpha(opacity=0);
            -moz-opacity:0;
            -khtml-opacity: 0;
            opacity: 0;
        }

        .bt{width:100%;height:1px;clear:both;}


        .pics{width:240px;height:320px;padding:3px;float:left}
        .pics img{width:240px;height:320px}
    </style>
    <script type="text/javascript">

        window.onload=function(){
            if(!window.File && !window.FileList && !window.FileReader && !window.Blob) {
                alert("浏览器不支持");
            }
            var dr = document.getElementById('Lists');
            dr.addEventListener("drop",function(e){
                e = e || window.event;
                e.stopPropagation();
                e.preventDefault();
                var dt = e.dataTransfer;
                var files = dt.files;
                handleFiles(files);
            },false);
        }
        function handleFiles(files) {
            $('#Lists').html("");

            var output = [];
            for(var i = 0, f; f = files[i]; i++) {
                var imageType = /image.*/;

                //通过type属性进行图片格式过滤
                if (!f.type.match(imageType)) {
                    continue;
                }
                var divList =  document.getElementById('Lists');
                var reader = new FileReader();
                reader.onload = function(e){
                    var imgData = e.target.result;
                    img = document.createElement('img');
                    img.src = imgData;

                    var div = document.createElement("div");
                    div.className = "pics";
                    div.appendChild(img);
                    divList.appendChild(div);
                }
                reader.readAsDataURL(f);
            }


              var msg="<div class='file-box'>";
               msg+="<input type='submit' value='确认' class='file-btn'>确认";
               msg+="</div>";
               msg+="<div class='file-box'>";
               msg+="<input type='file' class='file-btn' onchange='handleFiles(this.files)'/>重新选择";
               msg+="</div>";
            $('#b').hide();
            $('#content').html(msg);
        }

    </script>
</head>
<body>


<div class="con">
    <div id="Lists">
    </div>
    <div class="bt"></div>
</div>
<form action="/upload/index.php/Home/Index/upload" enctype="multipart/form-data" method="post">
<div id="ba" class="bar">
    <div id="b" class="file-box">
        <input type="file" id="photo" name="photo" class="file-btn" onchange='handleFiles(this.files)'/>
        上传文件

    </div>

    <div id="content">
        </div>


</div>
</form>
</body>
</html>