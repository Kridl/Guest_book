<?php
    // login="admin1" and "admin2", password=123
    error_reporting(-1);
    session_start();

    if(isset($_SESSION['user'])){
        header('Location: http://'.$_SERVER['SERVER_NAME'].'/Guest_book.php');
    }

    require_once __DIR__ . '/php_functional/db.php';
    require_once __DIR__ . '/php_functional/funcs.php';
    
    if(isset($_POST['auth'])){
        if(sign_in()){
            header("Location: http://".$_SERVER['SERVER_NAME']."/Guest_book.php");
            die;
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{
            background-color: #4c4c4c;
        }
    </style>
    <title>Гостевая книга</title>
</head>
<body>
    <div class="container">
        <div class="row my-3">
            <div class="col">
                <?php if(!empty($_SESSION['errors'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php
                        echo $_SESSION['errors'];
                        unset($_SESSION['errors']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <?php if(!empty($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="row mt-3">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-white">Авторизация</h3>
                </div>
            </div>

            <form action="index.php" method="post" class="row g-3">
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="login" class="form-control" id="floatingInput" placeholder="Имя">
                        <label for="floatingInput">Имя</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Пароль</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <button type="submit" name="auth" class="btn btn-primary">Войти</button>
                </div>
                <div class="col-md-6 offset-md-3 text-white">
                    Вы не зарегестрированны? Зарегичтрируйтесь -<a href="sign_up.php">перейти.</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>
</html>
