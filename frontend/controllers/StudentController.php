<?php

namespace frontend\controllers;

use Yii;

use common\models\StateList;
use common\models\DistrictList;
use common\models\Students;
use common\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\State;
use common\models\District;
use yii\web\UploadedFile;

/**
 * StudentController implements the CRUD actions for Students model.
 */
class StudentController extends Controller
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
     * Lists all Students models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Students();
        
     if ($model->load($this->request->post())) {
        
         $model->student_image = UploadedFile::getInstance($model,'student_image');

         $image_name = $model->name.rand(1,100).'.'.$model->student_image->extension;

         $image_path = 'uploads/students/'.$image_name;
         $model->save();
         
         $model->student_image->saveAs($image_path);
         
         $model->student_image = $image_path;
         
         $model->save();
        //  echo $model->id;die;

          return $this->redirect(['view', 'id' => $model->id]);
           
     }else {
            
        return $this->render('create', [
            'model' => $model,
        ]);

        }

        
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // $request = $this->request->post();

        $new_student_image= UploadedFile::getInstance($model,'student_image');

        if($new_student_image){

            unlink(Yii::$app->basePath.'/web/'.$model->student_image);
            
            $image_name = $model->name.rand(1,100).'.'.$new_student_image->extension;
            $image_path='uploads/students/'.$image_name;
            $model->student_image=$image_path;
            $new_student_image->saveAs($image_path);
        }
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    
    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionState() {
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
     
       if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $count_id = $parents[0];
               
                $out = Students::getStateList($count_id); 
                // the getStateList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                if(!$out)
                {
                    return ['output'=>'', 'selected'=>''];
                }
                $st=[];
                foreach($out as $name  ){
                    $st[]=['id'=>$name['id'],'name'=>$name['name']];

                }
              
                return ['output'=>$st, 'selected'=>''];
            }
        }
       
    }
    public function actionDistrict() {
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
     
       if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $dist_id = $parents[0];
               
                $out = Students::getDistrictList($dist_id); 
                // the getStateList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                if(!$out)
                {
                    return ['output'=>'', 'selected'=>''];
                }
                $st=[];
                foreach($out as $name  ){
                    $st[]=['id'=>$name['id'],'name'=>$name['name']];

                }
              
                return ['output'=>$st, 'selected'=>''];
            }
        }
       
     }
     public function actionTaluk() {
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
     
       if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $tuk_id = $parents[0];
               
                $out = Students::getTalukList($tuk_id); 
                // the getStateList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                if(!$out)
                {
                    return ['output'=>'', 'selected'=>''];
                }
                $st=[];
                
                foreach($out as $name  ){
                    $st[]=['id'=>$name['id'],'name'=>$name['name']];

                }
              
                return ['output'=>$st, 'selected'=>''];
            }
        }
       
     }

}
