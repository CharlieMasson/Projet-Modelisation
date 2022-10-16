<?php
namespace Classes;

class Host implements AllInterface{

    use HasId;
    use HasName;
    use HasNotes;
    use HasCode;

    private int $id;
    private string $code;
    private string $name;
    private string $notes;
    
    public function __construct(int $id, string $code, string $name, string $notes){   
        $this->id = $id;
        $this->code = substr($code,0,255);
        $this->name = substr($name,0,255);
        $this->notes = substr($notes,0,255);
    }

    public function echoAll(){
        echo "<h2> Host : </h2>";
    echo "<ul>";
    echo "<li>id : " . $this->getId() . "</li>";
    echo "<li>code : " . $this->getCode() . "</li>";
    echo "<li>nom : " . $this->getName() . "</li>";
    echo "<li>notes : " . $this->getNotes() . "</li>";
    echo "</ul>";
    }
    
}

?>
