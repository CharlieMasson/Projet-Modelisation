<?php

class Customer implements AllInterface{

    use HasId;
    use HasName;
    use HasNotes;
    use HasCode;

    private int $id;
    private string $code; 
    private string $name;
    private string $notes;

    public function __construct(int $id, string $code, string $name, string $notes)
    {
        $this-> id = $id;
        $this->code = substr($code,0,255);
        $this->name = substr($name,0,255);
        $this->notes = substr($notes,0,1000);
    }

    public function echoAll(){
        echo "<h2> Customer : </h2>";
        echo "<ul>";
        echo "<li>Id: " . $this->getId() . "</li>";
        echo "<li>Code: " . $this->getCode() . "</li>";
        echo "<li>Name: " . $this->getName() . "</li>";
        echo "<li>Notes: " . $this->getNotes() . "</li>";
        echo "</ul>";
    }

}
