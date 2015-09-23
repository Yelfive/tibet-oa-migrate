<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\data\templates\module;

use yii\gii\CodeFile;
use yii\helpers\StringHelper;
use yii\web\View;

/**
 * This generator will generate the skeleton code needed by a module.
 *
 * @property string $controllerNamespace The controller namespace of the module. This property is read-only.
 * @property boolean $modulePath The directory that contains the module class. This property is read-only.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends \yii\gii\generators\module\Generator
{

    /**
     * @inheritdoc
     */
    public function requiredTemplates()
    {
        return ['module.php', 'controller.php'];
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $files = [];
        $modulePath = $this->getModulePath();
        $files[] = new CodeFile(
                $modulePath . '/' . StringHelper::basename($this->moduleClass) . '.php', $this->render("module.php")
        );
        $files[] = new CodeFile(
                $modulePath . '/controllers/DefaultController.php', $this->render("controller.php")
        );

        return $files;
    }

    /**
     * Generates code using the specified code template and parameters.
     * Note that the code template will be used as a PHP file.
     * @param string $template the code template file. This must be specified as a file path
     * relative to [[templatePath]].
     * @param array $params list of parameters to be passed to the template file.
     * @return string the generated code
     */
    public function render($template, $params = [])
    {
        $view = new View();
        $params['generator'] = $this;

        return $view->renderFile($this->getTemplatePath() . '/' . $template, $params, $this);
    }

}
