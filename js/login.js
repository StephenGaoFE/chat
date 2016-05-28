$(function () {
    //登录判断
    $("#btnLogin").click(function () {
        var name = $("#txtName");
        var pwd = $("#txtPwd");
        if (name.val().replace(" ", "") != "" && pwd.val().replace(" ", "") != "") {
            Login(name.val(), pwd.val());
        }
        else {
            if (name.val().replace(" ", "") == "") {
                alert("用户名不能为空!");
                name.focus();
                return false;
            }
            else {
                alert("密码不能为空!");
                pwd.focus();
                return false;
            }
        }
    });

    //取消登录
    $("#btnCancel").click(function () {
        $("#txtName").val("");
        $("#txtPwd").val("");
    });
});

//登录
function Login(name, pwd) {
    $("#char-msg").ajaxStart(function () {
        $(this).show().html("正在发送登录请求...");
    });
    $("#char-msg").ajaxStop(function () {
        $(this).html("请求处理已完成。").hide();
    });
    $.ajax({
        type: "GET",
        url: "doAction.php",
        data: "action=login&name=" + name + "&pass=" + pwd,
        success: function (data) {
        	console.log(data);
            if (data == "success") {
                window.location.href = "index.html";
            }
            else {
                alert("用户名或密码不正确!");
                return false;
            }
        }
    });
}