<?php

use \yii\helpers\Html;

$htmlOptions = ['class' => 'dd-item'];
$htmlOptions['data-id'] = !empty($item['id']) ? $item['id'] : '';

echo Html::beginTag('li', $htmlOptions);

echo Html::tag('div', '', ['class' => 'dd-handle']);
echo Html::tag('div', $item['name'], ['class' => 'dd-content']);

echo Html::beginTag('div', ['class' => 'dd-edit-panel']);
echo Html::input('text', null, $item['name'],
    ['class' => 'dd-input-name', 'placeholder' => $this->context->getPlaceholderForName()]);

echo Html::beginTag('div', ['class' => 'btn-group']);
echo Html::button(Yii::t('vendor/voskobovich/yii2-tree-manager/widgets/nestable', 'Save'), [
    'data-action' => 'save',
    'class' => 'btn btn-success btn-sm',
]);
echo Html::button(Yii::t('vendor/voskobovich/yii2-tree-manager/widgets/nestable', 'Add node'), [
    'data-toggle' => 'modal',
    'data-action' => 'add-node',
    'data-parent-id' => $item['id'],
    'data-target' => "#{$this->context->id}-new-node-modal",
    'class' => 'btn btn-info btn-sm'
]);
echo Html::button(Yii::t('vendor/voskobovich/yii2-tree-manager/widgets/nestable', 'Delete'), [
    'data-action' => 'delete',
    'class' => 'btn btn-danger btn-sm'
]);
echo Html::a(Yii::t('vendor/voskobovich/yii2-tree-manager/widgets/nestable', 'Advanced editing'), $item['update-url'], [
    'data-action' => 'advanced-editing',
    'class' => 'btn btn-default btn-sm',
    'target' => '_blank'
]);
echo Html::endTag('div');

echo Html::endTag('div');

if (isset($item['children']) && count($item['children'])) {
    echo $this->render('items', ['items' => $item['children']]);
}

echo Html::endTag('li');