<?php
if(isset($_POST['name']) && isset($_POST['email'])){
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    if(isset($_POST['password'])){
        $data['password'] = md5($_POST['password']);
    }
    DBC::update('users', $data, $_SESSION['admin']['id']);
    Router::redirect('/profile');
}
?>
<!DOCTYPE html>
<html lang="en">

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
	<title>Dompet : Профиль</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <!-- Custom Stylesheet -->
	<link href="public/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
		   <span style="--i:1">d</span>
		   <span style="--i:2">o</span>
		   <span style="--i:3">m</span>
		   <span style="--i:4">p</span>
		   <span style="--i:5">e</span>
		   <span style="--i:6">t</span>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

    <?php
		require_once "view/block/nav.php";
		?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Приложение</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Профиль</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Учетная запись</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="/profile" method="post">

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">ФИО</label>
                                                <input type="text" name="name" class="form-control" placeholder="Ваш ФИО" value="<?=DBC::select('users','id',$_SESSION['admin']['id'],0,'name')?>">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Ваша почта" value="<?=DBC::select('users','id',$_SESSION['admin']['id'],0,'email')?>">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Новый пароль</label>
                                                <input type="password" name="password" class="form-control" placeholder="Обновить пароль">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Телефон</label>
                                                <input type="text" name="phone" class="form-control" placeholder="Пример: +77070707700" value="<?=DBC::select('users','id',$_SESSION['admin']['id'],0,'phone')?>">
                                            </div>
                                        </div>
                                        <button class="btn btn-primary">Сохранить данные</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank"> Маздубай Али</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="public/./vendor/global/global.min.js"></script>
	<script src="public/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
    <script src="public/./js/custom.min.js"></script>
	<script src="public/./js/dlabnav-init.js"></script>
	
    
</body>
</html>