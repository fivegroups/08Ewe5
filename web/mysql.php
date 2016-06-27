<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>五组微E项目开发</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="public/bootstrap.css" rel="stylesheet">
        <link href="public/bootstrap-responsive.css" rel="stylesheet">
        <link href="public/install.css" rel="stylesheet">
        <link rel="stylesheet" href="common/css/install.css" />

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
        <![endif]-->
        <script src="public/jquery-1.js"></script>
        <script src="public/bootstrap.js"></script>
    </head>

    <body data-spy="scroll" data-target=".bs-docs-sidebar">
        <!-- Navbar
        ================================================== -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" target="_blank" href="http://www.onethink.cn/">五组微E项目开发</a>
                    <div class="nav-collapse collapse">
                    	<ul id="step" class="nav">
    <li class="active"><a href="javascript:;">安装协议</a></li>
    <li class="active"><a href="javascript:;">环境检测</a></li>
    <li class="active"><a href="javascript:;">创建数据库</a></li>
    <li><a href="javascript:;">安装</a></li>
    <li><a href="javascript:;">完成</a></li>

                    	</ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron masthead">
            <div class="container">

        <h1>创建数据库</h1>
                <form action='installshow.php' method='post' target="install_iframe" onsubmit="return check_form();">
                    <div class="log_box">
                                               <div class="red_box" style='display:none' id='error_div'>
                            <img src="images/error.gif" width="16" height="15" />
                            安装发生错误：<label></label>
                        </div>

                        <div class="gray_box">
                            <div class="box">
                                <table class="form_table">
                                    <col width="100px" />
                                    <col />
                                    <tr>
                                        <th>数据库地址</th><td><input class="gray" type="text" id="db_address" name='db_address' value='localhost:3306' /><br /><label>MYSQL数据库的地址，本地默认：localhost:3306</label></td>
                                    </tr>
                                    <tr>
                                        <th>数据库名称</th><td><input class="gray" type="text" name='db_name' id="db_name" /><br /><label class="error" id='db_name_label' style='display:none'><img src="images/failed.gif" width="16" height="15" />请填写正确的数据库名称</label></td>
                                    </tr>
                                    <tr>
                                        <th>账户</th><td><input class="gray" type="text" name='db_user' id="db_user"/></td>
                                    </tr>
                                    <tr>
                                        <th>密码</th><td><input class="gray" type="text" name='db_pwd' id="db_pwd"/></td>
                                    </tr>
                                    <tr>
                                        <th>数据库表前缀</th>
                                        <td><input class="gray" type="text" value='we_' name='db_pre' id="db_pre"/><br /><label class="error" id='db_pre_label' style='display:none'><img src="common/images/failed.gif" width="16" height="15" />请填写正确的表前缀字符</label></td>
                                    </tr>
                                    <tr>
                                        <th></th><td><input class="check" type="button" onclick="check_mysql();" /></td>
                                    </tr>
                                </table>

                                <p id='right_p' style='display:none'><img src="common/images/right.gif" width="19" height="18" />数据库连接正确</p>
                                <p id='error_p' style='display:none'><img src="common/images/failed.gif" width="16" height="16" />数据库连接不正确</p>
                                <hr />
                                <table class="form_table">
                                    <col width="100px" />
                                    <col />
                                    <tr>
                                        <th>管理员账户</th>
                                        <td>
                                            <input class="gray" type="text" name='admin_user'id="admin_user" value='admin' required="required" /><br />
                                            <label class="error" id='admin_user_label' style='display:none'><img src="common/images/failed.gif" width="16" height="15" />密码格式不正确，字符在4-12个之间</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>密码</th>
                                        <td>
                                            <input class="gray" type="password" name='admin_pwd' id="admin_pwd" required="required" /><br />
                                            <label class="error" id='admin_pwd_label' style='display:none'><img src="common/images/failed.gif" width="16" height="15" />密码格式不正确，字符在6-16个之间</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="button" value="添加用户信息" class="btn btn-success btn-large" onclick="check_button();"></td>
                                    </tr>
                                </table>
                                <hr />

                                <strong>安装选择</strong>
                                <label for=""><input class="radio" type="radio" name='install_type' checked=checked value='simple' />简单安装：只安装系统程序</label>
                                <hr />

                                <div id='install_state' style='display:none'>
                                    <strong>安装进度</strong>
                                    <label>正在安装,请稍后...</label>
                                    <div class="loading"><span style="width:0px;"></span><img src="common/images/loading.gif" style='width:500px;height:20px' /></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <p class="operate"><input class="return" type="button" onclick="window.location.href = 'installshow.php';" /><input class="next" type="submit" value='' /></p>
                </form>
            </div>
        </div>


        <!-- Footer
        ================================================== -->
        <footer class="footer navbar-fixed-bottom">
            <div class="container">
                <div>
    <a class="btn btn-success btn-large" href="http://localhost/onethink_1.0_140202/wwwroot/install.php?s=/Install/step1.html">上一步</a>
    <a href="installshow.php" class="btn btn-success btn-large">点击这里</a>
                </div>
            </div>
        </footer>

<div id="think_page_trace" style="position: fixed;bottom:0;right:0;font-size:14px;width:100%;z-index: 999999;color: #000;text-align:left;font-family:'微软雅黑';">
<div id="think_page_trace_tab" style="display: none;background:white;margin:0;height: 250px;">
<div id="think_page_trace_tab_tit" style="height:30px;padding: 6px 12px 0;border-bottom:1px solid #ececec;border-top:1px solid #ececec;font-size:16px">
	    <span style="color: rgb(0, 0, 0); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">基本</span>
        <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">文件</span>
        <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">流程</span>
        <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">错误</span>
        <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">SQL</span>
        <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">调试</span>
    </div>
<div id="think_page_trace_tab_cont" style="overflow:auto;height:212px;padding: 0; line-height: 24px">
		    <div style="display: block;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2016-06-18 16:46:25 HTTP/1.1 GET : /onethink_1.0_140202/wwwroot/install.php?s=/Install/step2.html</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.0934s ( Load:0.0399s Init:0.0138s Exec:0.0029s Template:0.0368s )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">吞吐率 : 10.71req/s</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">内存开销 : 1,088.45 kb</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 0 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">文件加载 : 33</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 0 gets 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 128</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=q3nk0rrsvts0764009cshffvg3</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\install.php ( 1.08 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\ThinkPHP.php ( 4.42 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Think.class.php ( 11.53 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Storage.class.php ( 1.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Storage\Driver\File.class.php ( 3.54 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Mode\common.php ( 2.61 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Common\functions.php ( 44.69 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\Application\Common\Common\function.php ( 28.01 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Hook.class.php ( 4.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\App.class.php ( 12.57 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Dispatcher.class.php ( 14.43 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Route.class.php ( 13.37 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Controller.class.php ( 10.84 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\View.class.php ( 7.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Behavior\ParseTemplateBehavior.class.php ( 3.89 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Behavior\ContentReplaceBehavior.class.php ( 1.91 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Conf\convention.php ( 10.95 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\Application\Common\Conf\config.php ( 2.01 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\Application\Common\Conf\tags.php ( 0.07 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Lang\zh-cn.php ( 2.58 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Conf\debug.php ( 1.59 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\Application\Common\Behavior\InitHookBehavior.class.php ( 1.65 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Behavior.class.php ( 0.88 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\Application\Install\Conf\config.php ( 1.07 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\Application\Install\Common\function.php ( 7.53 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Behavior\ReadHtmlCacheBehavior.class.php ( 5.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\Application\Install\Controller\InstallController.class.php ( 3.57 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Template.class.php ( 28.41 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Template\TagLib\Cx.class.php ( 22.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Think\Template\TagLib.class.php ( 9.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\Runtime\Cache\Install\6236e16d6fb6c3909456d5deb3fb62de.php ( 5.72 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Behavior\WriteHtmlCacheBehavior.class.php ( 0.98 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpstudy\WWW\onethink_1.0_140202\wwwroot\ThinkPHP\Library\Behavior\ShowPageTraceBehavior.class.php ( 5.24 KB )</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Common\Behavior\InitHook [ RunTime:0.003474s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --END-- [ RunTime:0.003580s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ReadHtmlCache [ RunTime:0.001917s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --END-- [ RunTime:0.002009s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ContentReplace [ RunTime:0.000163s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --END-- [ RunTime:0.000248s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ParseTemplate [ RunTime:0.019120s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --END-- [ RunTime:0.019193s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\WriteHtmlCache [ RunTime:0.002312s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --END-- [ RunTime:0.002368s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_end ] --START--</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
    </div>
</div>
<div id="think_page_trace_close" style="display:none;text-align:right;height:15px;position:absolute;top:10px;right:12px;cursor: pointer;"><img style="vertical-align:top;" src="data:image/gif;base64,R0lGODlhDwAPAJEAAAAAAAMDA////wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUQxMjc1MUJCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUQxMjc1MUNCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRDEyNzUxOUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRDEyNzUxQUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAAAAAAALAAAAAAPAA8AAAIdjI6JZqotoJPR1fnsgRR3C2jZl3Ai9aWZZooV+RQAOw=="></div>
</div>
<div id="think_page_trace_open" style="height:30px;float:right;text-align: right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;"><div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px">0.0934s </div><img style="" title="ShowPageTrace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVERDVENkZGQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVERDVENzAwQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NURENUQ2RkRCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NURENUQ2RkVCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5fx6IRAAAMCElEQVR42sxae3BU1Rk/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" width="30"></div>
<script type="text/javascript">
(function(){
var tab_tit  = document.getElementById('think_page_trace_tab_tit').getElementsByTagName('span');
var tab_cont = document.getElementById('think_page_trace_tab_cont').getElementsByTagName('div');
var open     = document.getElementById('think_page_trace_open');
var close    = document.getElementById('think_page_trace_close').childNodes[0];
var trace    = document.getElementById('think_page_trace_tab');
var cookie   = document.cookie.match(/thinkphp_show_page_trace=(\d\|\d)/);
var history  = (cookie && typeof cookie[1] != 'undefined' && cookie[1].split('|')) || [0,0];
open.onclick = function(){
	trace.style.display = 'block';
	this.style.display = 'none';
	close.parentNode.style.display = 'block';
	history[0] = 1;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
close.onclick = function(){
	trace.style.display = 'none';
this.parentNode.style.display = 'none';
	open.style.display = 'block';
	history[0] = 0;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
for(var i = 0; i < tab_tit.length; i++){
	tab_tit[i].onclick = (function(i){
		return function(){
			for(var j = 0; j < tab_cont.length; j++){
				tab_cont[j].style.display = 'none';
				tab_tit[j].style.color = '#999';
			}
			tab_cont[i].style.display = 'block';
			tab_tit[i].style.color = '#000';
			history[1] = i;
			document.cookie = 'thinkphp_show_page_trace='+history.join('|')
		}
	})(i)
}
parseInt(history[0]) && open.click();
(tab_tit[history[1]] || tab_tit[0]).click();
})();
</script>
</body></html>
<script type='text/javascript'>
    //更新进度条
    function update_progress(obj)
    {
        var whole       = $('#install_state img').css('width');
        var nowProgress = obj.percent ? parseInt(whole) * parseFloat(obj.percent) : 0;

        if(obj.isError == true)
        {
            $('#error_div').show();
            $('#error_div label').html(obj.message);
            $('#install_state label').addClass('red_box');
            $('.next').attr('disabled','');
        }
        else
        {
            $('#install_state label').removeClass('red_box');
        }

        $('#install_state label').html(obj.message);
        $('#install_state .loading span').css('width',nowProgress);

        if(obj.percent == 1)
        {
            window.location.href = 'index.php?act=install_4';
        }
    }

    //检查表单信息
    function check_form()
    {
        $('label.error').hide();
        var checkObj   =
        {
            db_pre    :/^\w+$/i,
            db_name   :/.+/i,
            admin_user:/.{4,12}/i,
            admin_pwd :/.{6,16}/i
        };

        for(val in checkObj)
        {
            var matchResult = $.trim($('[name="'+val+'"]').val()).match(checkObj[val]);
            if(matchResult == null)
            {
                $('[name="'+val+'"]').focus();
                $('#'+val+'_label').show();
                return false;
            }
        }

        if($('[name="admin_repwd"]').val() != $('[name="admin_pwd"]').val())
        {
            $('#admin_repwd_label').show();
            return false;
        }

        $('#install_state').show();
        $('.next').attr('disabled','disabled');
        return true;
    }

    //检查mysql链接
    function check_mysq()
    {
        //获取ajax检查mysql链接的所需数据
        var sendData = {'db_address':'','db_user':'','db_pwd':''};
        for(val in sendData)
        {
            sendData[val] = $('[name="'+val+'"]').val();
        }
        $.get('index.php?act=check_mysql&'+Math.random(),sendData,function(content)
        {
            //alert(content);
            if(content == 1)
            {
                $('#right_p').show();
                $('#error_p').hide();
            }
            else
            {
                $('#right_p').hide();
                $('#error_p').show();
            }
        });
    }
    function check_mysql(){
        $(function(){
            var db_address=$("#db_address").val();
            var db_name=$("#db_name").val();
            var db_user=$("#db_user").val();
            var db_pwd=$("#db_pwd").val();
            var db_pre=$("#db_pre").val();
            $.ajax({
                type: "POST",
                url: "message.php",
                data: {db_address:db_address,db_name:db_name,db_user:db_user,db_pwd:db_pwd, db_pre:db_pre},
                success: function(data){
                     $('#right_p').show();
                    //$('#error_p').hide();
                    // alert(data);
                }
            });
        })
    }
    function check_button(){
        $(function(){
            var db_address=$("#db_address").val();
            var db_name=$("#db_name").val();
            var db_user=$("#db_user").val();
            var db_pwd=$("#db_pwd").val();
            var db_pre=$("#db_pre").val();
            var u_name=$("#admin_user").val();
            var u_pwd=$("#admin_pwd").val();
            $.ajax({
                type: "POST",
                url: "mysql_insert.php",
                data: {u_name:u_name,u_pwd:u_pwd,db_address:db_address,db_name:db_name, db_user:db_user,db_pwd:db_pwd, db_pre:db_pre},
                success: function(data){
                    //$('#right_p').show();
                    //$('#error_p').hide();
/*
                   if(data==0){
                       alert("添加数据失败");
                   }else{
                       alert("添加数据成功且建立db.php");
                   }
*/
                  alert(data);
                }
            });
        })
    }
</script>
