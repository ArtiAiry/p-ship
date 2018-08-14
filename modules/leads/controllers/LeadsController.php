<?php

namespace app\modules\leads\controllers;

use app\modules\leads\Module;
use Yii;
use app\modules\leads\models\ClicksLeads;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LeadsController implements the CRUD actions for ClicksLeads model.
 */
class LeadsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','update','view','delete','remove'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create','update','view','delete','remove'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays a single ClicksLeads model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ClicksLeads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClicksLeads();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Module::t('leads','Lead was successfully created.'));
            return $this->redirect(['/leads']);

        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ClicksLeads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Module::t('leads','Lead was successfully edited.'));
            return $this->redirect(['/leads']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ClicksLeads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/leads']);
    }


    public function actionRemove($id)
    {
        $this->findModel($id)->removeLead();

        return $this->redirect(['/leads']);
    }

    /**
     * Finds the ClicksLeads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClicksLeads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClicksLeads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Module::t('leads','The requested page does not exist.'));
        }
    }
}
