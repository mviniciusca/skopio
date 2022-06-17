<?php

namespace App\Services\Functions;

class PasswordMaker
{
    /**
     * Undocumented function
     *
     * @param [type] $password
     * @return void
     */
    public static function make($password)
    {
        $options = [
        'cost' => 12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @param [type] $password
     * @return void
     */
    public static function check($field, $password)
    {
        if (password_verify($field, $password)) {
            return true;
        } else {
            return false;
        }
    }
}
