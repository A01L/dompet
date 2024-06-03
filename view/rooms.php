<?php
if(isset($_POST['title']) && isset($_POST['price'])){
    $data['title'] = $_POST['title'];
    $data['uid'] = $_SESSION['admin']['id'];
    $data['price'] = $_POST['price'];
    DBC::insert('rooms', $data);
    Router::redirect('/rooms');
}
elseif(isset($_GET['dell'])){
    DBC::delete('rooms', 'id', $_GET['dell']);
    Router::redirect('/rooms');
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
	<title>Dompet : Комнаты</title>
	
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Комнаты</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Добавить Комнату</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="/rooms" method="post">

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Наименование</label>
                                                <input type="text" name="title" class="form-control" placeholder="Корпус, этаж, комната...">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Наценка (за месяц)</label>
                                                <input type="text" name="price" class="form-control" placeholder="Пример: 20000" >
                                            </div>
                                        </div>
                                        <button class="btn btn-primary">Добавить в базу</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Список комнат</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>Объект</strong></th>
                                                <th><strong>Наценка</strong></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rentors = DBC::select('rooms', 'uid', $_SESSION['admin']['id'],1);
                                            foreach($rentors as $row){
                                                ?>
                                                    <tr>
                                                        <td><strong><?=$row['id']?></strong></td>
                                                        <td><?=$row['title']?></td>
                                                        <td><?=$row['price']?>/м</td>
                                                        
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="?dell=<?=$row['id']?>">Удалить из базы</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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