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
	<title>Dompet : Транзакции</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <!-- Datatable -->
    <link href="public/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Основные</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Транзакции</a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Список транзакции</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Комментарий</th>
                                                <th>Депозит</th>
                                                <th>Источник</th>
												<th>Сумма</th>
												<th>Тип </th>
                                                <th>Дата</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $transaction = DBC::select('transactions', 'uid', $_SESSION['admin']['id'],1);
                                            foreach($transaction as $row){
                                                ?>
                                                    <tr>
                                                        <td><?=$row['id']?></td>
                                                        <td><?=$row['title']?></td>
                                                        <td><?php
                                                                if($row['depo']=='main'){
                                                                    echo 'М';
                                                                }
                                                                elseif($row['depo']=='comn'){
                                                                    echo 'К';
                                                                }
                                                                else{
                                                                    echo 'П';
                                                                }
                                                            ?></td>
                                                        <td><?=($row['source']=='Другое'?'Другое':DBC::select('rentors','id',$row['source'],0,'name'))?></td>
                                                        <td><?=$row['summa']?></td>
                                                        <td>
                                                            <?php
                                                            if($row['type']=='plus'){
                                                                ?>
                                                                    <span class="badge light badge-success">Приход</span>
                                                                <?
                                                            }
                                                            else{
                                                                ?>
                                                                    <span class="badge light badge-danger">Расход</span>
                                                                <?
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?=$row['date']?></td>
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
    <script src="public/./vendor/chart.js/Chart.bundle.min.js"></script>
	<!-- Apex Chart -->
	<script src="public/./vendor/apexchart/apexchart.js"></script>
	
    <!-- Datatable -->
    <script src="public/./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="public/./js/plugins-init/datatables.init.js"></script>

	<script src="public/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="public/./js/custom.min.js"></script>
	<script src="public/./js/dlabnav-init.js"></script>
	
    <?php
        if(isset($_GET['search'])){
            ?>
            <script>
                // Получаем элемент input по атрибуту aria-controls
                var inputElement = document.querySelector('input[aria-controls="example4"]');

                // Устанавливаем значение для элемента input
                inputElement.value = "<?=$_GET['search']?>";
                inputElement.focus();

            </script>
            <?
        }
        ?>
</body>
</html>