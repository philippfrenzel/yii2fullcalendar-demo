<?php

use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
$this->title = 'yii2 extension yii2-fullcalendar demo';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Yii2 Extension Demo</h1>

        <p class="lead">philippfrenzel/yii2-fullcalendar</p>

    </div>

    <div class="well">
        Note: This is only a demo for the extension mentioned above. Check out the details at github!
        If you have issues or question, pls. make an issue at github! This extension is only a wrapper
        for the amazing efullcalendar.js library! If you wanna use it, pls. check out the license
        there - you can use this code "as is". I take no warrenty for it! 

        ;)
    </div>

    <div class="body-content">

    <?php

    $JSCode = <<<EOF
function(start, end) {
        var title = prompt('Event Title:');
        var eventData;
        if (title) {
            eventData = {
                title: title,
                start: start,
                end: end
            };
            $('#w0').fullCalendar('renderEvent', eventData, true);
        }
        $('#w0').fullCalendar('unselect');
}
EOF;

    $JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {

    alert('Event: ' + calEvent.title);
    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
    alert('View: ' + view.name);

    // change the border color just for fun
    $(this).css('border-color', 'red');

}
EOF;
    
    ?>

        <?= yii2fullcalendar\yii2fullcalendar::widget(array(
              'clientOptions' => [
                    'selectable' => true,
                    'selectHelper' => true,
                    'select' => new JsExpression($JSCode),
                    'eventClick' => new JsExpression($JSEventClick),
                    'defaultDate' => date('Y-m-d')
              ],
              'ajaxEvents' => Url::toRoute(['/site/jsoncalendar'])
            ));
        ?>        

    </div>
</div>
