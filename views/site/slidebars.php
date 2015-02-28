<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

/* @var $this yii\web\View */
$this->title = 'yii2 extension yii2slidebars demo';
?>


<?php yii\widgets\Block::begin(array('id'=>'sb-left')); ?>
    <h4><i class="fa fa-tag"></i> <?= Html::encode('Search') ?></h4>
    ...
<?php yii\widgets\Block::end(); ?>

<?php yii\widgets\Block::begin(array('id'=>'sb-right')); ?>
    <h4><i class="fa fa-tag"></i> <?= Html::encode('Toolbox') ?></h4>
    ...
<?php yii\widgets\Block::end(); ?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Yii2 Extension Demo</h1>

        <p class="lead">philippfrenzel/yii2slidebars</p>

    </div>

    <div class="well">
        Note: This extension is a wrapper for the amazing jquery slidebars which can be found here:
        <b>http://plugins.adchsm.me/slidebars/</b> 
        Pls. take a closer look at all the plugin options, which can be passed over by adding them to the "clientOptions" parameter as shown below! If you wanna use it, pls. check out the license
        there - you can use this code "as is". I take no warrenty for it! 

        ;)
    </div>

    <div class="body-content">

        <?= \yii2slidebars\yii2slidebars::widget([
            'id' => 'sp_slider'            
        ]); ?>        

<div class="clearfix"></div>

<h3>The needed code:</h3>

<div class="well"> 
<pre>

Pls. check github
  
</pre>
</div>

    </div>
</div>
