<?php
require_once './libs/Json.php';
require_once './define.php';
require_once './libs/Form.php';
$obj = new Json(DATA_PRODUCT, COLUMNS_PRODUCT);

$product = $obj->get($_GET['id']);

$name = $product['name'];
$price = number_format($product['price']);
$description = $product['description'];
$imgMain = $product['image_main'];
$imgExtra = $product['image_extra'];

$xhtml = '';
$xhtml = '
<div class="col-md-7 col-sm-7">
    <div class="demo">
        <ul id="lightSlider">
            <li data-thumb="' . PATH_UPLOAD .$imgMain.'">
                <img src="' . PATH_UPLOAD .$imgMain.'" />
            </li>
        ';
            foreach ($imgExtra as $key => $value) {
                if(!empty($value)){
                    $xhtml .= '
                    <li data-thumb="' . PATH_UPLOAD .$value.'">
                        <img src="' . PATH_UPLOAD .$value.'" />
                    </li>
                    ';
                }
            }

            $xhtml .= '
        </ul>
    </div>
</div>
<div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">
    <h3 class="prod_title">' . $name . '</h3>
    <p>' . $description . '</p>
    <br>
    <div class="product_price">
        <h1 class="price">' . $price . 'đ</h1>
    </div>
</div>
'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once PATH_HTML . '/head.php' ?>
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php require_once PATH_HTML . '/sidebar.php' ?>

            <?php require_once PATH_HTML . '/top-nav.php' ?>

            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 2436px;">
                <?php require_once PATH_HTML . '/page-header.php' ?>

                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <?php require_once PATH_HTML . '/x-title.php' ?>

                            <div class="x_content">
                                <?= $xhtml ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <?php require_once PATH_HTML . '/footer.php' ?>

    </div>

    <?php require_once PATH_HTML . '/script.php' ?>   
</body>
</html>