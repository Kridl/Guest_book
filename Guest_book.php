<?php
    session_start();
    require_once __DIR__ . '/php_functional/db.php';
    require_once __DIR__ . '/php_functional/funcs.php';

    if(empty($_SESSION['user'])){
        header('Location: http://'.$_SERVER['SERVER_NAME'].'/index.php');
    }

    if(isset($_POST['add'])){
        save_message();
        header("Location: http://".$_SERVER['SERVER_NAME']."/Guest_book.php");
        die;
    }

    if(isset($_GET['do']) && $_GET['do'] == 'exit'){
        if(!empty($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        header("Location: http://".$_SERVER['SERVER_NAME']."/index.php");
        die;
    }
    $messeges = get_messages();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body{
            background-color: #4c4c4c;
            color: white;
        }
        .alert:before{
            content: "";
            position: absolute;
            border: 8px solid transparent;
            border-bottom: 12px solid #d4edda;
            top: -20px;
            left: 0.4px;
        }
        .alert{
            display: inline-block;
        }
    </style>
    <title>Гостевая книга</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <?php if(!empty($messeges)): ?>
                    <?php foreach($messeges as $messege):?>
                    <div class="badge badge-warning badge-pill"><?=htmlspecialchars(trim($messege['login']))?> <a><?=$messege['created_at']?></a></div><br>
                    <div class="alert alert-success mt-3 p-1"><?=nl2br(htmlspecialchars(trim($messege['message'])))?></div><br>
                    <?php endforeach;?>
                    <?php endif;?>
                    <form action="Guest_book.php" method="post">
                        <div class="form-group">
                            <small>Введите сообщение:</small>
                            <textarea name="message" id="from" rows="3" class="form-control"></textarea>
                            <button class="btn btn-success mt-3" name="add" type="submit">Отправить</button>
                            <p>Добро пожаловать, <?= htmlspecialchars($_SESSION['user']['name']) ?>! <a href="?do=exit">Log out</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>