<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?= Yii::getAlias('@web/athlos.png') ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= (Yii::$app->name ? '  ' . Yii::$app->name : '') ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<!-- Favicon -->
<link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="<?= Yii::getAlias('@web').'/lib/flaticon/font/flaticon.css'?>" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="<?= Yii::getAlias('@web').'/lib/owlcarousel/assets/owl.carousel.min.css'?>" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="<?= Yii::getAlias('@web').'/css/bootstrap.min.css'?>" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="<?= Yii::getAlias('@web'). '/css/style.css'?>" rel="stylesheet">

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Sobre', 'url' => ['/site/about']],
        ['label' => 'Contacto', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0 mt-5 pt-5">
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary px-5 mt-5 sticky-footer">
    <div class="row gx-5">
        <div class="col-lg-8 col-md-6">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-12 pt-5 mb-5">
                    <h4 class="text-uppercase text-light mb-4">Encontra-nos</h4>
                    <div class="d-flex mb-2">
                        <i class="bi bi-geo-alt text-primary me-2"></i>
                        <p class="mb-0">1234-567, Avenida Alberto Cunha nº4</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-envelope-open text-primary me-2"></i>
                        <p class="mb-0">suporte@athlosgym.com</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-telephone text-primary me-2"></i>
                        <p class="mb-0">+351 214 537 378</p>
                    </div>
                    <div class="d-flex mt-4">
                        <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                    <h4 class="text-uppercase text-light mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Sobre nós</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Horários</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Os nossos treinadores</a>
                        <a class="text-secondary" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contacta-nos</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                    <h4 class="text-uppercase text-light mb-4">Popular Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Sobre nós</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Horários</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Os nossos treinadores</a>
                        <a class="text-secondary" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contacta-nos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-5">
                <h4 class="text-uppercase text-white mb-4">Newsletter</h4>
                <h6 class="text-uppercase text-white">Subscreve a nossa Newsletter</h6>
                <p class="text-light">Amet justo diam dolor rebum lorem sit stet sea justo kasd</p>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                        <button class="btn btn-dark">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 py-lg-0 px-5 sticky-footer" style="background: #111111;">
    <div class="row gx-5">
        <div class="col-lg-8">
            <div class="py-lg-4 text-center">
                <p class="text-secondary mb-0">&copy; <a class="text-light fw-bold" href="#">Athlos Gym</a>. All Rights Reserved.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="py-lg-4 text-center credit">
                <p class="text-light mb-0">Designed by <a class="text-light fw-bold" href="https://htmlcodex.com">HTML Codex</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-dark py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="<?= Yii::getAlias('@web').'/lib/waypoints/waypoints.min.js'?>"></script>
<script src="<?= Yii::getAlias('@web').'/lib/counterup/counterup.min.js'?>"></script>
<script src="<?= Yii::getAlias('@web').'/lib/owlcarousel/owl.carousel.min.js'?>"></script>

<!-- Template Javascript -->
<script src="<?= Yii::getAlias('@web').'/main.js'?>"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
