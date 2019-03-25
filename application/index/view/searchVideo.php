<?php

$file = '/Users/qianzhuang/Desktop/project/words_last2.txt';

$body = file($file);

$intention = array();
$polarity = array();
for ($j=0;$j<count($body);$j++) {
    $intention[$j] = substr($body[$j],0,1);
    $polarity[$j] = substr($body[$j],2,1);

}


$count = 0;
$count2 = 0;
$count3 = 0;
$count4 = 0;
$count5 = 0;
$count6 = 0;
$count7 = 0;
$count8 = 0;
$count9 = 0;
$count10 = 0;
$count11 = 0;
$count12 = 0;
$count13 = 0;
for ($j=0;$j<count($body);$j++) {
    $num = $intention[$j];
    switch ($num) {
        case "1":
            $count++;
            break;
        case "2":
            $count2++;
            break;
        case "3":
            $count3++;
            break;
        case "4":
            $count4++;
            break;
        case "5":
            $count5++;
            break;
        case "6":
            $count6++;
            break;
        case "7":
            $count7++;
            break;
        case "8":
            $count8++;
            break;
        case "9":
            $count9++;
            break;

        default:
            break;
    }
}
for ($j=0;$j<count($body);$j++) {
$num = $polarity[$j];
switch($num) {
    case "0":
        $count10++;
        break;
    case "1":
        $count11++;
        break;
    case "2":
        $count12++;
        break;
    case "3":
        $count13++;
        break; }

}

$json_arr = array("body"=>$body);

$json_obj = json_encode($json_arr);

?>
<html>
<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bilibili bullet analysis</title>
    <!-- plugins:css -->
    <!--<link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">-->

    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/BILIBILI_WKU/public/static/css/style_search.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/BILIBILI_WKU/public/static/css/img/favicon.png" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar-bott {
            overflow: hidden;
            background-color: #333;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .navbar-bott a{
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar-bott a:hover {
            background: #f1f1f1;
            color: black;
        }

        .navbar-bott a.active {
            background-color: #4CAF50;
            color: white;
        }

        .main {
            padding: 16px;
            margin-bottom: 30px;
        }
    </style>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Opening Move', 'Percentage'],
                ["King's pawn (e4)", 44],
                ["Queen's pawn (d4)", 31],
                ["Knight to King 3 (Nf3)", 12],
                ["Queen's bishop pawn (c4)", 10],
                ['Other', 3]
            ]);

            var options = {
                title: 'Chess opening moves',
                width: 900,
                legend: { position: 'none' },
                chart: { title: 'Chess opening moves',
                    subtitle: 'popularity by percentage' },
                bars: 'horizontal', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'top', label: 'Percentage'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, options);
        };
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var sum1=<?php echo $count; ?>;
            var sum2=<?php echo $count2; ?>;
            var sum3=<?php echo $count3; ?>;
            var sum4=<?php echo $count4; ?>;
            var sum5=<?php echo $count5; ?>;
            var sum6=<?php echo $count6; ?>;
            var sum7=<?php echo $count7; ?>;
            var sum8=<?php echo $count8; ?>;
            var sum9=<?php echo $count9; ?>;
            var data = google.visualization.arrayToDataTable([
                ['Intention', 'The number of words'],
                ['subtle',     sum1],
                ['slight low',     sum2],
                ['light',     sum3],
                ['ordinary',     sum4],
                ['medium',     sum5],
                ['general',     sum6],
                ['strong',     sum7],
                ['deep',     sum8],
                ['intense',     sum9],
            ]);

            var options = {
                title: 'Intention analysis'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        } </script>
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart2);
        function drawChart2() {
            var sum10=<?php echo $count10; ?>;
            var sum11=<?php echo $count11; ?>;
            var sum12=<?php echo $count12; ?>;
            var sum13=<?php echo $count13; ?>;

            var data = google.visualization.arrayToDataTable([
                ['Polarity', 'The number of words'],
                ['Neutral',     sum10],
                ['Positive',     sum11],
                ['Negative',     sum12],
                ['P&N',     sum13],

            ]);

            var options = {
                title: 'Intention analysis'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->


    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo"><img src="/BILIBILI_WKU/public/static/img/bilibili.png" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini"><img src="/BILIBILI_WKU/public/static/img/bilibili.png" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">

                </form>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="/BILIBILI_WKU/public/static/img/profile.png" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">User</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">
                            <i class="mdi mdi-logout mr-2 text-primary"></i>

                            Signout
                        </a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="count-symbol bg-warning"></span>
                    </a>

                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-format-line-spacing"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="/BILIBILI_WKU/public/static/img/profile.png" alt="profile">
                            <span class="login-status online"></span> <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2">User</span>
                            <span class="text-secondary text-small">admin</span>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="result.html">
                        <span class="menu-title">Tag cloud</span>
                        <!--<i class="mdi mdi-home menu-icon"></i>-->
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="result2.html">
                        <span class="menu-title">Sentiment Analysis Chart</span>
                        <!--<i class="mdi mdi-home menu-icon"></i>-->
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="searchVideo.html">
                        <span class="menu-title">Return to Search Page </span>
                        <!--<i class="mdi mdi-home menu-icon"></i>-->
                    </a>
                </li>


                </span>
                </li>
            </ul>
        </nav>



                <div class="row">
                    <!--<div class="col-12">
                      <span class="d-flex align-items-center purchase-popup">
                        <p>Like what you see? Check out our premium version for more.</p>
                        <a href="https://github.com/BootstrapDash/PurpleAdmin-Free-Admin-Template" target="_blank" class="btn ml-auto download-button">Download Free Version</a>
                        <a href="#product/purple-bootstrap-4-admin-template/" target="_blank" class="btn purchase-button">Upgrade To Pro</a>
                        <i class="mdi mdi-close popup-dismiss"></i>
                      </span>
                    </div>
                  </div>
                  <div class="page-header">
                    <h3 class="page-title">
                      <span class="page-title-icon bg-gradient-primary text-white mr-2">
                        <i class="mdi mdi-home"></i>
                      </span>
                      Dashboard
                    </h3>
                    <nav aria-label="breadcrumb">
                      <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                          <span></span>Overview
                          <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>-->
                    </li>
                    </ul>
                    </nav>
                </div>
                <div class="row">

                    <div class="card-body">

                        <div id="piechart" style="width: 800px; height: 550px;"></div>


                    </div>


                    <div id="piechart2" style="width: 800px; height: 550px;"></div>

                    <div><img src="/BILIBILI_WKU/public/static/img/WorldCloud.png" ></div>


                </div>
            </div>
</div>

        </div>

        <br/>

        <!-- <div id="top_x_div" style="width: 800px; height: 500px;"></div> -->

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
</div>
<!-- main-panel ends -->



<nav class="navbar-bott">

    <a href="#home" class="active">Home</a>
    <a href="#news" >News</a>
    <a href="#contact" >Contact us</a>
</nav>


<!-- container-scroller -->

<!-- plugins:js -->
<script src="/BILIBILI_WKU/public/static/js/vendor.bundle.base.js"></script>
<script src="/BILIBILI_WKU/public/static/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="/BILIBILI_WKU/public/static/js/off-canvas.js"></script>
<script src="/BILIBILI_WKU/public/static/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="/BILIBILI_WKU/public/static/js/HP.js"></script>
<!-- End custom js for this page-->
</body>

</html>
