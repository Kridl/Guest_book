<?php
    function debug($data)
    {
        echo '<pre>' . print_r($data, 1) . '</pre>';
    }

    function sign_up(): bool
    {
        global $connect;

        $login = !empty($_POST['login']) ? trim($_POST['login']) : '';
        $password = !empty($_POST['password']) ? trim($_POST['password']) : '';
        if(empty($login) || empty($password)){
            $_SESSION['errors'] = 'Заполните поля логин или пароль';
            return false;
        }

        $res = $connect->prepare("SELECT COUNT(*) FROM testUsers WHERE login = ? ");
        $res->execute([$login]);

        if($res->fetchColumn()){
            $_SESSION['errors'] = 'Данное имя уже используеться';
            return false;
        }

        $password = hash("sha256", $password);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $res = $connect->prepare("INSERT INTO testUsers (login, password) VALUES (?,?)");
        if($res->execute([$login, $password])){
            return true;
        } else{
            $_SESSION['errors'] = 'Ошибка при резистрации'; 
            return false;
        }
    }
    function sign_in(): bool
    {
        global $connect;

        $login = !empty($_POST['login']) ? trim($_POST['login']) : '';
        $password = !empty($_POST['password']) ? trim($_POST['password']) : '';

        if(empty($login) || empty($password)){
            $_SESSION['errors'] = 'Заполните поля логин или пароль';
            return false;
        }

        $res = $connect->prepare("SELECT * FROM testUsers WHERE login = ?");
        $res->execute([$login]);

        if(!$user = $res->fetch()){
            $_SESSION['errors'] = "Неверный логин или пароль";
            return false;
        }

        $password = hash("sha256", $password);
        if(!password_verify($password, $user['password'])){
            $_SESSION['errors'] = 'Неверный логин или пароль ';
            return false;
        }else{
            $_SESSION['user']['login'] = $user['login'];
            return true;
        }

    }

    function save_message(): bool
    {
        global $connect;
        $message =  !empty($_POST['message']) ? trim($_POST['message']) : '';

        if(!isset($_SESSION['user']['login'])){
            $_SESSION['errors'] = 'Необходимо авториговаться';
            return false;
        }

        if(empty($message)){
            $_SESSION['errors'] = 'Введите текст сообщения';
            return false;
        }

        $res = $connect->prepare("INSERT INTO messages (login,message) VALUES (?,?)");
        if($res->execute([$_SESSION['user']['login'], $message])){
            return true;
        }else{
            $_SESSION['errors'] = 'Ошибка отправки, попробуйте ещё раз.';
            return false;
        }
    }
    function get_messages(): array
    {
        global $connect;

        $res = $connect->query("SELECT * FROM messages ");
        return $res->fetchAll();
    }
?>