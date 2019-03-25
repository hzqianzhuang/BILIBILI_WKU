<?php
namespace app\index\controller;

$cid = $_GET['videoNumber'];

$command="python /Users/qianzhuang/Desktop/project/blbl.py ";
$command = $command.$cid;
echo exec($command);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
</head>

<body>
    <!--<input type="button" value="test" onclick="test()">-->
</div>

</body>
</html>