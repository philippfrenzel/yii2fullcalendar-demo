<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

/* @var $this yii\web\View */
$this->title = 'yii2 extension yii2masonry demo';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Yii2 Extension Demo</h1>

        <p class="lead">philippfrenzel/yii2masonry</p>

    </div>

    <div class="well">
        Note: This is only a demo for the extension mentioned above. Check out the details at github!
        If you have issues or question, pls. make an issue at github! This extension is only a wrapper
        for the amazing masonry.js library! If you wanna use it, pls. check out the license
        there - you can use this code "as is". I take no warrenty for it! 

        ;)
    </div>

    <div class="body-content">

        <?php \yii2masonry\yii2masonry::begin([
            'clientOptions' => [
                'columnWidth' => 5,
                'itemSelector' => '.item'
            ]
        ]); ?>

        <div class="item"><h3>Test 01</h3><p>Und mehr Text</p></div>
        <div class="item"><h3>Test 02</h3><p>Und mehr Text. And more Text. Encore un peu de texte.</p></div>
        <div class="item"><h3>Test 03</h3><p>Und mehr Text</p></div>
        <div class="item"><h3>Test 94</h3><p>Und mehr Text</p></div>
        <div class="item"><h3>Test 95</h3><p>Und mehr Text. And more Text. Encore un peu de texte.</p></div>
        <div class="item"><h3>Test 96</h3><p>Und mehr Text</p></div>
        <div class="item"><h3>Test 97</h3><p>Und mehr Text. And more Text. Encore un peu de texte.</p></div>
        <div class="item"><h3>Test 08</h3><p>Und mehr Text. And more Text. Encore un peu de texte.</p></div>
        <div class="item"><h3>Test 09</h3><p>Und mehr Text</p></div>
        <div class="item"><h3>Test 10</h3><p>Und mehr Text</p></div>
        <div class="item"><h3>Test 11</h3><p>Und mehr Text</p></div>
        <div class="item"><h3>Test 12</h3><p>Und mehr Text. And more Text. Encore un peu de texte.</p></div>

        <?php \yii2masonry\yii2masonry::end(); ?>

<div class="clearfix"></div>

<h3>The needed code:</h3>

<div class="well"> 
<pre>
    Don't forgett to add the "needed" stylesheets, to let it look ok!
</pre>
</div>

    </div>
</div>
