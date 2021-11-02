<?php
    require_once 'funcs.php';
    if (!empty($_POST)) {
        save_mess();
        header("Location:{$_SERVER ['PHP_SELF']}");
        exit;
    }
        $messages = get_mess();
        print_arr($messages);

    var_dump($_FILES);
    if (!empty($_FILES)) {
        $uploaded = $_FILES['newimage'];
        if ($uploaded['error'] == 0) {
            move_uploaded_file(
                $uploaded['tmp_name'],
                __DIR__ . '/images/test.png');
        }
    }
?>
<html>
    <head>
        <title>Гостевая книга</title>
    </head>
    <body>
        <div style="text-align:center;">
            <h1>.:: Гостевая книга ::.</h1>
        </div>
        <form action = "guest_book.php" method = "post" enctype="multipart/form-data">
            <table width="450" cellpadding="5" cellspacing="0" style="border: 2px solid darkblue;" bgcolor="#00fa9a">
                <tbody>
                <tr>
                    <td style="text-align:right">
                    </td>
                        <td style="text-align:left">
                        <br> Имя:<input type ="text" name ="name">
                        <br>Сообщение:<input type = "text" name ="text">
                        <br>фото:<input type="file" name="newimage">
                        <br><input type = "submit" name="отправить">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
        <hr>
        <?php if(!empty($messages)): ?>
            <?php foreach($messages as $message):?>
                <?php $message = get_format_message($message);?>
                <div class= "messages">
                    <hr>
                    <br>  Дата: <?=$message[2] ?> |Автор: <?=$message[0] ?> - <?=$message[1]?>
                    <hr>
                </div
            <?php endforeach; ?>
        <?php endif ?>
    </body>
</html>


