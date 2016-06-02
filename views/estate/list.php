<?php

/**
 * @var \yii\web\View        $this
 * @var \app\models\Estate[] $estates
 */
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <?php if ($estates): ?>
            <ul class="list-group">
                <?php foreach ($estates as $estate): ?>
                    <li class="list-group-item">
                        <?= $estate->getAttributeLabel('id'); ?>: <?= $estate->id; ?>
                        <br/>
                        <?= $estate->getAttributeLabel('description'); ?>: <?= \Yii::$app->formatter->asText($estate->description); ?>
                        <br>
                        <p class="text-muted">ну и т.д.</p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-muted text-center">бд пустая</p>
        <?php endif; ?>

    </div>
</div>
