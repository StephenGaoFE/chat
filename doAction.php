<?php
session_start();
$action = $_GET['action'];


if ($action == "login"){
    $usr=login();
}elseif($action == "checkLoginState"){
    checkLoginState();
}elseif($action == "exit"){
    logout();
}elseif($action == "sendMsg"){
    sendMsg();
}elseif($action == "getMsg"){
   getMsg();
}elseif($action == "getOnline"){
    getOnline();
}elseif($action == "reset"){
    resetdata();
}

function login(){
    $user = $_GET['name'];
    $pass = $_GET['pass'];
    if ($pass == "111111"){
    $_SESSION["user"] = $user;
    $_SESSION["pass"] = $pass;
    
    $usr="<li>".$user."</li>";
    $myfile = fopen("test2.txt", "a") or die("Unable to open file!");
    fwrite($myfile, $usr);
    fclose($myfile);
    echo "success";
   
    }else{
    echo "fail";
    }
}
function checkLoginState(){
    if($_SESSION['user'] != ""){
        echo "true";
    }else{
        echo "false";
    }
}
function getMsg(){
    $myfile = fopen("test.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("test.txt"));
    fclose($myfile);
}
function getOnline(){
    $myfile = fopen("test2.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("test.txt"));
    fclose($myfile);
}
function sendMsg(){
    $msg = $_GET['con'];
    $time = $_GET['d'];
    
    $patterns = array();
    $patterns[0] = '/<:1:>/';
    $patterns[1] = '/<:2:>/';
    $patterns[2] = '/<:3:>/';
    $patterns[3] = '/<:4:>/';
    $patterns[4] = '/<:5:>/';
    $patterns[5] = '/<:6:>/';
    $patterns[6] = '/<:7:>/';
    $patterns[7] = '/<:8:>/';
    $patterns[8] = '/<:9:>/';
    $patterns[9] = '/<:10:>/';
    $replacements = array();
    $replacements[0] = "<img src='Images/1.gif' />";
    $replacements[1] = "<img src='Images/2.gif' />";
    $replacements[2] = "<img src='Images/3.gif' />";
    $replacements[3] = "<img src='Images/4.gif' />";
    $replacements[4] = "<img src='Images/5.gif' />";
    $replacements[5] = "<img src='Images/6.gif' />";
    $replacements[6] = "<img src='Images/7.gif' />";
    $replacements[7] = "<img src='Images/8.gif' />";
    $replacements[8] = "<img src='Images/9.gif' />";
    $replacements[9] = "<img src='Images/10.gif' />";
    $msg = preg_replace($patterns, $replacements, $msg);
    echo $msg;
    echo $time;
    
    $message = "<li>" . $_SESSION["user"] . "&nbsp;于&nbsp;" . $time . "&nbsp;说：" . $msg ."</li>";
    //$message ="<li>test2</li>";
        
    echo $message;
    $myfile = fopen("test.txt", "a") or die("Unable to open file!");
    
    fwrite($myfile, $message);
    fclose($myfile);
    echo "success";
    
}
function logout(){
    session_abort();
}

function resetdata(){
    $myfile = fopen("test.txt", "w") or die("Unable to open file!");
    $myfile2 = fopen("test2.txt", "w") or die("Unable to open file!");
    fwrite($myfile, " ");
    fwrite($myfile, " ");
    fclose($myfile);
    fclose($myfile2);
    echo "reset success";
}





