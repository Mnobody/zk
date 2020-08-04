<?php

declare(strict_types=1);

/* @var App\ApplicationParameters $applicationParameters */
?>

<footer class="zk-footer footer mt-auto py-4 bg-light text-center text-sm-left">
    <div class="container">
        <p class="mt-2 mb-0 text-center">
            <i class="far fa-copyright" aria-hidden="true"></i>
            <a href="/">
                <?= implode([$applicationParameters->getName(), ' - ', date('Y')]) ?>
            </a>
        </p>
    </div>
</footer>
