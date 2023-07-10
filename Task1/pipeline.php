<?php
class Pipeline
{
    public static function make(...$functions)
    {
        return function ($arg) use ($functions) {
            $result = $arg;

            foreach ($functions as $function) {
                $result = $function($result);
            }

            return $result;
        };
    }
}

// Example of use
$pipe = Pipeline::make(
    function ($var) {
        return $var * 3;
    },
    function ($var) {
        return $var + 1;
    },
    function ($var) {
        return $var / 2;
    }
);

$result = $pipe(3);
echo $result; // It will display: 5

?>