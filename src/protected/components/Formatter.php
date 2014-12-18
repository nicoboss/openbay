<?php

class Formatter extends CFormatter
{
    public function formatReverseSize($size = 0, $type = 'b')
    {
        $type = mb_strtolower($type);
        if ($type == 'kb') {
            return $size * 1024;
        } else if ($type == 'mb') {
            return $size * 1024 * 1024;
        } else if ($type == 'gb') {
            return $size * 1024 * 1024 * 1024;
        } else {
            return $size;
        }
    }

    public function formatAge($value)
    {
        $now = new DateTime();
        $created = new DateTime($value);

        $interval = $now->diff($created);

        if ($interval->y) {
            $format = '%y ' . Yii::t('site', 'year|years', $interval->y);
        } else if ($interval->m) {
            $format = '%m ' . Yii::t('site', 'month|months', $interval->m);
        } else if ($interval->days) {
            $format = '%a ' . Yii::t('site', 'day|days', $interval->days);
        } else if ($interval->h) {
            $format = '%h ' . Yii::t('site', 'hour|hours', $interval->h);
        } else {
            $format = '%i ' . Yii::t('site', 'min', $interval->i);
        }

        return $interval->format($format);
    }
}