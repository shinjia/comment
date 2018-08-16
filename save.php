<?php
$nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
$comment  = isset($_POST['comment'])  ? $_POST['comment']  : '';

// 設定存檔的檔名
// $filename = 'data.txt';
$filename = 'save/data_' . date('Ymd', time()) . '.txt';  // 每日存成不同的檔案


$today = date('Y-m-d H:i:s', time());

// 設定存檔的內容
$data = <<< HEREDOC
時間：{$today}
姓名：{$nickname}
意見：{$comment}
-------------------------------------------------

HEREDOC;


// 存檔 (方法一)
// file_put_contents($filename, $data, FILE_APPEND);


// 存檔 (方法二)
$old = file_get_contents($filename);
$new = $data . $old;
file_put_contents($filename, $new);


// 寄出mail
// 注意，要在Apache裡設定php.ini中的SMTP及SMTP_FROM兩個參數
// mail('sss@hinet.net', 'hello', $data);   // 寄出通知


// for demo
$file_para = 'data_' . date('Ymd', time());


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Comment</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
<p>謝謝，已經收到您的意見!!!</p>
<hr />
<p>此處供測試檢查之用：<input type="button" value="查看存檔的內容" onclick="show_text();"></p>

<div id="show_area"></div>
<script>
function show_text()
{
    document.getElementById('show_area').innerHTML = '<iframe src="showtext.php?par={$file_para}" width="100%" height="300"></iframe>';
}
</script>
</head>

</body>
</html>
HEREDOC;

echo $html;
?>