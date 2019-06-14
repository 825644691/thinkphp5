<html>
<head>
    <style type="text/CSS">
    .th{
        font-size:20px;
        color: deepskyblue;

    }
    </style>
</head>
<?php
header('content-type:text/html;charset=utf-8;');

?>
<body><table>
    <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
                <tr align="center">
                    <font size="5px" color="#00bfff">系统信息

                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">软件版本</span></div></td>
                    <td height="20" align="center" bgcolor="#FFFFFF" class="STYLE19">Book Management 8.02
                        <script type="text/javascript" src="http://www.04ie.com/net/phpbook0_3.js"></script></td>
                </tr>
                <tr>
                    <td width="23%" height="20" align="left" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">php版本</span></div></td>
                    <td width="77%" height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo "PHP".PHP_VERSION; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">服务器名：</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $_SERVER['SERVER_NAME']; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">服务器IP：</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $_SERVER["HTTP_HOST"]; ?></div></td>
                </tr>

                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">服务器时间：</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $showtime=date("Y-m-d H:i:s");?></div></td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>