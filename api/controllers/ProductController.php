<?php
namespace api\controllers;

use common\models\Product;
use Yii;
use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $modelClass = 'common\models\Product';
}
