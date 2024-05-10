<?php
Session::yes('admin', '/');
if(isset($_POST['password']) && isset($_POST['email']) && isset($_POST['name'])){
    $data = array(
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'password'=>md5($_POST['password'])
    );

    $ch = DBC::select('users','email',$_POST['email'],0,'id');
    if(!$ch){
        DBC::insert('users',$data);
    }
    Router::redirect('/login');
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dompet : Payment Admin Template" />
	<meta property="og:title" content="Dompet : Payment Admin Template" />
	<meta property="og:description" content="Dompet : Payment Admin Template" />
	<meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Dompet : Регситрация</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="public/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="public/images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Регистрация</h4>
                                    <form action="/register" method="post">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>ФИО</strong></label>
                                            <input type="text" name="name" class="form-control" placeholder="Введите ваше ФИО">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="Введите вашу почту">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Пароль</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Введите новый пароль">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button class="btn btn-primary btn-block">Регистрация</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>У вас уже есть акаунт? <a class="text-primary" href="/login">Авторизация</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="public/./vendor/global/global.min.js"></script>
<script src="public/./js/custom.min.js"></script>
<script src="public/./js/dlabnav-init.js"></script>

</body>
</html>