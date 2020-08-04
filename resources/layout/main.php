<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use App\Asset\AppAsset;
use App\Widget\FlashMessage;

/**
 * @var string $content
 * @var string|null $csrf
 * @var Yiisoft\View\WebView $this
 * @var Yiisoft\Yii\Web\User\User $user
 * @var Yiisoft\Assets\AssetManager $assetManager
 * @var Yiisoft\Router\UrlGeneratorInterface $url
 * @var App\ApplicationParameters $applicationParameters
 */

$assetManager->register([AppAsset::class]);
$this->setCssFiles($assetManager->getCssFiles());
$this->setJsFiles($assetManager->getJsFiles());
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Html::encode($applicationParameters->getLanguage()) ?>" class="h-100">
    <?= $this->render('_head', ['csrf' => $csrf]) ?>
    <?php $this->beginBody() ?>
        <body class="d-flex flex-column h-100">
            <header>
                <?= $this->render('_menu', ['user' => $user]) ?>
            </header>

            <main class="flex-shrink-0">
                <div class="container my-3">
                    <?= FlashMessage::widget() ?>
                    <?= $content ?>
                </div>
            </main>

            <?= $this->render('_footer') ?>
        </body>
    <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
