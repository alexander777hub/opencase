<?php 
    if(isset($_FILES['file'])) {
        $fileName = $_FILES['file']['name'];
    
        echo 'Файл: ' . $fileName . '<br>';
    
        //Загрузка файла на сервер
        $uploadDir = Yii::getAlias('@web') . '/uploads/profile/photo'; //Директория на сервере, для загружаемых файлов
    
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir . $fileName)) {
            echo 'Файл успешно загружен на сервер.<br>';
        } else {
            echo 'Загрузка файла не удалась!<br>';
            var_dump($_FILES);
        }
    }
?> 
