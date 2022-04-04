<?php

namespace Prismateq\EloquentAddons\Flagable;

use RuntimeException;

trait HasFlags
{

    /**
     * Get flagables list.
     *
     * @return array
     */
    protected function getFlagables()
    {
        return isset($this->flagable) && is_array($this->flagable) ? $this->flagable : [];
    }

    /**
     * Check if a model has flag in flagables list.
     *
     * @param string $flag
     * @return bool
     */
    protected function hasFlagable(string $flag)
    {
        return in_array($flag, $this->getFlagables());
    }

    /**
     * Getter for flags.
     *
     * @param $value
     * @return array
     */
    public function getFlagsAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    /**
     * Setter for flags.
     *
     * @param mixed $value
     * @return void
     */
    public function setFlagsAttribute($value)
    {
        $this->attributes['flags'] = null;
        if ($value) $this->addFlag($value);
    }

    /**
     * Check if a model has flag(s).
     *
     * @param string|array $flag
     * @return bool
     */
    public function hasFlag($flag)
    {
        $flags = is_array($flag) ? $flag : [$flag];
        foreach ($flags as $flag) {
            if (!in_array($flag, $this['flags'])) return false;
        }
        return true;
    }

    /**
     * Add flag(s) to a model.
     *
     * @param string|array $flag
     * @param bool $save
     */
    public function addFlag($flag, bool $save = false)
    {
        $flags = is_array($flag) ? $flag : [$flag];
        $allFlags = $this['flags'];
        foreach ($flags as $flag) {
            if (!$this->hasFlagable($flag)) throw new RuntimeException('Flag "' . $flag . '" is not flagable.');
            if (in_array($flag, $allFlags)) continue;
            $allFlags[] = $flag;
        }
        $this->attributes['flags'] = json_encode($allFlags);
        if ($save) $this->save();
    }

    /**
     * Remove flag(s) from a model.
     *
     * @param string|array $flag
     * @param bool $save
     */
    public function removeFlag($flag, bool $save = false)
    {
        $allFlags = $this['flags'];
        $flags = is_array($flag) ? $flag : [$flag];
        foreach ($flags as $flag) {
            if (($key = array_search($flag, $allFlags)) === false) continue;
            array_splice($allFlags, $key, 1);
        }
        $this['flags'] = $allFlags;
        if ($save) $this->save();
    }

    /**
     * Add flag(s) exists condition to the query.
     *
     * @param $query
     * @param string|array $flag
     * @return mixed
     */
    public function scopeWhereHasFlag($query, $flag)
    {
        return $query->whereJsonContains('flags', $flag);
    }

    /**
     * Add flag(s) exists condition to the query with an "or".
     *
     * @param $query
     * @param $flag
     * @return mixed
     */
    public function scopeOrWhereHasFlag($query, $flag)
    {
        return $query->orWhereJsonContains('flags', $flag);
    }

    /**
     * Add flag(s) does not exist condition to the query.
     *
     * @param $query
     * @param $flag
     * @return mixed
     */
    public function scopeWhereDoesntHaveFlag($query, $flag)
    {
        return $query->where(function($query) use ($flag) {
            $query->whereNull('flags')->orWhereJsonDoesntContain('flags', $flag);
        });
    }

    /**
     * Add flag(s) does not exist condition to the query with an "or".
     *
     * @param $query
     * @param $flag
     * @return mixed
     */
    public function scopeOrWhereDoesntHaveFlag($query, $flag)
    {
        return $query->orWhere(function($query) use ($flag) {
            $query->whereNull('flags')->orWhereJsonDoesntContain('flags', $flag);
        });
    }
}
