<?php

declare(strict_types=1);

namespace App\Asset;

use Yiisoft\Yii\Bootstrap5\Assets\BootstrapAsset as BaseAsset;

final class BootstrapAsset extends BaseAsset
{

    public ?string $basePath = '@public/assets';
    public ?string $baseUrl = '@assetsUrl';
}
