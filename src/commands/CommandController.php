<?php

namespace luya\commands;

use Yii;

/**
 * @author nadar
 */
class CommandController extends \yii\console\Controller
{
    public function actionIndex($module, $route = 'default')
    {
        $moduleObject = Yii::$app->getModule($module);
        if (!$moduleObject) {
            echo "The module '$module' does not exist.";
            exit(0);
        }
        $moduleObject->controllerNamespace = $module .'\commands';
        $response = $moduleObject->runAction($route);
        
        if ($response === 0) {
            exit(0);
        }
        
        exit(1);
    }
}
