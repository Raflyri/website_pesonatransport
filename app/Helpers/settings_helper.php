<?php

use App\Models\SettingModel;

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $model = new SettingModel();
        $value = $model->getValue($key);
        return $value ? $value : $default;
    }
}