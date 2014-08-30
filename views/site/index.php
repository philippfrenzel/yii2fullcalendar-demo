<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'yii2 extension yii2-fullcalendar demo';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Yii2 Extension Demo</h1>

        <p class="lead">philippfrenzel/yii2-fullcalendar</p>

    </div>

    <div class="body-content">

        <?= yii2fullcalendar\yii2fullcalendar::widget(array(
              'ajaxEvents' => Url::toRoute(['/site/jsoncalendar'])
            ));
        ?>

        <p>
            Note: This is only a demo for the extension mentioned above. Check out the details at github!
            If you have issues or question, pls. make an issue at github! This extension is only a wrapper
            for the amazing efullcalendar.js library! If you wanna use it, pls. check out the license
            there - you can use this code "as is". I take no warrenty for it! 

            ;)
        </p>

    </div>
</div>
