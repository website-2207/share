<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>定位中间页</title>
</head>
<body>
    <p>©刘端硕插件网2024·识别网页样式跳转 </p>
    <?php
    // 获取当前URL
    $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    // 解析URL路径和查询字符串
    $urlParts = parse_url($currentUrl);
    $path = $urlParts['path'];
    $queryParams = isset($urlParts['query']) ? $urlParts['query'] : '';

    // 提取 /ip 之前的字段 (即 a) 和 url= 后面的字符 (即 b)
    $a = substr($path, 0, strpos($path, 'ip.php'));
    parse_str($queryParams, $queryArray);
    $b = isset($queryArray['start']) ? $queryArray['start'] : '';

    // 生成新的URL
    if ($a && $b) {
        $newUrl = $a . $b;
        echo "<div>跳转中...</div>";
        echo "<script type='text/javascript'>
                setTimeout(function() {
                    window.location.href = '$newUrl';
                }, 300); // 0.5秒延迟
              </script>";
    } else {
        echo "无法与服务器取得联系(code:300)";
    }
    ?>
</body>
</html>
