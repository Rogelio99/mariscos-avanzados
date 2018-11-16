<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\Alimentos;
use app\models\FormSearch;
use app\models\FormAlimentos;
use yii\helpers\Url;
use yii\helpers\Html;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
     
    public function actionCartaView() 
    {
        $table = new Alimentos;
        $model = $table->find()->all(); 
        $form = new FormSearch;
        $search = null;
        if($form->load(Yii::$app->request->get()))
        {
            if($form->validate())
            {
                $search = Html::encode($form->q);
                $query = "SELECT * FROM alimento WHERE id_alimento like '%$search%' OR ";
                $query .= "nombre LIKE '%$search%' OR descripcion LIKE '%$search%'";
                $model = $table->findBySql($query)->all();
            }
            else{
                $form->getErrors();
            }
        }
        return $this->render("carta", ["model" => $model, "form" =>$form, "search" => $search]); 
    }
    
    public function actionAlimentoCreate()
    {
        $model = new FormAlimentos;
        $msg = null;
        if($model-> load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new Alimentos;
                $table->nom_A = $model->nombre;
                $table->descripcion = $model->descripcion;
                $table->precio = $model->precio;
                $table->cantidad = $model->cantidad;
                
                $table->imagen = $model->imagen;
                if($table->insert())
                {
                    $msg = "Registro guardado";
                    $model->nombre = null;
                    $model->descripcion = null;
                    $model->precio = null;
                    $model->cantidad = null;
                    $model->imagen = null;
                }
                else
                {
                    $msg = "Ha ocurrido un error al tratar de guardar! ";
                }
            }
            else
            {
               $model->getError(); 
            }
        }
        return $this->render("create", ['model' => $model, 'msg' => $msg]);
    }
    
    public function actionUpdate()
    {
        $model = new FormAlimentos;
        $msg = null;
        
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = Alumnos::findOne($model->id_alimento);
                if($table)
                {
                    $table->nom_a = $model->nom_a;
                    $table->descripcion = $model->descripcion;
                    $table->precio = $model->precio;
                    $table->imagen = $model->imagen;
                    $table->cantidad = $model->cantidad;
                    if ($table->update())
                    {
                        $msg = "El Alimento ha sido actualizado correctamente";
                    }
                    else
                    {
                        $msg = "El Alimento no ha podido ser actualizado";
                    }
                }
                else
                {
                    $msg = "El alimento seleccionado no ha sido encontrado";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        
        
        if (Yii::$app->request->get("id_alimento"))
        {
            $id_alumno = Html::encode($_GET["id_alimento"]);
            if ((int) $id_alimento)
            {
                $table = Alumnos::findOne($id_alimento);
                if($table)
                {
                    $table->nom_a = $model->nom_a;
                    $table->descripcion = $model->descripcion;
                    $table->precio = $model->precio;
                    $table->imagen = $model->imagen;
                    $table->cantidad = $model->cantidad;
                }
                else
                {
                    return $this->redirect(["site/carta"]);
                }
            }
            else
            {
                return $this->redirect(["site/carta"]);
            }
        }
        else
        {
            return $this->redirect(["site/carta"]);
        }
        return $this->render("update", ["model" => $model, "msg" => $msg]);
    }
    
    public function actionDelete()
    {
        if(Yii::$app->request->post())
        {
            $id_alimento = Html::encode($_POST["id_alimento"]);
            if((int) $id_alumno)
            {
                if(Alumnos::deleteAll("id_alumno=:id_alimento", [":id_alimento" => $id_alimento]))
                {
                    echo "Alumno con id $id_alumno eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/carta")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar el alumno, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/carta")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar el alumno, redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/carta")."'>";
            }
        }
        else
        {
            return $this->redirect(["site/carta"]);
        }
    }
     
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
