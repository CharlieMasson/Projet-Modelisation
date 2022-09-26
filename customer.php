<?php

class Customer{

    public function __construct(
    private string $code, 
    private string $name, 
    private string $notes,)
    {
        $this->code = substr($code,0,255);
        $this->name = substr($name,0,255);
        $this->notes = substr($email,0,1000);
    }
    
    public function getCode () : string{
        return $this ->code;
    }

    public function getName () : string{
        return $this ->name;
    }

    public function getNote () : string{
        return $this ->note;
    }

    public function setCode (string $code): void{
        $this->code = substr($code,0,255);
    }

    public function setName (string $name): void{
        $this->name = substr($name,0,255);
    }

    public function setNotes (string $notes): void{
        $this->email = substr($notes,0,1000);
    }
}