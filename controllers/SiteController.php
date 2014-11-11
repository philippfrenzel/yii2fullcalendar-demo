<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\models\LoginForm;
use app\models\ContactForm;

use \DateTime;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSly()
    {
        return $this->render('sly');
    }

    public function actionMasonry()
    {
        return $this->render('masonry');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    
    /**
     * [actionJsoncalendar description]
     * @param  [type] $start [description]
     * @param  [type] $end   [description]
     * @param  [type] $_     [description]
     * @return [type]        [description]
     */
    public function actionJsoncalendar($start=NULL,$end=NULL,$_=NULL){
        $events = array();
        
        //Demo
        $Event = new \yii2fullcalendar\models\Event();
        $Event->id = 1;
        $Event->title = 'Testing';
        $Event->start = date('Y-m-d\TH:m:s\Z');
        $events[] = $Event;

        $Event = new \yii2fullcalendar\models\Event();
        $Event->id = 2;
        $Event->title = 'Testing';
        $Event->start = date('Y-m-d\TH:m:s\Z',strtotime('tomorrow 8am'));
        $events[] = $Event;


        $event3 = new DateTime('+2days 10am');
        $Event = new \yii2fullcalendar\models\Event();
        $Event->id = 2;
        $Event->title = 'Testing';
        $Event->start = $event3->format('Y-m-d\Th:m:s\Z');
        $Event->end = $event3->modify('+3 hours')->format('Y-m-d\TH:m:s\Z');
        $events[] = $Event;


        header('Content-type: application/json');
        echo Json::encode($events);

        Yii::$app->end();
    }

}
