<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true, // login permitido a todos
                    ],
                    [
                        'allow' => true,
                        'roles' => ['accessBackend'], // só estes entram no backend
                    ],
                ],
                'denyCallback' => function ($rule, $action) {

                    // ❗ Se não está autenticado → manda para login
                    if (Yii::$app->user->isGuest) {
                        return $action->controller->redirect(['site/login']);
                    }

                    // ❗ Se está autenticado mas NÃO TEM PERMISSÃO
                    //   → FAZ LOGOUT e manda para fora
                    Yii::$app->user->logout();

                    return Yii::$app->response->redirect(['/site/login']);
                },
            ],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfile(){
        return $this->render('profile');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
