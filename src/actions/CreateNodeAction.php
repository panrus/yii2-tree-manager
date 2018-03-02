<?php

namespace voskobovich\tree\manager\actions;

use Yii;
use voskobovich\tree\manager\interfaces\TreeInterface;
use yii\db\ActiveRecord;
use yii\web\HttpException;

/**
 * Class CreateNodeAction
 * @package voskobovich\tree\manager\actions
 */
class CreateNodeAction extends BaseAction
{
    /**
     * @return null
     * @throws HttpException
     */
    public function run()
    {
        /** @var TreeInterface|ActiveRecord $model */
        $model = Yii::createObject($this->modelClass);

        $params = Yii::$app->getRequest()->post();
        $model->load($params);

        if (!$model->validate()) {
            return $model;
        }

        if ($parentId = Yii::$app->getRequest()->post('parentId')) {
            $parent = $this->findModel($parentId);
            return $model->appendTo($parent)->save();
        } else {
            return $model->makeRoot()->save();
        }
    }
}