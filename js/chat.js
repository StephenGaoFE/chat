$(function () {
    //用户登录状态判断
    //if (!CheckLoginState()) {
    //    window.location.href = "login.html";
    //}
    //else {
    //    GetMessage();
    //    GetOnline();
    //    AddExpression();
    //    CheckSend();
    //    UpdateMessage();
    //    UpdateOnline();
    //    Exit();
    //}

    //1.用户登录状态判断
    $.ajax({
        type: "GET",
        url: "doAction.php",
        data: "action=checkLoginState",
        success: function (data) {
            if (data != "true") {
                window.location.href = "login.html";
            }
        }
    });

    //2.获取聊天内容
    $.ajax({
        type: "GET",
        url: "doAction.php",
        data: "action=getMsg",
        success: function (data) {
            $("#chat-dialog-con ul").html(data);
        }
    });

    //3.获取在线用户
    $.ajax({
        type: "GET",
        url: "doAction.php",
        data: "action=getOnline",
        success: function (data) {
            if (data != "null") {
                $("#chat-user-con ul").html(data);
            }
        }
    });

    //4.添加表情
    for (var i = 1; i <= 10; i++) {
        $("#chat-input-expr").html($("#chat-input-expr").html() + "<img src='Images/" + i + ".gif' id='" + i + "' />");
        //html和text方法不一样，前者可添加html标签和纯文本，后者只可添加纯文本。
    }

    //5.向消息中添加表情
    $("#chat-input-expr img").click(function () {
        $("#txtInput").val($("#txtInput").val() + "<:" + $(this).attr("ID") + ":>");
    });

    //6.发送消息判断
    $("#btnSend").click(function () {
        var sendMsg = $("#txtInput");
        if (sendMsg.val() != "") {
            SendMessage(sendMsg.val());
        }
        else {
            alert("发送内容不能为空!");
            sendMsg.focus();
            return false;
        }
    });

    //7.实时刷新聊天内容
    setInterval(GetMessage, 5000);

    //8.实时刷新在线用户
    setInterval(GetOnline, 5000);

    //9.退出时销毁一切信息
    $(window).unload(function () {
        $.ajax({
            type: "GET",
            url: "doAction.php",
            data: "action=exit",
            success: function (data) { }
        })
    });
    
    //10.reset
    $("#btnReset").click(function () {
    	$.ajax({
            type:"GET",
            url:"doAction.php",
            data:"action=reset",
            success: function (data) {
            	console.log(data);
            	GetMessage();
            	GetOnline();
            }
    	})
     });
});

//发送消息
function SendMessage(msg) {
    $("#chat-msg").ajaxStart(function () {
        $(this).show().html("正在发送消息...");
    });
    $("#chat-msg").ajaxStop(function () {
        $(this).html("消息已发送。").hide();
    });
    var now = new Date();
    $.ajax({
        type: "GET",
        url: "doAction.php",
        data: "action=sendMsg&con=" + msg + "&d=" + now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds(),
        success: function (data) {
        	console.log(data);
            if (data != "success") {
                GetMessage();
                $("#txtInput").val("");
            }
            else {
                alert("发送失败!");
                return false;
            }
        }
    });
}

//获取消息
function GetMessage() {
    $.ajax({
        type:"GET",
        url:"doAction.php",
        data:"action=getMsg",
        success: function (data) {
        	console.log(data);
            $("#chat-dialog-con ul").html(data);
        }
    });
}

//获取在线用户
function GetOnline() {
    $.ajax({
        type: "GET",
        url: "doAction.php",
        data: "action=getOnline",
        success: function (data) {
            if (data != "null") {
            	console.log(data);
                $("#chat-user-con ul").html(data);
            }
        }
    });
}