<?php

use App\Models\Super_model;

/************************* add ******************************* */
if (!function_exists('add')) {
    function add($table, $select)
    {
        $user_model = new Super_model();
        return $user_model->add($table, $select);
    }
}
