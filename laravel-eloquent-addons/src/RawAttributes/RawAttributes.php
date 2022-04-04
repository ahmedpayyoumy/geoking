<?php

namespace Prismateq\EloquentAddons\RawAttributes;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

trait RawAttributes
{
    public function getRaw($key = null)
    {
        if ($key) return $this->attributes[$key] ?? null;
        return $this->attributes;
    }

    public function setRaw($data, $value = null)
    {
        if (!is_array($data)) $data = [$data => $value];
        foreach ($data as $key => $value) {
            $this->attributes[$key] = $value;
        }
        $this->classCastCache = [];
        $this->syncChanges();
    }

    public function cloneRaw(array $data, ?array $only = null)
    {
        $clone = clone $this;
        if ($only) $data = Arr::only($data, $only);
        $clone->setRaw($data);
        return $clone;
    }
}

