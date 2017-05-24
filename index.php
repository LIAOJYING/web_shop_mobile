<?php 
    include 'admin/db.php';
    session_start();

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

?>


<!DOCTYPE html>

<html lang="vi"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thế giới di động</title>
    
    <link rel="shortcut icon" href="public/images/favicon.png">
    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="public/css/style.css" rel="stylesheet">
    <link href="css/half-slider.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="public/js/html5shiv.js"></script>
    <script src="public/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-phone"></i> Thế giới di động</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i>
                        <?php
                            $ok=1;
                            if(isset($_SESSION['cart'])){
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    # code...
                                    if(isset($key)){
                                        $ok=2;
                                    }
                                }
                            }
                            if($ok!=2){
                                echo "Giỏ Hàng 0 SP";
                            } else {
                                echo "Giỏ Hàng ". count($_SESSION['cart']) ." SP </a>";
                            }
                        ?>
                    </a>
                </li>
                <li>
                    <?php
                        if(isset($_SESSION['user']))
                        {
                            echo "<a href='logout.php'>LOGOUT</a>";
                        } else {
                            echo "<a href='admin/index.php'>LOGIN</a>";
                        }
                    ?>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>
    <div class="row carousel-holder">
        <div class="">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <img class="slide-image" src="https://www.marchnetworks.com/wp-content/uploads/2016/02/guru-banner.jpg" alt="">
                    </div>
                    <div class="item">
                        <img class="slide-image" src="https://www.ohnwardbank.bank/sites/www.ohnwardbank.bank/files/Remote%20Check%20Deposit%20Website%20Banner-min%20compressed.jpg" alt="">
                    </div>
                    <div class="item active">
                        <img class="slide-image" src="http://www.itsgroups.in/computers/asusimages/asus_smartphone_service_centr_kottayam_banner.jpg" alt="">
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left text-muted"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right text-muted"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="margin"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-4 col-xs-12 pull-right" id="sidebar" role="navigation">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Danh mục
                            <b class="glyphicon glyphicon-plus-sign visible-xs pull-right"></b>
                        </h3>
                    </div>
                    <div class="list-group hidden-xs">
                        <a href="#" class="list-group-item">Nokia</a>
                        <a href="#" class="list-group-item">HTC</a>
                        <a href="#" class="list-group-item">Sony</a>
                        <a href="#" class="list-group-item">iPhone</a>    
                    </div>
                </div>            
            </div>
            <div class="col-lg-9 col-sm-8 col-xs-12 pull-left">
                <!-- BEGIN CONTENT -->
                <div class="row product-list">
                    <?php
                        foreach ($result as $row) {
                    ?>
                    <div class="col-lg-4 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="public/upload/product/<?php echo $row['image'] ?>"/>
                        </a>
                        <div class="caption text-center">
                            <h4><a href="#"><?php echo $row['name'] ?></a></h4>
                            <p><?php echo $row['price'] ?></p>
                            <p><a href='addcart.php?item=<?php echo $row['id'] ?>' class="btn btn-primary" role="button">Đặt mua</a></p>
                        </div>
                    </div>
                    </div>
                    <?php   
                    }
                    ?>
                </div>

<div class="text-center">
    <ul class="pagination"><li class="disabled"><span>Đầu</span></li><li class="disabled"><span>≪</span></li><li class="active"><span>1</span></li><li class="disabled"><span>≫</span></li><li class="disabled"><span>Cuối</span></li></ul></div>
                    <!-- END CONTENT -->
            </div><!--/span-->            
        </div><!--/row-->
    </div><!--/.container-->

    <script type="text/javascript" src="public/js/jquery-1.10.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebar .panel-heading').click(function () {
                $('#sidebar .list-group').toggleClass('hidden-xs');
                $('#sidebar .panel-heading b').toggleClass('glyphicon-plus-sign').toggleClass('glyphicon-minus-sign');
            });
        });
    </script>

</body></html>