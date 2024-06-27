<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDir = "./";

    function generateRandomName($targetDir) {
        $exists = true;
        $folderName = "";
        while ($exists) {
            $folderName = generateRandomString(4);
            if (!file_exists($targetDir . $folderName)) {
                $exists = false;
            }
        }
        return $folderName;
    }

function generateRandomString($length = 4) {
    $characters = '01234567890123456789012345678901234567898888888888880000000000111111111222222233333333';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


    if (isset($_FILES["fileToUpload"])) {
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $extension = end($temp);
        $newfilename = "file." . $extension;
        $uploadOk = 1;

        $folderName = generateRandomName($targetDir);

        $newDir = $targetDir . $folderName . "/";
        if (!file_exists($newDir)) {
            mkdir($newDir, 0777, true);
        }

        $targetFilePath = $newDir . $newfilename;

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
            $sourceIndexFile = "index.php";
            $destinationIndexFile = $newDir . "index.php";
            copy($sourceIndexFile, $destinationIndexFile);
            echo $folderName; // 返回随机文件夹名称给前端页面
        } else {
            echo "文件上传失败";
        }
    }
}
?>
