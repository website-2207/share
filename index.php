<?php
// 获取当前目录的文件列表
$files = scandir(__DIR__);

// 查找名为 "file" 的文件
foreach ($files as $file) {
    $fileName = pathinfo($file, PATHINFO_FILENAME);
    if ($fileName === 'file') {
        // 如果找到了，进行重定向
        header("Location: $file");
        exit;
    }
}

// 如果没有找到文件，输出错误信息
echo "未找到文件";
?>
