<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

/* @var $this yii\web\View */
$this->title = 'yii2 extension yii2-fullcalendar demo';

$DragJS = <<<EOF
/* initialize the external events
-----------------------------------------------------------------*/

$('#external-events .fc-event').each(function() {
    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true // maintain when user navigates (see docs on the renderEvent method)
    });
    // make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
    });
});

EOF;

$this->registerJs($DragJS);

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

$JSDropEvent = <<<EOF
function(date) {
    alert("Dropped on " + date.format());
    if ($('#drop-remove').is(':checked')) {
        // if so, remove the element from the "Draggable Events" list
        $(this).remove();
    }
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

<div id="external-events">
    <h4>Draggable Events</h4>
    <div class="fc-event ui-draggable ui-draggable-handle">My Event 1</div>
    <div class="fc-event ui-draggable ui-draggable-handle">My Event 2</div>
    <div class="fc-event ui-draggable ui-draggable-handle">My Event 3</div>
    <div class="fc-event ui-draggable ui-draggable-handle">My Event 4</div>
    <div class="fc-event ui-draggable ui-draggable-handle">My Event 5</div>
    <p>
        <input type="checkbox" id="drop-remove">
        <label for="drop-remove">remove after drop</label>
    </p>
</div>

        <?= yii2fullcalendar\yii2fullcalendar::widget(array(
              'clientOptions' => [
                    'selectable' => true,
                    'selectHelper' => true,
                    'droppable' => true,
                    'editable' => true,
                    'drop' => new JsExpression($JSDropEvent),
                    'select' => new JsExpression($JSCode),
                    'eventClick' => new JsExpression($JSEventClick),
                    'defaultDate' => date('Y-m-d')
              ],
              'ajaxEvents' => Url::toRoute(['/site/jsoncalendar'])
            ));
        ?>        

<h3>The needed code:</h3>

<div class="well"> 
<pre>
Event Hover:
<?= Html::encode($JSCode); ?>

Event Click:
<?= Html::encode($JSEventClick); ?>    
</pre>
</div>

    </div>
</div>
