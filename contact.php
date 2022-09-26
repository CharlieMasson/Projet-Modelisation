<?php

class Contact{

    private int $id;
    private string $email; 
    private string $phone_number;
    private string $role;
    private Host $host;
    private Customer $customer;

    public function construct(int $id, string $email, string $phone_number, string $role, Host $host, Customer $customer)
    {
        $this->id = $id;
        $this->email = substr($email,0,255);
        $this->phone_number = substr($phone_number,0,255);
        $this->role = substr($role,0,255);
        $this->host = $host;
        $this->customer = $customer;
    }
    
    public function getId () : int{
        return $this ->id;
    }

    public function getEmail () : string{
        return $this ->email;
    }

    public function getPhone_number () : string{
        return $this ->phone_number;
    }

    public function getRole () : string{
        return $this ->role;
    }

    public function getHost_id () : Host{
        return $this ->host;
    }

    public function getPhone_number () : Customer{
        return $this ->customer;
    }

    public function setId (int $id): void{
        $this->id = $id;
    }

    public function setEmail (string $email): void{
        $this->email = substr($email,0,255);
    }

    public function setPhone_number (string $phone_number): void{
        $this->phone_number = substr($phone_number,0,255);
    }

    public function setRole (string $role): void{
        $this->role = substr($role,0,255);
    }

    public function setHost (Host $host): void{
        $this->host = $host;
    }

    public function setCustomer (Customer $customer): void{
        $this->customer = $customer;
    }

}
