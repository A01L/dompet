<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dompet : Payment Admin Template" />
	<meta property="og:title" content="Dompet : Payment Admin Template" />
	<meta property="og:description" content="Dompet : Payment Admin Template" />
	<meta property="og:image" content=""/>
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Dompet : Депозиты</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
	<link href="public/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="public/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
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
				<div class="row">
					<div class="col-xl-12">
						<div class="card-slider owl-carousel">
							<div class="items">
								<div class="card-bx bg-blue">
									<img class="pattern-img" src="public/images/pattern/pattern6.png" alt="">
									<div class="card-info text-white">
										<img src="public/images/pattern/circle.png" class="mb-4" alt="">
										<h2 class="text-white card-balance"><?=intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'main'))?> ₸</h2>
										<p class="fs-16">Мой депозит</p>
										<div class="d-flex align-items-end">
											<span>+0,8% Коефицент</span>
											<div class="me-5 ms-auto">
												<p class="fs-14 mb-1">ОБНОВЛЕНО</p>
												<span><?=date("Y/m/d")?></span>
											</div>
											<div>
												<p class="fs-14 mb-1">ВЛАДЕЛЕЦ</p>
												<span><?=DBC::select('users','id',$_SESSION['admin']['id'],0,'name')?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="items">
								<div class="card-bx bg-green mb-0">
									<img class="pattern-img" src="public/images/pattern/pattern9.png" alt="">
									<div class="card-info text-white">
										<div class="d-flex align-items-center">
											<div class="me-auto">
												<p class="mb-1">За коммуналку</p>
												<h2 class="fs-36 text-white mb-5"><?=intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'comn'))?> ₸</h2>
											</div>
											<img src="public/images/pattern/circle.png" class="mb-4" alt="">
										</div>
										<div class="d-flex">
											<div class="me-5">
												<p class="fs-14 mb-1">ОБНОВЛЕНО</p>
												<span><?=date("Y/m/d")?></span>
											</div>
											<div>
												<p class="fs-14 mb-1">ВЛАДЕЛЕЦ</p>
												<span><?=DBC::select('users','id',$_SESSION['admin']['id'],0,'name')?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="items">
								<div class="card-bx bg-purpel mb-0">
									<img class="pattern-img" src="public/images/pattern/pattern10.png" alt="">
									<div class="card-info text-white">
										<div class="d-flex align-items-center">
											<div class="me-auto">
												<p class="mb-1">Фин. подушка</p>
												<h2 class="fs-36 text-white mb-5"><?=intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'pool'))?> ₸</h2>
											</div>
											<img src="public/images/pattern/circle.png" class="mb-4" alt="">
										</div>
										<div class="d-flex">
											<div class="me-5">
												<p class="fs-14 mb-1">ОБНОВЛЕНО</p>
												<span><?=date("Y/m/d")?></span>
											</div>
											<div>
												<p class="fs-14 mb-1">ВЛАДЕЛЕЦ</p>
												<span><?=DBC::select('users','id',$_SESSION['admin']['id'],0,'name')?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
								<div class="card">
									<div class="card-header flex-wrap border-0 pb-0 align-items-end">
										<div class="mb-3 me-3">
											<h5 class="fs-20 text-black font-w500">Общий капитал</h5>
											<span class="text-num text-black fs-36 font-w500"><?=intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'pool'))+intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'main'))+intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'comn'))?> ₸</span>
										</div>
										<div class="me-3 mb-3">
											<p class="fs-14 mb-1">Обновлено</p>
											<span class="text-black fs-16"><?=date("Y/m/d")?></span>
										</div>
										<div class="me-3 mb-3">
											<p class="fs-14 mb-1">Владелец</p>
											<span class="text-black fs-16"><?=DBC::select('users','id',$_SESSION['admin']['id'],0,'name')?></span>
										</div>
										<span class="fs-20 text-black font-w500 me-3 mb-3">Мин: 5 миллион</span>
									</div>
									<div class="card-body">
										<div class="progress default-progress">
											<?php
											$all = intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'pool'))+intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'main'))+intval(DBC::select('users','id',$_SESSION['admin']['id'],0,'comn'));
											$one = round($all/(5000000/100));
											?>
											<div class="progress-bar bg-gradient-5 progress-animated" style="width: <?=($one>100?'100':$one)?>%; height:20px;" role="progressbar">
												<span class="sr-only"><?=($one>100?'100':$one)?>% Минимум</span>
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
	<script src="public/./vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="public/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="public/./vendor/owl-carousel/owl.carousel.js"></script>
	<script src="public/./js/dashboard/cards-center.js"></script>
    <script src="public/./js/custom.min.js"></script>
	<script src="public/./js/dlabnav-init.js"></script>
	
    
	<script>
		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				center:true,
				animateOut: 'fadeOut',
				animateIn: 'fadeIn',
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: false,
				navText: ['', ''],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:2
					},			
					991:{
						items:2
					},
					1200:{
						items:2
					},
					1600:{
						items:3
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		
	</script>
</body>
</html>