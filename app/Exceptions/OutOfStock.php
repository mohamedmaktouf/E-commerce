<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Lang;

class OutOfStock extends Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }
    public function render()
    {
        return response()->json(['message'=>$this->message],409);
    }
}
