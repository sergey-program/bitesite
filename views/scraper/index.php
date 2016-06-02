<?php

/**
 * @var \yii\web\View $this
 * @var string        $content
 */
use yii\bootstrap\Html;

?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Запустить скрапер</h3>
            </div>

            <?= Html::beginForm(); ?>

            <div class="panel-body text-center">
                <?= Html::submitButton('поехали', ['class' => 'btn btn-primary']); ?>
                <?= Html::a('список спаршенных', ['estate/list'], ['class' => 'btn btn-info ']); ?>
            </div>

            <?= Html::endForm(); ?>
        </div>
    </div>
</div>