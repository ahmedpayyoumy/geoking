<?php

namespace Prismateq\EloquentAddons\StaticRelation;

use Illuminate\Database\Eloquent\Model;
use RuntimeException;

class StaticRelation
{

    private static function getStaticRelation($model, $key)
    {
        if (!class_exists($model)) {
            $className = config('eloquent-addons.model_namespace') . $model;
            if (!class_exists($className)) throw new RuntimeException('Class "' . $model . '" does\'nt exist.');
            $model = $className;
        }
        $instance = new $model();
        if (!$instance instanceof Model) throw new RuntimeException('"' . $model . '" is not Model.');
        if (!array_key_exists(HasStaticRelations::class, class_uses_recursive($instance))) throw new RuntimeException('Model "' . $model . '" does\'nt use "HasStaticRelations" trait.');
        $staticRelation = $instance->getStaticRelationData($key);
        unset($model);
        if (!$staticRelation) throw new RuntimeException('Key "'.$key.'" is not Static Relation.');
        return $staticRelation;
    }

    public static function list($model, $key, $reversed = false, $onlyGetBy = false)
    {
        $staticRelation = static::getStaticRelation($model, $key);
        if (!$reversed) {
            if (!$onlyGetBy || !$staticRelation['get_by']) return $staticRelation['data'];
            return static::map($staticRelation, null, null, $staticRelation['get_by']);
        }
        if (!$staticRelation['set_by']) return array_flip($staticRelation['data']);
        return static::map($staticRelation, null, $staticRelation['set_by'], null);
    }

    public static function map($model, $key, $keyForKey, $keyForValue)
    {
        if (is_array($model)) $staticRelation = $model;
        else $staticRelation = static::getStaticRelation($model, $key);
        $result = [];
        foreach ($staticRelation['data'] as $index => $data) {
            if ($keyForKey === null) $dataIndex = $index;
            else if (isset($data[$keyForKey])) $dataIndex = $data[$keyForKey];
            else continue;
            if ($keyForValue === null) $dataValue = $index;
            else if (isset($data[$keyForValue])) $dataValue = $data[$keyForValue];
            else continue;
            if (!array_key_exists($dataIndex, $result)) $result[$dataIndex] = $dataValue;
        }
        return $result;
    }
}
