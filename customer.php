<?php

class Customer{

    public function __construct(
    private int $id,
    private string $code, 
    private string $name, 
    private string $notes,)
    {
        $this->id = $id;
        $this->code = substr($code,0,255);
        $this->name = substr($name,0,255);
        $this->notes = substr($notes,0,1000);
    }
    
    public function getId () : int{
        return $this->id;
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
    
    public function setId () : void{
        $this->id = $id;
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
