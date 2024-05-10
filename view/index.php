<?php
Session::not('admin', '/login');
if(isset($_GET['type'])){
	$data['uid']=$_SESSION['admin']['id'];
	$data['type']=$_GET['type'];
	$data['title']=$_POST['title'];
	$data['depo']=$_POST['depo'];
	$data['source']=$_POST['source'];
	$data['summa']=$_POST['summa'];
	$data['date']=date("Y/m/d H:i");
	DBC::insert('transactions', $data);

	$summa = DBC::select('users', 'id', $_SESSION['admin']['id'],0,$_POST['depo']);
	if($_GET['type']=='minus'){
		$new[$_POST['depo']] = $summa-intval($_POST['summa']);
	}
	else{
		$new[$_POST['depo']] = $summa+intval($_POST['summa']);
	}

	DBC::update('users', $new, $_SESSION['admin']['id']);
	Router::redirect('/');
}

elseif(isset($_GET['report'])){
	$fileName = 'report.txt';
	header('Content-Type: text/html; charset=utf-8');
	$transaction = DBC::select('transactions', 'uid', $_SESSION['admin']['id'],1);
	$fileContent = 'Отчет от '.date("Y/m/d")."\n ";
	foreach($transaction as $row){
		$fileContent .= $row['id']." | ".$row['title']." | ".$row['depo']." | ".($row['source']=='Другое'?'Другое':DBC::select('rentors','id',$row['source'],0,'name'))." | ".$row['summa']." | ".$row['type']." | ".$row['date']." \n ";
	}

	// Создаем файл и записываем в него содержимое
	if (file_put_contents($fileName, $fileContent) !== false) {
		// Устанавливаем заголовки для скачивания файла
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($fileName));
		readfile($fileName);
	}
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
	<title>Dompet : Главная</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
	
	<link href="public/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link rel="stylesheet" href="public/vendor/nouislider/nouislider.min.css">
	<!-- Style css -->
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
            <!-- row -->
			<div class="container-fluid">
				<div class="row invoice-card-row">
					<div class="col-xl-3 col-xxl-6 col-sm-6">
						<div class="card bg-warning invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									<svg  width="33px" height="32px">
									<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
									 d="M31.963,30.931 C31.818,31.160 31.609,31.342 31.363,31.455 C31.175,31.538 30.972,31.582 30.767,31.583 C30.429,31.583 30.102,31.463 29.845,31.243 L25.802,27.786 L21.758,31.243 C21.502,31.463 21.175,31.583 20.837,31.583 C20.498,31.583 20.172,31.463 19.915,31.243 L15.872,27.786 L11.829,31.243 C11.622,31.420 11.370,31.534 11.101,31.572 C10.832,31.609 10.558,31.569 10.311,31.455 C10.065,31.342 9.857,31.160 9.710,30.931 C9.565,30.703 9.488,30.437 9.488,30.167 L9.488,17.416 L2.395,17.416 C2.019,17.416 1.658,17.267 1.392,17.001 C1.126,16.736 0.976,16.375 0.976,16.000 L0.976,6.083 C0.976,4.580 1.574,3.139 2.639,2.076 C3.703,1.014 5.146,0.417 6.651,0.417 L26.511,0.417 C28.016,0.417 29.459,1.014 30.524,2.076 C31.588,3.139 32.186,4.580 32.186,6.083 L32.186,30.167 C32.186,30.437 32.109,30.703 31.963,30.931 ZM9.488,6.083 C9.488,5.332 9.189,4.611 8.657,4.080 C8.125,3.548 7.403,3.250 6.651,3.250 C5.898,3.250 5.177,3.548 4.645,4.080 C4.113,4.611 3.814,5.332 3.814,6.083 L3.814,14.583 L9.488,14.583 L9.488,6.083 ZM29.348,6.083 C29.348,5.332 29.050,4.611 28.517,4.080 C27.985,3.548 27.263,3.250 26.511,3.250 L11.559,3.250 C12.059,4.111 12.324,5.088 12.325,6.083 L12.325,27.092 L14.950,24.840 C15.207,24.620 15.534,24.500 15.872,24.500 C16.210,24.500 16.537,24.620 16.794,24.840 L20.837,28.296 L24.880,24.840 C25.137,24.620 25.463,24.500 25.802,24.500 C26.140,24.500 26.467,24.620 26.724,24.840 L29.348,27.092 L29.348,6.083 ZM25.092,20.250 L16.581,20.250 C16.205,20.250 15.844,20.101 15.578,19.835 C15.312,19.569 15.162,19.209 15.162,18.833 C15.162,18.457 15.312,18.097 15.578,17.831 C15.844,17.566 16.205,17.416 16.581,17.416 L25.092,17.416 C25.469,17.416 25.829,17.566 26.096,17.831 C26.362,18.097 26.511,18.457 26.511,18.833 C26.511,19.209 26.362,19.569 26.096,19.835 C25.829,20.101 25.469,20.250 25.092,20.250 ZM25.092,14.583 L16.581,14.583 C16.205,14.583 15.844,14.434 15.578,14.168 C15.312,13.903 15.162,13.542 15.162,13.167 C15.162,12.791 15.312,12.430 15.578,12.165 C15.844,11.899 16.205,11.750 16.581,11.750 L25.092,11.750 C25.469,11.750 25.829,11.899 26.096,12.165 C26.362,12.430 26.511,12.791 26.511,13.167 C26.511,13.542 26.362,13.903 26.096,14.168 C25.829,14.434 25.469,14.583 25.092,14.583 ZM25.092,8.916 L16.581,8.916 C16.205,8.916 15.844,8.767 15.578,8.501 C15.312,8.236 15.162,7.875 15.162,7.500 C15.162,7.124 15.312,6.764 15.578,6.498 C15.844,6.232 16.205,6.083 16.581,6.083 L25.092,6.083 C25.469,6.083 25.829,6.232 26.096,6.498 C26.362,6.764 26.511,7.124 26.511,7.500 C26.511,7.875 26.362,8.236 26.096,8.501 C25.829,8.767 25.469,8.916 25.092,8.916 Z"/>
									</svg>
								</div>
								<div>
									<h2 class="text-white invoice-num">
										<?=DBC::count('transactions', ['uid'=>$_SESSION['admin']['id'], 'type'=>'minus'])?></h2>
									<span class="text-white fs-18">Расходы</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-6 col-sm-6">
						<div class="card bg-success invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									<svg width="35px" height="34px">
									<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
									 d="M32.482,9.730 C31.092,6.789 28.892,4.319 26.120,2.586 C22.265,0.183 17.698,-0.580 13.271,0.442 C8.843,1.458 5.074,4.140 2.668,7.990 C0.255,11.840 -0.509,16.394 0.514,20.822 C1.538,25.244 4.224,29.008 8.072,31.411 C10.785,33.104 13.896,34.000 17.080,34.000 L17.286,34.000 C20.456,33.960 23.541,33.044 26.213,31.358 C26.991,30.866 27.217,29.844 26.725,29.067 C26.234,28.291 25.210,28.065 24.432,28.556 C22.285,29.917 19.799,30.654 17.246,30.687 C14.627,30.720 12.067,29.997 9.834,28.609 C6.730,26.671 4.569,23.644 3.752,20.085 C2.934,16.527 3.546,12.863 5.486,9.763 C9.488,3.370 17.957,1.418 24.359,5.414 C26.592,6.808 28.360,8.793 29.477,11.157 C30.568,13.460 30.993,16.016 30.707,18.539 C30.607,19.448 31.259,20.271 32.177,20.371 C33.087,20.470 33.911,19.820 34.011,18.904 C34.363,15.764 33.832,12.591 32.482,9.730 L32.482,9.730 Z"/>
									<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
									 d="M22.593,11.237 L14.575,19.244 L11.604,16.277 C10.952,15.626 9.902,15.626 9.250,16.277 C8.599,16.927 8.599,17.976 9.250,18.627 L13.399,22.770 C13.725,23.095 14.150,23.254 14.575,23.254 C15.001,23.254 15.427,23.095 15.753,22.770 L24.940,13.588 C25.592,12.937 25.592,11.888 24.940,11.237 C24.289,10.593 23.238,10.593 22.593,11.237 L22.593,11.237 Z"/>
									</svg>
								</div>
								<div>
									<h2 class="text-white invoice-num"><?=DBC::count('transactions', ['uid'=>$_SESSION['admin']['id'], 'type'=>'plus'])?></h2>
									<span class="text-white fs-18">Приходы</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-9 col-xxl-12">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-xl-6">
										<div class="card-bx bg-blue">
											<img class="pattern-img" src="public/images/pattern/pattern6.png" alt="">
											<div class="card-info text-white">
												<img src="public/images/pattern/circle.png" class="mb-4" alt="">
												<h2 class="text-white card-balance"><?=intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'main'))+intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'comn'))+intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'pool'))?> ₸</h2>
												<p class="fs-16">Общий депозит</p>
												<span>+0,8% коефицент</span>
											</div>
											<a class="change-btn" href="javascript:void(0); window.location.reload(true);"><i class="fa fa-caret-up up-ico"></i>Обновить<span class="reload-icon"><i class="fa fa-refresh reload active"></i></span></a>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="row  mt-xl-0 mt-4">
											<div class="col-md-6">
												<h4 class="card-title">Статистика</h4>
												<span>Диограмма по всем депозитам и счетам, расходам. </span>
												<?php
												$main = intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'main'));
												$comn = intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'comn'));
												$pool = intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'pool'));
												$all = $main+$comn+$pool;
												?>
												<ul class="card-list mt-4">
													<li><span class="bg-blue circle"></span>Мой депозит<span><?=round($main/($all/100))?>%</span></li>
													<li><span class="bg-success circle"></span>Комуналка<span><?=round($comn/($all/100))?>%</span></li>
													<li><span class="bg-warning circle"></span>Фин. подушка<span><?=round($pool/($all/100))?>%</span></li>
												</ul>
											</div>
											<div class="col-md-6">
												<canvas id="polarChart"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Форма прихода</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="?type=plus">

                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Наименование</label>
                                                <input type="text" name="title" class="form-control" placeholder="Краткое описание...">
                                            </div>
											<div class="mb-3 col-md-6">
												<label class="form-label">Депозит</label>
												<select name="depo" class="default-select form-control wide" style="display: none;">
													<option value="main">Мой депозит</option>
													<option value="pool">Фин. подушка</option>
													<option value="comn">Комуналка</option>
												</select>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label">Источник</label>
												<select name="source" class="default-select form-control wide" style="display: none;">
													<option value="Другое">Другое</option>
													<?php
													$rentors = DBC::select('rentors', 'uid', $_SESSION['admin']['id'],1);
													foreach($rentors as $row){
														?>
															<option value="<?=$row['id']?>"><?=$row['name']?></option>
														<?php
													}
													?>
												</select>
											</div>

											<div class="mb-3 col-md-12">
                                                <label class="form-label">Сумма</label>
                                                <input type="number" name="summa" class="form-control" placeholder="00.0">
                                            </div>

										</div>
                                        <button class="btn btn-primary mt-3 col-md-12">Записать приход</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>

					<div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Форма Расхода</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="?type=minus">

                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Наименование</label>
                                                <input type="text" name="title" class="form-control" placeholder="Краткое описание...">
                                            </div>
											<div class="mb-3 col-md-6">
												<label class="form-label">Депозит</label>
												<select name="depo" class="default-select form-control wide" style="display: none;">
													<option value="main">Мой депозит</option>
													<option value="pool">Фин. подушка</option>
													<option value="comn">Комуналка</option>
												</select>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label">Источник</label>
												<select name="source" class="default-select form-control wide" style="display: none;">
													<option value="Другое">Другое</option>
													<?php
													$rentors = DBC::select('rentors', 'uid', $_SESSION['admin']['id'],1);
													foreach($rentors as $row){
														?>
															<option value="<?=$row['id']?>"><?=$row['name']?></option>
														<?php
													}
													?>
												</select>
											</div>

											<div class="mb-3 col-md-12">
                                                <label class="form-label">Сумма</label>
                                                <input type="number" name="summa" class="form-control" placeholder="00.0">
                                            </div>

										</div>
                                        <button class="btn btn-primary mt-3 col-md-12">Записать расход</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-xl-12">
								<div class="card coin-card">
									<div class="card-body d-sm-flex d-block align-items-center">
										<span class="coin-icon">
											<svg width="38" height="41" viewBox="0 0 38 41" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g><path d="M14.0413 32.5832C15.7416 32.5934 17.4269 32.2659 18.9997 31.6199C20.5708 32.2714 22.2572 32.5991 23.958 32.5832C29.1218 32.5832 33.1663 29.8278 33.1663 26.3088V20.441C33.1663 16.922 29.1218 14.1666 23.958 14.1666C23.7186 14.1666 23.4834 14.1779 23.2497 14.1906V7.55498C23.2497 4.10823 19.2051 1.41656 14.0413 1.41656C8.87759 1.41656 4.83301 4.10823 4.83301 7.55498V26.4448C4.83301 29.8916 8.87759 32.5832 14.0413 32.5832ZM30.333 26.3088C30.333 27.9366 27.715 29.7499 23.958 29.7499C20.201 29.7499 17.583 27.9366 17.583 26.3088V24.9984C19.5015 26.1652 21.7131 26.7604 23.958 26.714C26.203 26.7604 28.4145 26.1652 30.333 24.9984V26.3088ZM23.958 16.9999C27.715 16.9999 30.333 18.8132 30.333 20.441C30.333 22.0687 27.715 23.8807 23.958 23.8807C20.201 23.8807 17.583 22.0673 17.583 20.441C17.583 18.8147 20.201 16.9999 23.958 16.9999ZM14.0413 4.2499C17.7983 4.2499 20.4163 5.9924 20.4163 7.55498C20.4163 9.11757 17.7983 10.8615 14.0413 10.8615C10.2843 10.8615 7.66634 9.11898 7.66634 7.55498C7.66634 5.99098 10.2843 4.2499 14.0413 4.2499ZM7.66634 12.0161C9.59282 13.1601 11.8012 13.7417 14.0413 13.6948C16.2814 13.7417 18.4899 13.1601 20.4163 12.0161V14.6341C18.8724 15.0232 17.4565 15.8078 16.308 16.9107C15.5631 17.0718 14.8034 17.1545 14.0413 17.1572C10.2843 17.1572 7.66634 15.4146 7.66634 13.8521V12.0161ZM7.66634 18.3132C9.59323 19.4561 11.8015 20.0371 14.0413 19.9905C14.2935 19.9905 14.5372 19.9593 14.7851 19.9466C14.764 20.1106 14.7522 20.2756 14.7497 20.441V23.3947C14.5117 23.4089 14.2822 23.4542 14.0413 23.4542C10.2843 23.4542 7.66634 21.7117 7.66634 20.1477V18.3132ZM7.66634 24.6088C9.59282 25.7529 11.8012 26.3344 14.0413 26.2876C14.2793 26.2876 14.5131 26.2692 14.7497 26.2578V26.3088C14.7699 27.5148 15.2334 28.6711 16.0516 29.5572C15.3887 29.6824 14.7159 29.7469 14.0413 29.7499C10.2843 29.7499 7.66634 28.0074 7.66634 26.4448V24.6088Z" fill="#fff"></path></g>
											</svg>
										</span>
										<div>
											<h3 class="text-white">Список всех транзакции</h3>
											<p>Список всех финансовых операции в одном странице.</p>
											<a class="text-white" href="/transaction">Транзакции >></a>
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

		


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="public/./vendor/global/global.min.js"></script>
	<script src="public/./vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="public/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="public/./vendor/apexchart/apexchart.js"></script>
	<script src="public/./vendor/nouislider/nouislider.min.js"></script>
	<script src="public/./vendor/wnumb/wNumb.js"></script>
	
	<!-- Dashboard 1 -->
	<script>
		

(function($) {
    /* "use strict" */
	
 var dlabChartlist = function(){
	
	var screenWidth = $(window).width();	
	
	var chartBar = function(){
		
		var options = {
			  series: [
				{
					name: 'Income',
					data: [50, 18, 70, 40],
					//radius: 12,	
				}, 
				{
				  name: 'Outcome',
				  data: [80, 40, 55, 20]
				}, 
				
			],
				chart: {
				type: 'bar',
				height: 200,
				
				toolbar: {
					show: false,
				},
				
			},
			plotOptions: {
			  bar: {
				horizontal: false,
				columnWidth: '57%',
				borderRadius:12
			  },
			  
			},
			states: {
			  hover: {
				filter: 'none',
			  }
			},
			colors:['#80ec67', '#fe7d65'],
			dataLabels: {
			  enabled: false,
			},
			markers: {
		shape: "circle",
		},
		
		
			legend: {
				position: 'top',
				horizontalAlign: 'right', 
				show: false,
				fontSize: '12px',
				labels: {
					colors: '#000000',
					
					},
				markers: {
				width: 18,
				height: 18,
				strokeWidth: 0,
				strokeColor: '#fff',
				fillColors: undefined,
				radius: 12,	
				}
			},
			stroke: {
			  show: true,
			  width: 4,
			  colors: ['transparent']
			},
			grid: {
				borderColor: '#eee',
			},
			xaxis: {
				
			  categories: ['Sun', 'Mon', 'Tue', 'Wed'],
			  labels: {
			   style: {
				  colors: '#3e4954',
				  fontSize: '13px',
				  fontFamily: 'poppins',
				  fontWeight: 400,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
			  show: false,
			  }
			},
			yaxis: {
				labels: {
					offsetX:-16,
				   style: {
					  colors: '#3e4954',
					  fontSize: '13px',
					   fontFamily: 'poppins',
					  fontWeight: 400,
					  cssClass: 'apexcharts-xaxis-label',
				  },
			  },
			},
			fill: {
			  opacity: 1,
			  colors:['#80ec67', '#fe7d65'],
			},
			tooltip: {
			  y: {
				formatter: function (val) {
				  return "$ " + val + " thousands"
				}
			  }
			},
			responsive: [{
				breakpoint: 1600,
				options: {
					chart: {
						height: 400,
					}
				},
			},
			{
				breakpoint: 575,
				options: {
					chart: {
						height: 250,
					}
				},
			}]
			};

			var chartBar1 = new ApexCharts(document.querySelector("#chartBar"), options);
			chartBar1.render();
	}	
	
	var chartBar2 = function(){
		
		var options = {
			  series: [
				{
					name: 'Income',
					data: [50, 18, 70, 40, 90, 50],
					//radius: 12,	
				}, 
				{
				  name: 'Outcome',
				  data: [80, 40, 55, 20, 50, 70]
				}, 
				
			],
				chart: {
				type: 'bar',
				height: 400,
				
				toolbar: {
					show: false,
				},
				
			},
			plotOptions: {
			  bar: {
				horizontal: false,
				columnWidth: '70%',
				borderRadius:10
			  },
			  
			},
			states: {
			  hover: {
				filter: 'none',
			  }
			},
			colors:['#80ec67', '#fe7d65'],
			dataLabels: {
			  enabled: false,
			},
			markers: {
		shape: "circle",
		},
		
		
			legend: {
				position: 'top',
				horizontalAlign: 'right', 
				show: false,
				fontSize: '12px',
				labels: {
					colors: '#000000',
					
					},
				markers: {
				width: 18,
				height: 18,
				strokeWidth: 0,
				strokeColor: '#fff',
				fillColors: undefined,
				radius: 12,	
				}
			},
			stroke: {
			  show: true,
			  width: 5,
			  colors: ['transparent']
			},
			grid: {
				borderColor: '#eee',
			},
			xaxis: {
				
			  categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
			  labels: {
			   style: {
				  colors: '#3e4954',
				  fontSize: '13px',
				  fontFamily: 'poppins',
				  fontWeight: 400,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
			  show: false,
			  }
			},
			yaxis: {
				labels: {
					offsetX:-16,
				   style: {
					  colors: '#3e4954',
					  fontSize: '13px',
					   fontFamily: 'poppins',
					  fontWeight: 400,
					  cssClass: 'apexcharts-xaxis-label',
				  },
			  },
			},
			fill: {
			  opacity: 1,
			  colors:['#80ec67', '#fe7d65'],
			},
			tooltip: {
			  y: {
				formatter: function (val) {
				  return "$ " + val + " thousands"
				}
			  }
			},
			responsive: [{
				breakpoint: 575,
				options: {
					chart: {
						height: 250,
					}
				},
			}]
			};

			var chartBar1 = new ApexCharts(document.querySelector("#chartBar2"), options);
			chartBar1.render();
	}

	var polarChart = function(){
		 var ctx = document.getElementById("polarChart").getContext('2d');
			Chart.defaults.global.legend.display = false;
			var myChart = new Chart(ctx, {
				type: 'polarArea',
				data: {
					labels: ["Mon", "Tue", "Wed"],
					datasets: [{
						backgroundColor: [
							"#496ecc",
							"#68e365",
							"#ffa755"
						],
						data: [<?=round($main/($all/100))?>, <?=round($comn/($all/100))?>, <?=round($pool/($all/100))?>]
					}]
				},
				options: {
					maintainAspectRatio: false,
					scale: {
						scaleShowLine:false,
						display:false,
						 pointLabels:{
							fontSize: 0       
						 },
					},
					tooltips:{
						enabled:false,
					}
				}
			});
	}	
	
	var handleCard = function(){
		
		// Vars
		var reloadButton  = document.querySelector( '.change-btn' );
		var reloadIcon     = document.querySelector( '.reload' );
		var reloadEnabled = true;
		var rotation      = 0;
		// Events
		reloadButton.addEventListener('click', function() { reloadClick() });
		// Functions
		function reloadClick() {
		  reloadEnabled = false;
		  rotation += 360;
		  // Eh, this works.
		  reloadIcon.style.webkitTransform = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
		  reloadIcon.style.MozTransform  = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
		  reloadIcon.style.transform  = 'translateZ(0px) rotateZ( ' + rotation + 'deg )';
		}
		// Show button.
		setTimeout(function() {
		  reloadButton.classList.add('active');
		}, 1);
		
		//Number formatting
		var sliderFormat = document.getElementById('slider-format');
		noUiSlider.create(sliderFormat, {
			start: [20000],
			step: 1000,
			connect: [true, false],
			range: {
				'min': [20000],
				'max': [80000]
			},
			ariaFormat: wNumb({
				decimals: 3
			}),
			format: wNumb({
				decimals: 3,
				thousand: '.',
				//suffix: ' (US $)'
			})
		});

		var inputFormat = document.getElementById('input-format');
		sliderFormat.noUiSlider.on('update', function (values, handle) {
			inputFormat.value = values[handle];
		});

		inputFormat.addEventListener('change', function () {
			sliderFormat.noUiSlider.set(this.value);
		});
		//Number formatting ^
	}
 
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				
				chartBar();
				chartBar2();
				polarChart();
				handleCard();
			},
			
			resize:function(){
			}
		}
	
	}();

	
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dlabChartlist.load();
		}, 1000); 
		
	});

     

})(jQuery);
	</script>

    <script src="public/./js/custom.min.js"></script>
	<script src="public/./js/dlabnav-init.js"></script>
	
    
	
</body>
</html>