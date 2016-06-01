<?php

class Arr {

	public static function get($array, $key, $default = null)
	{
        if (!is_array($array)) {
            return $default;
        }

		return (array_key_exists($key, $array) ? $array[$key] : $default);
	}

	public static function isTraversable($value)
    {
        // Obviously an array is traversable.
        if (is_array($value)) {
            return true;

        // If it is an object implementing the `Traversable` interface, it is also traversable.
        } else {
            return (is_object($value) && ($value instanceof Traversable));
        }
    }

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