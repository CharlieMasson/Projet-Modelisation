<?php 
namespace App\Traits;

trait HasId{
    private int $id;

    public function getId () : int{
        return $this -> id;
    }

    public function setId (int $id): void{
        $this->id = $id;
    }

}