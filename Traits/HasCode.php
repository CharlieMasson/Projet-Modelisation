<?php

trait HasCode{
    private string $code; 
    
    public function getCode () : string{
        return $this ->code;
    }

    public function setCode (string $code): void{
        $this->code = substr($code,0,255);
    }
}