<?php

class Helper {
    public static function displayAlert()
    {
        list($type, $message) = explode('|', Session::get('message'));
        return sprintf('<div class="alert alert-%s" style="margin-top:20px;">%s</div>', $type, $message);
    }
}