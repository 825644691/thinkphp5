<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html> <head> <meta http-equiv=Content-Type content="text/html;charset=utf-8">  <title>百度个人设置</title> <link type=text/css rel=stylesheet href="http://pr.bdimg.com/static/princess/css/csssetting_90567318.css"> </head> <body> <div id=banner> <div class=banner-position><div id=banhld class=banner-content><div class=plzhld></div><a href=https://www.baidu.com/ target=_blank><img class=logo-img src="http://pr.bdimg.com/static/princess/img/misc/baidu_logo_c352a179.gif" alt=baidu.com></a></div></div> </div> <div id=content> <div class="mod-setting clearfix"> <div class="setting-title yahei">个人设置</div> <div class="setting-content clearfix"> <div class=setting-menu> <div class="menu-title menu-profile-current active"> <h3>个人资料</h3>  </div> <ul class=menu-list> <li class="menu-item basic-link"><a href=/p/setting/profile/basic>基本资料</a> <li class=menu-split> <li class="menu-item details-link"><a href=/p/setting/profile/details>详细资料</a> <li class=menu-split>  <li class="menu-item education-link"><a href=/p/setting/profile/education>教育背景</a> <li class=menu-split> <li class="menu-item career-link"><a href=/p/setting/profile/career>工作信息</a> <li class=menu-split> <li class="menu-item portrait-link on"><a href=/p/setting/profile/portrait>头像设置</a> </ul> <div class="menu-title menu-privacy" id=settingPrivacy> <h3>隐私设置</h3> </div> <ul class=menu-list> <li class="menu-item tieba-link" id=settingPrivacyTieba><a href=/p/setting/privacy/tieba>我在贴吧</a> <li class=menu-split> <li class="menu-item zhidao-link" id=settingPrivacyZhidao><a href=/p/setting/privacy/zhidao>我在知道</a> <li class=menu-split> <li class="menu-item wenku-link" id=settingPrivacyWenku><a href=/p/setting/privacy/wenku>我在文库</a>   <li class=menu-split> </ul> </div> <div class=setting-detail id=stthld> <div class=detail-bg></div> <div class="plzhld clearfix"></div> </div> </div> </div> </div> <div id=foot> <div class=mod-footer> <div class=bottom-line2> <p>使用百度服务前，请确保您已阅读并同意 <a target=_blank href=https://www.baidu.com/duty/yinsiquan.html>《百度隐私权保护声明》</a></p> <p>© Baidu <a target=_blank href="http://www.baidu.com/duty/">使用百度前必读</a> <a href=http://www.miibeian.gov.cn target=_blank>京ICP证030173号</a> <em class=s-bottom-copyright>&nbsp;&nbsp;&nbsp;&nbsp;</em></p> </div></div> </div> <script src="http://pr.bdimg.com/static/princess/js/jssetting_9fac816e.js"></script> <script>
    App.router.updateGlobal({
        "domain": {"portrait":"http:\/\/himg.bdimg.com","passport":"http:\/\/passport.baidu.com","passportSsl":"https:\/\/passport.baidu.com","www":"http:\/\/www.baidu.com","zhidao":"http:\/\/zhidao.baidu.com","tieba":"http:\/\/tieba.baidu.com","space":"http:\/\/hi.baidu.com","album":"http:\/\/hi.baidu.com","albumStatic":"http:\/\/hiphotos.baidu.com","static":"http:\/\/pr.bdimg.com","message":"http:\/\/msg.baidu.com"},
        "token": '442512c793708763279bbc0abe1bfbb2',
        "page_userInfo": {
            "portrait": ""
        }
    });
</script> <script>
    App.onPageletArrive({"targetId":"banhld", "viewType": "Userpanel", "tplContent":"<div id=pUserPanel class=mod-banner> <a href=\x22#\x22 id=pUserInfo onclick=\x22return false;\x22 class=user-name hidefocus> <span class=un>a825644691<\/span><span class=icon><\/span><\/a>| <a href=http:\/\/msg.baidu.com\/ target=_blank>私信<\/a>|<a href=\x22http:\/\/www.baidu.com\x22>百度首页<\/a><div id=pUserNamePopup class=\x22username-menu inactive\x22><a href=\x22\/p\/a825644691\x22 class=\x22log-myhome bdown\x22>我的主页<\/a> <a href=\/p\/setting\/profile\/basic target=tiebaPrivacySetting class=\x22log-page-setting bdown\x22 id=tieba_privacy_link>主页设置<\/a>  <a href=\x22http:\/\/passport.baidu.com\/center\x22 class=\x22pass-center bdown\x22>帐号设置<\/a>  <a href=\x22https:\/\/passport.baidu.com\/?logout&u=https%3a%2f%2fpassport.baidu.com&tpl=pp\x22 class=log-lgout>退出<\/a> <\/div> <\/div>", "options":{
        "init" : function(){
            this.router.updateGlobal({'isLoginUserNoName' : false,
                'isLoggedIn': true});
            if(this.router.updateLoginUserData){
                this.router.updateLoginUserData({"userInfo":{"isLoggedIn":true, "username": "a825644691", "isLoginUserNoName": false, "token": '442512c793708763279bbc0abe1bfbb2', "portrait": "a94661383235363434363931fe33"}});
            };
            this.router.updateGlobal({'login_userInfo':{
                portrait : 'a94661383235363434363931fe33',
                uname : 'a825644691'
            }});
        }
    }});
</script><script src="http://pr.bdimg.com/static/princess/js/setting_portrait_dad7f6c2.js"></script><script>
    App.onPageletArrive({"targetId":"stthld", "viewType": "SettingProfile",
        "tplContent":"<div class=mod-setting-profile> <div class=\x22setting-profile-title yahei\x22>头像设置<\/div>  <div id=avatar class=profile-new-portrait> <\/div> <span class=save-ok id=tiebaSaveOkMsg> 你的设置保存成功！ <a href=\x22http:\/\/www.baidu.com\/p\/a825644691\x22 target=reviewPage class=check-effect>查看效果<\/a> <\/span> <span class=\x22save-ok zhidao-save-ok\x22 id=zhidaoSaveOkMsg> 该头像已同步到百度知道 <\/span>  <iframe style=\x22display:none;\x22 src=http:\/\/himg.baidu.com\/crossdomain.xml><\/iframe> <iframe style=\x22display:none;\x22 src=http:\/\/himg.bdimg.com\/crossdomain.xml><\/iframe> <\/div>", assignedId: "mod-portrait-avatar"
    });
    if(document.getElementById('avatar')){
        /*baidu.swf.create(
         {
         'id'            : "jd",
         'width'         : "640",
         'height'        : "400",
         'ver'           : "9.0.28",
         'errorMessage'  : "cannot load flash",
         'url'           : "http://pr.bdimg.com/static/princess/swf/imageEditPanel_a538f48a.swf",
         'bgcolor'       : "#FFFFFF",
         'wmode'         : "transparent",
         'vars'          : {
         "browserType"   : (navigator.appVersion.indexOf("MSIE") != -1) ? "2": "1",
         "cm"            : "1",
         "ct"            : "4",
         "userSign"      : "a94661383235363434363931fe33",
         "upRoot"        : "http://himg.baidu.com/sys/upload/",
         "photoRoot"     : "http://himg.bdimg.com/sys/portrait/item/",
         "bdstoken"      : "25ec228087b077b40811008edcf6161c"
         },
         "allowscriptaccess" : "always"
         },
         "avatar");*/
        baidu.dom.ready(function(){
            var wrapperDom = document.getElementById('avatar');
            var protocol = (window.location ? window.location.protocol.toLowerCase() : document.location.protocol.toLowerCase());
            var _src;
            if(protocol == 'http'){
                _src = 'http://himg.bdimg.com/';
            }else if(protocol == 'https'){
                _src = 'https://ss0.bdstatic.com/7Ls0a8Sm1A5BphGlnYG/' ;
            }
            var avatar = passport.setportrait.init({
                prefix:'princess',//配置产品线标识
                portraitType:0, //0表示内嵌，1表示浮层
                wrapper:wrapperDom,
                staticpage:protocol+'//www.baidu.com/p/jump.html',
                previewDoamin:_src,
                portraitVars:{
                    "bdstoken":"25ec228087b077b40811008edcf6161c",
                    "psign":"a94661383235363434363931fe33"
                },
                recomNum : 5,
                historyLen:3,
                onSaveSuccess:function(){
                    //Hiphoto.callback(1);
                },
                onSaveError:function(){
                }
            });
        });


    }
    var Hiphoto  = {};

    Hiphoto.callback = function(succNo){
        var tip,zhidaoTips,changeTimes=0;
        if(succNo){
            tip = P.g('tiebaSaveOkMsg');
            tip.style.display = 'block';
            setTimeout(function(){
                tip.style.display = 'none';
            }, 5000);
            if(window.document.referrer.indexOf('zhidao.baidu.com') != '-1'){
                //如果是来自百度知道的修改头像则告知用户同步到了百度知道
                zhidaoTips = P.g('zhidaoSaveOkMsg');
                if(zhidaoTips.style.display != 'none'){
                    zhidaoTips.style.display = 'none';
                    setTimeout(function(){
                        zhidaoTips.style.display = 'block';
                    }, 100);
                }else{
                    zhidaoTips.style.display ='block';
                }
            }
        }else{
            F.use('dialog/dialogmanager', function(dm){
                dm.alert('图片上传失败，请稍候再试');
            })
        }
    };
    /*    Hiphoto.getParam = function(){
     var para = {};
     para.BrowserType = (navigator.appVersion.indexOf("MSIE") != -1) ? "2": "1";
     para.cm = "1";
     para.ct = "4";
     para.spIsBlogPicAdd = "2";
     para.spAlbumName = "默认相册";
     para.spRefURL = window.location.href;
     para.userSign = "a94661383235363434363931fe33";
     para.upRoot = "http://himg.baidu.com/sys/upload/";
     para.photoRoot = "http://himg.bdimg.com/sys/portrait/item/";
     para.bdstoken = "25ec228087b077b40811008edcf6161c";
     return para;
     };*/

    if(window.document.referrer == "http://zhidao.baidu.com/uhome/settitle"){
        //如果是来自百度知道的修改头像则告知用户同步到了百度知道
        var zhidaoTips = P.g('zhidaoSaveOkMsg');
        zhidaoTips.style.display ='block';
    }
</script>