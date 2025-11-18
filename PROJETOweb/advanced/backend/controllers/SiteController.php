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
                        'actions' => ['login', 'error'], // Permitir que todos acedam ao login e erro
                        'allow' => true,
                    ],
                    [
                        // Regra 2: Permitir acesso a 'logout' para TODOS os utilizadores AUTENTICADOS
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,

                        'roles' => ['accessBackend'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    // Redirecionar para o login do backend se não estiver autenticado
                    if (\Yii::$app->user->isGuest) {
                        return $action->controller->redirect(['site/login']);
                    }
                    // Mostrar erro 403 se estiver autenticado mas não tiver a permissão
                    throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder à administração.');
                }
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
