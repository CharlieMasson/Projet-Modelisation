<?php
class Host{
    private int $id,
    private string $code,
    private string $name,
    private string $notes
    
    public function construct(int $id, string $code, string $name, string $notes){   
        $this->id = $id;
        $this->code = substr($code,0,255);
        $this->name = substr($name,0,255);
        $this->notes = substr($notes,0,255);
        if($id = ())
    
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getCode(): string
    {
        return $this->code;
    }
    public function getName(): string
    {
        return $this->email;
    }
    public function getNotes(): string
    {
        return $this->notes;
    }

    public function setId (string $newId)
    {
        $this->id = $newId;
    }
    public function setCode (string $newCode)
    {
        $this->code = substr($code,0,255);;
    }
    public function setName (string $newName)
    {
        $this->name = substr($name,0,255);;
    }
    public function setNotes (string $newNotes)
    {
        $this->notes = substr($notes,0,255);;
    }

    
}

?>
