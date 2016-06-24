<?php

class Arr
{
    /**
     * Separator for multi keys accessing values
     * in multidimensional arrays.
     */
    const MULTI_KEY_SEPARATOR = '.';

    /**
     * Get a value from an array. If given array is
     * multidimensional, a multi-key can be given to
     * access nested array fields.
     *
     * A multi key can be something like 'key1.key2'.
     *
     * @param array $array
     * @param string $key
     * @param null $default
     *
     * @return mixed
     */
    public static function get($array, $key, $default = null)
    {
        if (!is_array($array)) {
            return $default;
        }

        if (strpos($key, self::MULTI_KEY_SEPARATOR) !== false) {

            $multiKey   = explode(self::MULTI_KEY_SEPARATOR, $key);
            $firstKey   = array_shift($multiKey);
            $innerArray = Arr::get($array, $firstKey);

            return Arr::get($innerArray, implode(self::MULTI_KEY_SEPARATOR, $multiKey), $default);
        }

        return (array_key_exists($key, $array) ? $array[$key] : $default);
    }

    /**
     * Check if given variable is traversable.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public static function isTraversable($value)
    {
        if (is_array($value)) {
            return true;
        }

        return (is_object($value) && ($value instanceof Traversable));
    }

    /**
     * Remove a given set of values from an array
     * and return it.
     *
     * @param array $array
     * @param array $values
     *
     * @return array
     */
    public static function removeValues($array, $values)
    {
        if (!is_array($values)) {
            $values = array($values);
        }

        foreach ($array as $key => $value) {
            if (array_search($value, $values) !== false) {
                unset($array[$key]);
            }
        }

        return $array;
    }
}
