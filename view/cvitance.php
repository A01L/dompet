<?php
if(isset($_POST['name']) && isset($_POST['phone'])){
	$text = '
	Здраствуйте '.$_POST['name'].'!
	Ваша квитанция по '.$_POST['addres'].'.
	Электричество: '.$_POST['elec'].' тг.
	Вода: '.$_POST['water'].' тг. 
	Отопление: '.$_POST['worm'].' тг. 
	Домофон/камера: '.$_POST['secc'].' тг
	Итого: '.(intval($_POST['elec'])+intval($_POST['water'])+intval($_POST['worm'])+intval($_POST['secc']).' Тенге');
	$link = Gen::wame($_POST['phone'], $text);
	Router::redirect($link);
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
	<title>Dompet : Квитанция</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <!-- Form step -->
    <link href="public/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Документы</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Квитанция</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Генерация квитанции</h4>
                            </div>
                            <div class="card-body">
								<div id="smartwizard" class="form-wizard order-create sw sw-theme-default sw-justified">
									<ul class="nav nav-wizard">
										<li><a class="nav-link inactive active" href="#wizard_Service"> 
											<span>1</span> 
										</a></li>
										<li><a class="nav-link inactive" href="#wizard_Service">
											<span>2</span>
										</a></li>
									</ul>
									<div class="tab-content" style="height: 600.6px;">
										<form action="/cvitance" method="post">
											<div id="wizard_Service" class="tab-pane" role="tabpanel">
												<div class="row">
													<div class="col-lg-6 mb-2">
														<div class="mb-3">
															<label class="text-label form-label">ФИО*</label>
															<input type="text" name="name" class="form-control" placeholder="ФИО студента..." required="">
														</div>
													</div>
													<div class="col-lg-6 mb-2">
														<div class="mb-3">
															<label class="text-label form-label">Номер телефона*</label>
															<input type="text" name="phone" class="form-control" placeholder="+77070077077" required="">
														</div>
													</div>
													<div class="col-lg-12 mb-2">
														<div class="mb-3">
															<label class="text-label form-label">Адрес*</label>
															<input type="text" name="addres" class="form-control" placeholder="Адрес объекта..." required="">
														</div>
													</div>

													<div class="col-lg-6 mb-2">
														<div class="mb-3">
															<label class="text-label form-label">Электричество*</label>
															<input type="number" name="elec" class="form-control" placeholder="00.0" required="">
														</div>
													</div>
													<div class="col-lg-6 mb-2">
														<div class="mb-3">
															<label class="text-label form-label">Вода*</label>
															<input type="number" name="water" class="form-control" placeholder="00.0" required="">
														</div>
													</div>

													<div class="col-lg-6 mb-2">
														<div class="mb-3">
															<label class="text-label form-label">Отопление*</label>
															<input type="number" name="worm" class="form-control" placeholder="00.0" required="">
														</div>
													</div>
													<div class="col-lg-6 mb-2">
														<div class="mb-3">
															<label class="text-label form-label">Домофон/камера*</label>
															<input type="number" name="secc" class="form-control" placeholder="00.0" required="">
														</div>
													</div>
													<button class="btn btn-primary">Отправить квитанцию</button>
												</div>
											</div>
										</form>
									</div><div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;"><button class="btn btn-primary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-primary sw-btn-next" type="button">Next</button></div>
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

    <script src="public/./vendor/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="public/./vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="public/./js/plugins-init/jquery.validate-init.js"></script>


	<!-- Form Steps -->
	<script src="public/./vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
	<script src="public/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<script src="public/./js/custom.min.js"></script>
	<script src="public/./js/dlabnav-init.js"></script>
	
	<script>
		$(document).ready(function(){
			// SmartWizard initialize
			$('#smartwizard').smartWizard(); 
		});
	</script>

</body>
<style>
	.toolbar-bottom{
		display: none;
	}
</style>
</html>