<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上海外滩投资开发（集团）有限公司资产信息平台</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--
	function submitLogin(){
		if(form.username.value == "" || form.password.value == "") {
			alert("请正确输入用户名和密码！两者都不能为空！");
			return;
		}
		form.submit();
	}
	function isEnter(e){
		if (GetKeyCode(e) == 13) 
			submitLogin();
	}
	function moveNext(e){
		if (GetKeyCode(e) == 13) 
			form.password.focus();
	}
	

		function GetKeyCode(e) {//取得不同浏览器下的键盘事件值 
		var keyc; 
		if(window.event) {//ie键盘事件 
		keyc=e.keyCode; 
		} else if (e.which) {//火狐 
		keyc=e.which; 
		} 
		return keyc; 
		} 

//-->
</script>
</head>
<!--%String strLogingFailed = request.getParameter("loginFailed");  %-->
<body>
<div id="warper">
	<div id="head"></div>
	
  <div id="main">
   	  <div class="main_top"></div>
        <div class="main_login">
        <?php 
            if (isset($_SESSION['login_error']) && $_SESSION['login_error'] == 'password error') {
                echo'<div class="loginWrong"><img src="images/icon_wrong.gif" width="16" height="16" /> 用户名或密码输入错误</div>';
            }
        ?>
         <div>
         <form name = "form" method = "post" action = "loginControl.jsp">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>用户名：</td>
              <td><input type="text" name="username" id="username" class="input01" onkeyup ="moveNext(event)"/></td>
            </tr>
            <tr>
              <td>密　码：</td>
              <td><input type="password" name="password" id="password" class="input01" onkeyup ="isEnter(event)"/></td>
            </tr>
          </table>
          </form>
          </div>
          <div class="loginBtn">
          	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><a href="#" class="btnBlue" onclick = "submitLogin();">登录</a></td>
                <td><a href="resetPassword.jsp" class="btnBlue" >忘记密码</a></td>
              </tr>
              <tr>
                  <td colspan=2 align="center">
                  <?php 
                        date_default_timezone_set('Asia/Shanghai');
                  	$datestr1 = date('Y-m-d H:i:s');
                        echo $datestr1;
                  ?>
                  </td>
              </tr>
            </table>
            </div>
        </div>
  </div>
    
    <div id="footer"><a href="#">版权所有上海外滩投资（集团）有限公司 沪ICP证080047号 沪公网安备110000000006号</a></div>
</div>
</body>
</html>