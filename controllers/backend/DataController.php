<?php

namespace xiuchanghu\recommend\controllers\backend;

use Yii;
use xiuchanghu\recommend\models\RecommendData;
use xiuchanghu\recommend\models\RecommendDataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * DataController implements the CRUD actions for RecommendData model.
 */
class DataController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all RecommendData models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecommendDataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecommendData model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RecommendData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RecommendData();

        if ($model->load(Yii::$app->request->post())) {
            $model->img =  UploadedFile::getInstance($model, 'img');
            $model->pubtime = time();
            if ($model->validate()) {
                if ($model->img) {
                    //$path = Yii::$app->params['recommendUploadPath'] . '/'. date('Y') . '/' . date('m') . '/' . date('d');
                    $path = Yii::$app->params['recommendUploadPath'];
                    $imgName = $path. date('Ymdhis') . rand(1000, 9999) . '.' . $model->img->extension;
                    $model->img->saveAs(Yii::getAlias('@frontend/web') . DIRECTORY_SEPARATOR . $imgName);
                    $model->img = $imgName;
                }
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RecommendData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldimg = $model->img;
        if ($model->load(Yii::$app->request->post())) {
            $model->img =  UploadedFile::getInstance($model, 'img');
            $model->pubtime = time();
            if ($model->validate()) {
                if ($model->img) {
                    //$path = Yii::$app->params['recommendUploadPath'] . '/'. date('Y') . '/' . date('m') . '/' . date('d');
                    $path = Yii::$app->params['recommendUploadPath'];
                    $imgName = $path. date('Ymdhis') . rand(1000, 9999) . '.' . $model->img->extension;
                    $model->img->saveAs(Yii::getAlias('@frontend/web') . DIRECTORY_SEPARATOR . $imgName);
                    $model->img = $imgName;
                } else {
                    $model->img = $oldimg;
                }
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
        //     return $this->render('update', [
        //         'model' => $model,
        //     ]);
        // }
    }

    /**
     * Deletes an existing RecommendData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RecommendData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RecommendData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RecommendData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
