<?php
$GLOBALS["var1"] = "<li>test</li>";
// $var = &$GLOBALS["var1"];
// echo $var;
//print_r($GLOBALS);
echo $GLOBALS['var1']; //输出1
if ($GLOBALS["var1"] != null){
    // $app["msg"] .= "<li>" . $_SESSION["user"] . "&nbsp;于&nbsp;" . $time . "&nbsp;说：" . $msg + "</li>";
    $GLOBALS["var1"] .="<li>test233</li>";
}else{
    //$app["msg"] = "<li>" . $_SESSION["user"] . "&nbsp;于&nbsp;" . $time . "&nbsp;说：" . $msg + "</li>";
    $GLOBALS["var1"] ="<li>test2</li>";
}
print_r($GLOBALS["var1"]);
echo "success";

// $myfile = fopen("test.txt", "w") or die("Unable to open file!");;
// $txt = "Bill Gates\n";
// fwrite($myfile, $txt);
// $txt = "Steve Jobs\n";
// fwrite($myfile, $txt);
// fclose($myfile);

// $myfile = fopen("test.txt", "r") or die("Unable to open file!");;

// echo fread($myfile,filesize("test.txt"));
// fclose($myfile);
$msg="ww<:1:><:2:>ww";
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
