<?php

namespace backend\controllers;

use common\models\AnimeParts;
use common\models\LoginForm;
use common\models\SplitAnime;
use JsonException;
use Yii;
use yii\base\InvalidConfigException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\JsonResponseFormatter;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use function PHPUnit\Framework\directoryExists;

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
                        'actions' => ['login', 'error', 'parts-json'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
     * Displays upload.
     *
     * @return string
     */
    public function actionUpload()
    {
        return $this->render('upload');
    }

    /**
     * @param int $id
     * @return string[]
     * @throws InvalidConfigException
     * @throws JsonException
     * @throws NotFoundHttpException
     */
    public function actionPartsJson($id): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->formatters = [
            Response::FORMAT_JSON => [
                'class' => JsonResponseFormatter::class,
                'prettyPrint' => true
            ]
        ];
        $rows = SplitAnime::find()->where(['anime_id' => $id])->all();
        $items = [];
        foreach ($rows as $row) {
            $files = [];
            $dir = 'D:\OpenServer\domains\api-anime/' . $row->animeParts->source;
            foreach (glob($dir . '/*') as $key => $file) {
                $files[str_replace('.mp4', '', (basename($file)) . 'p')] = $row->animeParts->source . basename($file);
            }
            $items[$row->anime->type][$row->anime->key_anime_m] = $row;
            $nItems[$row->animeParts->key_anime_p] = [
                'name' => $row->animeParts->name_anime_p,
                'poster' => $row->animeParts->poster,
                'path' => $row->animeParts->path_n,
                'number' => $row->animeParts->number_p,
                'source' => $files
            ];
            $items[$row->anime->type][$row->anime->key_anime_m] = [
                'name' => $row->anime->name_m,
                'count-parts' => $row->anime->count_parts,
                'parts' => $nItems
            ];
        }
        return $items;
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
