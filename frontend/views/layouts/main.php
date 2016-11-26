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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/images/icon.png" type="image/x-icon">
    <title>REPORT</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<nav></nav>
    <div ui-view></div>
	<footer></footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
