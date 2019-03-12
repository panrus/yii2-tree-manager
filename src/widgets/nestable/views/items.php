<?php

use yii\helpers\Html;

?>
<?= Html::beginTag('ol', ['class' => 'dd-list']);?>
<?php foreach ($items as $item): ?>
<?= $this->render('item', ['item' => $item]);?>
<?php endforeach;?>
<?= Html::endTag('ol');?>
