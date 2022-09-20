<?php

namespace app\extensions;

class ModuleBootstrap implements \yii\base\BootstrapInterface
{

    /**
     * @inheritDoc
     */
    public function bootstrap($app)
    {
        $aModuleList = $app->getModules();

        foreach ($aModuleList as $sKey => $aModule) {
            if (is_array($aModule) && strpos($aModule['class'], 'app\modules') === 0) {
                $path = ['modules', $sKey, 'config', 'routes.php'];
                $sFilePathConfig = FILE_PATH_ROOT . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $path);

                if (file_exists($sFilePathConfig)) {
                    $app->getUrlManager()->addRules(require($sFilePathConfig));
                }
            }
        }
    }
}