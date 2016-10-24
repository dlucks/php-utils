<?php

class Str {

    /**
     * Convert a camel case formatted string into
     * snake case format.
     *
     * @param $string
     *
     * @return string
     */
    public static function toSnakeCase($string)
    {
        $string = preg_replace('/(.)(?=[A-Z])/u', '$1_', $string);
        $string = strtolower($string);

        return $string;
    }

    /**
     * Convert a snake case formatted string into
     * camel case format.
     *
     * @param string $string
     *
     * @return string
     */
    public static function toCamelCase($string)
    {
        $string = ucwords((string)$string, '_');
        $string = lcfirst($string);
        $string = str_replace('_', '', $string);

        return $string;
    }

}