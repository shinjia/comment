<?php
$par = isset($_GET['par']) ? $_GET['par'] : '';

$filename = 'save/' . $par . '.txt';

if(!file_exists($filename))
{
    $content = 'file (' . $filename . ')not found!';
}
else
{
    $content = htmlspecialchars(file_get_contents($filename));
}


$html = <<<HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Comment</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<pre>
{$content}
</pre>
</body>
</html>
HEREDOC;

echo $html;
?>