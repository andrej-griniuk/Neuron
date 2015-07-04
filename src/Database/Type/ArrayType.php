<?php
namespace App\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type;
use PDO;

class ArrayType extends Type
{

    public function toPHP($value, Driver $driver)
    {
        $value = trim($value, '|');

        return explode('|', $value);
    }

    public function toDatabase($value, Driver $driver)
    {
        if (!$value) {
            return '';
        }

        return '|' . implode('|', $value) . '|';
    }

    public function toStatement($value, Driver $driver)
    {
        return PDO::PARAM_STR;
    }

}
