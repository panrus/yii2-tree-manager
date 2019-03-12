<?php

use yii\helpers\Html;

?>
<?= Html::beginTag('div', ['class' => 'dd-nestable', 'id' => $this->context->id]);?>
<?= $this->render('items', ['items' => $items]);?>
<?= Html::endTag('div');?>