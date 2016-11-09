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

    /**
     * Check if a given string starts with a given
     * substring.
     *
     * @param string $string
     * @param string $subString
     * @param bool $caseSensitive
     *
     * @return bool
     */
    public static function startsWith($string, $subString, $caseSensitive = true)
    {
        if ($subString === '') {
            return true;
        }

        if ($caseSensitive === false) {
            $string    = strtolower($string);
            $subString = strtolower($subString);
        }

        return (strpos($string, $subString) === 0);
    }

    /**
     * Check if a given string ends with a given
     * substring.
     *
     * @param string $string
     * @param string $subString
     * @param bool $caseSensitive
     *
     * @return bool
     */
    public static function endsWith($string, $subString, $caseSensitive = true)
    {
        if ($subString === '') {
            return true;
        }

        if ($caseSensitive === false) {
            $string    = strtolower($string);
            $subString = strtolower($subString);
        }

        return strrpos($string, $subString) === (strlen($string) - strlen($subString));
    }

}