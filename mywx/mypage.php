<?php
require_once "jssdk.php";
// $jssdk = new JSSDK("yourAppID", "yourAppSecret");
$jssdk = new JSSDK("wx2fdbe721e30a6c5e", "2d947cc3e92c2198e337aeb52ff54731");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name=viewport content="width=device-width,initial-scale=1,user-scalable=no">
  <title></title>
  <script src="http://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
  <link rel="stylesheet" href="http://203.195.235.76/jssdk/css/style.css">
  <style>
  img{
    width: 100%;
  }
  </style>
</head>
<body>

<div class="wxapi_form">  
  <h2>我的微信网页</h2>
  <button class="btn btn_primary" id="addImg">添加图片</button>
  <button class="btn btn_primary" id="location">我的位置</button>
  <button class="btn btn_primary" id="scan">扫一扫</button>
</div>

<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'onMenuShareTimeline',
      'chooseImage',
      'getLocation',
      'openLocation',
      'scanQRCode'
    ]
  });
  wx.ready(function () {
    // 在这里调用 API

    wx.onMenuShareTimeline({
      title: '我的微信网页', // 分享标题
      imgUrl: 'http://tva4.sinaimg.cn/crop.0.0.179.179.180/62b7f86cjw1ecar9h852xj2050050jrg.jpg', // 分享图标
      success: function () { 
          // 用户确认分享后执行的回调函数
          alert('已成功分享到朋友圈');
      },
      cancel: function () { 
          // 用户取消分享后执行的回调函数
          alert('用户已取消分享');
      }
    });

    $('#addImg').on('click',function(){
      wx.chooseImage({
        success: function (res) {
          $.each(res.localIds,function(index,value){
            $('<img>').attr('src',value).insertAfter('#addImg');
          });
        }
      });
    });

    $('#location').on('click',function(){
      wx.getLocation({
        type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
        success: function (res) {
            var lati = res.latitude; // 纬度，浮点数，范围为90 ~ -90
            var longi = res.longitude; // 经度，浮点数，范围为180 ~ -180。

            wx.openLocation({
              latitude: lati, // 纬度，浮点数，范围为90 ~ -90
              longitude: longi, // 经度，浮点数，范围为180 ~ -180。
              scale: 16, // 地图缩放级别,整形值,范围从1~28。默认为最大
            });
        }
      });
    });

    $('#scan').on('click',function(){
      wx.scanQRCode({
        needResult: 0, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
        scanType: ["qrCode","barCode"], // 可以指定扫二维码还是一维码，默认二者都有
        success: function (res) {
        var result = res.resultStr; // 当needResult 为 1 时，扫码返回的结果
        }
      });
    });
  });
</script>
</body>
</html>