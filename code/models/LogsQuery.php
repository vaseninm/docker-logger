<?php

namespace app\models;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Logs]].
 *
 * @see Logs
 */
class LogsQuery extends ActiveQuery
{
    public function setApp(string $app) : LogsQuery
    {
        return $this->andWhere(['app' => $app]);
    }

    public function setDateRange(\DateTime $from = null, \DateTime $to = null) : LogsQuery
    {
        return $this->andWhere('date BETWEEN :from AND :to', [
            'from' => $from ? $from->format(DATE_ATOM) : (new \DateTime('@0'))->format(DATE_ATOM),
            'to' => $to ? $to->format(DATE_ATOM) : (new \DateTime('now'))->format(DATE_ATOM),
        ]);
    }

    public function setProcess(string $process = null) : LogsQuery
    {
        return $process ? $this->andWhere(['app' => $process]) : $this;
    }

    /**
     * @inheritdoc
     * @return Logs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Logs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
