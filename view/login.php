<?php
Session::yes('admin', '/');
if(isset($_POST['email']) && isset($_POST['password'])){
    $ch = DBC::select('users', 'email', $_POST['email']);
    if($ch['password']==md5($_POST['password'])){
        Session::new('admin', $ch['id']);
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
	<title>Dompet : Авторизация</title>
	
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
                                    <h4 class="text-center mb-4">Авторизация</h4>
                                    <form action="/login" method="post">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="Ваша почта...">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Пароль</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Ваш пароль...">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1">Запомнить меня</label>
												</div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-block">Войти</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Нету акаунта? <a class="text-primary" href="/register">Регистрация</a></p>
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