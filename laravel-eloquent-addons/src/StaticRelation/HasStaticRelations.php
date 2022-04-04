<?php

namespace Prismateq\EloquentAddons\StaticRelation;

use Prismateq\EloquentAddons\DynamicMutators\HasDynamicMutators;
use RuntimeException;

trait HasStaticRelations
{
    use HasDynamicMutators;

    protected static $staticRelationData = [];

    protected function getStaticRelationsAttribute()
    {
        return isset($this->staticRelations) && is_array($this->staticRelations)
            ? $this->staticRelations
            : [];
    }

    protected function isAttributeStaticRelation($key)
    {
        return array_key_exists($key, $this->getStaticRelationsAttribute());
    }

    public function getStaticRelationData($key)
    {
        if (!array_key_exists($key, static::$staticRelationData)) {
            if (!$staticRelation = ($this->getStaticRelationsAttribute()[$key] ?? null)) return false;
            $exploded = explode(',', $staticRelation);
            $dataPath = explode(':', $exploded[1] ?? '', 2);
            if (count($dataPath) != 2) throw new RuntimeException('Static relation configuration is invalid.');
            if ($dataPath[0] == 'config') $data = config($dataPath[1]);
            elseif ($dataPath[0] == 'const') $data = constant('static::' . $dataPath[1]);
            if (!isset($data) || !is_array($data)) throw new RuntimeException('Static relation data must be array.');
            static::$staticRelationData[$key] = [
                'attribute' => $exploded[0],
                'data' => $data,
                'set_by' => $exploded[2] ?? null,
                'get_by' => $exploded[3] ?? null,
            ];
        }
        return static::$staticRelationData[$key];
    }

    protected function getStaticRelationIndex($key, $value, $throwIfCantFind = true)
    {
        if (!$staticRelation = $this->getStaticRelationData($key)) throw new RuntimeException('Argument "' . $key . '" is not Static Relation.');
        if ($value !== null) {
            if (!$staticRelation['set_by']) $index = array_search($value, $staticRelation['data']);
            else {
                foreach ($staticRelation['data'] as $dataKey => $dataValue) {
                    if (($dataValue[$staticRelation['set_by']] ?? '') == $value) {
                        $index = $dataKey;
                        break;
                    }
                }
            }
            if (!isset($index) || $index === false) {
                if ($throwIfCantFind) throw new RuntimeException('Undefined value "' . $value . '".');
                return false;
            }
        } else $index = null;
        return $index;
    }

    public function staticRelation($key, $onlyGetBy = false)
    {
        if (!$staticRelation = $this->getStaticRelationData($key)) throw new RuntimeException('Argument "' . $key . '" is not Static Relation.');
        $result = $staticRelation['data'][$this->attributes[$staticRelation['attribute']]] ?? null;
        if ($onlyGetBy && $staticRelation['get_by']) return $result[$staticRelation['get_by']] ?? null;
        return $result;
    }

    protected function dynamicGetterStaticRelation($key, &$result)
    {
        if (!$this->isAttributeStaticRelation($key)) return false;
        $result = $this->staticRelation($key, true);
        return true;
    }

    protected function dynamicSetterStaticRelation($key, $value)
    {
        if (!$staticRelation = $this->getStaticRelationData($key)) return false;
        $this->attributes[$staticRelation['attribute']] = $this->getStaticRelationIndex($key, $value);
        return true;
    }

    public function scopeWhereStaticRelation($query, $key, $operator = null, $value = null, $boolean = 'and')
    {
        if (func_num_args() == 3) {
            $value = $operator;
            $operator = '=';
        }
        if (!in_array($operator, ['=', '<>', '!='])) throw new RuntimeException('Only "=, <>, !=" operators are available.');
        $column = $this->getTable() . '.' . $this->getStaticRelationData($key)['attribute'];
        $value = $this->getStaticRelationIndex($key, $value, false);
        if ($value === false) {
            if ($operator == '=') $raw = 0;
            else $raw = 1;
            return $query->whereRaw($raw, [], $boolean);
        }
        return $query->where($column, $operator, $value, $boolean);
    }

    public function scopeOrWhereStaticRelation($query, $column, $operator = null, $value = null)
    {
        if (func_num_args() == 3) {
            $value = $operator;
            $operator = '=';
        }
        return $this->scopeWhereStaticRelation($query, $column, $operator, $value, 'or');
    }
}
