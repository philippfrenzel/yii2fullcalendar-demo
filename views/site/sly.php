<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

/* @var $this yii\web\View */
$this->title = 'yii2 extension yii2sly demo';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Yii2 Extension Demo</h1>

        <p class="lead">philippfrenzel/yii2sly</p>

    </div>

    <div class="well">
        Note: This is only a demo for the extension mentioned above. Check out the details at github!
        If you have issues or question, pls. make an issue at github! This extension is only a wrapper
        for the amazing sly.js library! If you wanna use it, pls. check out the license
        there - you can use this code "as is". I take no warrenty for it! 

        ;)
    </div>

    <div class="body-content">

        <?= philippfrenzel\yii2sly\yii2sly::widget([
            'id' => 'sp_slider',
            'items'=> [
                ['content' => '<img src="' . Url::to('@web/img/sportster_forty-eight_sly.jpg') . '"></img>'],
                ['content' => '<img src="' . Url::to('@web/img/softtail_heritage-classic_sly.jpg') . '"></img>'],
                ['content' => '<img src="' . Url::to('@web/img/dyna_wide-glide_sly.jpg') . '"></img>'],
                ['content' => '<img src="' . Url::to('@web/img/cvo_limited_sly.jpg') . '"></img>'],
                ['content' => '<img src="' . Url::to('@web/img/v-rod_muscle_sly.jpg') . '"></img>']
            ],
            'options' => [
                'style' => "height:300px;"
            ],
        ]); ?>        

<div class="clearfix"></div>

<h3>The needed code:</h3>

<div class="well"> 
<pre>

TBD
  
</pre>
</div>

    </div>
</div>
