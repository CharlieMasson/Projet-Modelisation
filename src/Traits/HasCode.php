<?php
namespace App\Traits;

trait HasCode{
    private string $code; 
    
    public function getCode () : string{
        return $this ->code;
    }

    public function setCode (string $code): void{
        $this->code = $code;
    }
}