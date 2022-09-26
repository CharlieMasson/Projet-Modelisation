<?php

class Environment{

    private int $id; 
    private string $name;
    private string $link;
    private string $ip_adress;
    private string $ssh_port;
    private string $ssh_username;
    private string $phpmyadmin_link;
    private bool $ip_restriction;
    private Project $project;

    public function construct(int $id, string $name, string $link, string $ip_adress, string $ssh_port, string $ssh_username, string $phpmyadmin_link, bool $ip_restriction, Project $project)
    {
        $this->id = $id;
        $this->name = substr($name,0,255);
        $this->link = substr($link,0,255);
        $this->ip_adress = substr($ip_adress,0,255);
        $this->ssh_port = substr($ssh_port,0,6);
        $this->ssh_username = substr($ssh_username,0,255);
        $this->phpmyadmin_link = substr($phpmyadmin_link,0,255);
        $this->ip_restriction = $ip_restriction;
        $this->project = $project;
    }
    
    public function getId () : int{
        return $this ->id;
    }

    public function getName () : string{
        return $this ->name;
    }

    public function getLink () : string{
        return $this ->link;
    }

    public function getIp_adress () : string{
        return $this ->ip_adress;
    }

    public function getSsh_port () : string{
        return $this ->ssh_port;
    }

    public function getSsh_username () : string{
        return $this ->ssh_username;
    }

    public function getPhpmyadmin_link () : string{
        return $this ->phpmyadmin_link;
    }

    public function getIp_restriction () : string{
        return $this ->ip_restriction;
    }

    public function getProject () : Project {
        return $this->project;
    }

    public function setId (int $id): void{
        $this->id = $id;
    }

    public function setName (string $name): void{
        $this->name = substr($name,0,255);
    }
    
    public function setLink (string $link): void{
        $this->link = substr($link,0,255);
    }

    public function setIp_adress (string $ip_adress): void{
        $this->ip_adress = substr($ip_adress,0,255);
    }

    public function setSsh_port (string $ssh_port): void{
        $this->ssh_port = substr($ssh_port,0,6);
    }

    public function setSsh_username (string $ssh_username): void{
        $this->ssh_username = substr($ssh_username,0,255);
    }

    public function setPhpmyadmin_link (string $phpmyadmin_link): void{
        $this->phpmyadmin_link = substr($phpmyadmin_link,0,255);
    }

    public function setIp_restriction (bool $ip_restriction): void{
        $this->ip_restriction = $ip_restriction;
    }

    public function setProject (Project $project): void{
        $this->project = $project;
    }
    
}
