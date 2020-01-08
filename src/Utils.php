<?php

namespace App;

class Utils
{
    public function redirect(string $location)
    {
        header('Location:' . $location);
        exit;
    }
}
