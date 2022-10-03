<?php

trait HasNotes{
    private string $notes;

    public function getNotes () : string{
        return $this ->notes;
    }

    public function setNotes (string $notes): void{
        $this->email = substr($notes,0,1000);
    }
}