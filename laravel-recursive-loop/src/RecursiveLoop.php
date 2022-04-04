<?php

namespace Prismateq\RecursiveLoop;

class RecursiveLoop
{
    /**
     * Start a recursive loop.
     *
     * @param $items
     * @param callable $callback
     * @param callable|null $children
     * @param string $parentPath
     */
    public static function loop($items, callable $callback, callable $children = null, $parentPath = '')
    {
        foreach ($items as $key => $item) {
            $path = $parentPath . '[' . $key . ']';
            $loop = ['key' => $key, 'item' => $item, 'path' => $path];
            if (is_array($item)) {
                if ($children) $children($loop, $callback, $children);
                else static::loop($item, $callback, null, $path);
            } else $callback($loop);
        }
    }
}
