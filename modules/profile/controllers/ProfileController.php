<?php

namespace app\modules\profile\controllers;

use app\models\form\SignupForm;
use app\models\User;
use app\modules\profile\models\Profile;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {

        $profiles = Profile::find()->orderBy('id asc')->all();
        return $this->render('index',[
            'profiles' => $profiles,
        ]);
    }

    /**
     * Displays a single Profile model.
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
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $profile = new Profile();
        $user = new User();
//        var_dump(Yii::$app->request->post());
        if(Yii::$app->request->post()) {


            if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
                if ($profile->profileRegister()) {
                    return $this->redirect(['view', 'id' => $profile->id]);
                }
                echo "cause we young now";
            }
        }
        return $this->render('create', [
            'user' => $user,
            'profile' => $profile
        ]);
    }



    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */


    public function actionUpdate($id)
    {

        $user = User::findOne($id);
        $profile = Profile::findOne($id);

        if (!isset($user, $profile)) {
            throw new NotFoundHttpException("Профиль пользователя не найден.");
        }

        if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            $isValid = $user->validate();
            $isValid = $profile->validate() && $isValid;
            if ($isValid) {
                $user->save(false);
                $profile->save(false);
                return $this->redirect(['view', 'id' => $id]);
            }
        }

        return $this->render('update', [

            'user' => $user,
            'profile' => $profile,
        ]);
    }


    public function actionEdit($id)
    {

        $user = User::findOne($id);
        $profile = Profile::findOne($id);

        if (!isset($user, $profile)) {
            throw new NotFoundHttpException("Профиль пользователя не найден.");
        }

        if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            $isValid = $user->validate();
            $isValid = $profile->validate() && $isValid;
            if ($isValid) {
                $user->save(false);
                $profile->save(false);
                return $this->redirect(['view', 'id' => $id]);
            }
        }



        return $this->render('update', [

            'user' => $user,
            'profile' => $profile,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function actionDelete($id)
    {
        $user = User::findOne($id);
        $profile = Profile::findOne($id);

        $user->findOne($id)->delete();
//        $profile->findOne($id)->delete();

        return $this->redirect(['index']);

    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
