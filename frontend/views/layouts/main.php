<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, minimal-ui">
    <meta name="apple-mobile-web-app-status-bar-style" content="yes" />
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/images/icon.png" type="image/x-icon">
    <title>TSKYLAKE</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<nav></nav>
    <div ui-view class="app"></div>
	<footer></footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
