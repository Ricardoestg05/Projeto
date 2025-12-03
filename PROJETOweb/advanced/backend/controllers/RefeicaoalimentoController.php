<?php

namespace backend\controllers;

use common\models\Refeicaoalimento;
use common\models\RefeicaoalimentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RefeicaoalimentoController implements the CRUD actions for Refeicaoalimento model.
 */
class RefeicaoalimentoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Refeicaoalimento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RefeicaoalimentoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Refeicaoalimento model.
     * @param int $refeicao_id Refeicao ID
     * @param int $alimento_id Alimento ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($refeicao_id, $alimento_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($refeicao_id, $alimento_id),
        ]);
    }

    /**
     * Creates a new Refeicaoalimento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Refeicaoalimento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'refeicao_id' => $model->refeicao_id, 'alimento_id' => $model->alimento_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Refeicaoalimento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $refeicao_id Refeicao ID
     * @param int $alimento_id Alimento ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($refeicao_id, $alimento_id)
    {
        $model = $this->findModel($refeicao_id, $alimento_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'refeicao_id' => $model->refeicao_id, 'alimento_id' => $model->alimento_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Refeicaoalimento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $refeicao_id Refeicao ID
     * @param int $alimento_id Alimento ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($refeicao_id, $alimento_id)
    {
        $this->findModel($refeicao_id, $alimento_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Refeicaoalimento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $refeicao_id Refeicao ID
     * @param int $alimento_id Alimento ID
     * @return Refeicaoalimento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($refeicao_id, $alimento_id)
    {
        if (($model = Refeicaoalimento::findOne(['refeicao_id' => $refeicao_id, 'alimento_id' => $alimento_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
