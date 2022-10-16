<?php
namespace Classes;

use Host;
use Customer;

class Contact implements AllInterface{

    use HasId;

    private int $id;
    private string $email; 
    private string $phoneNumber;
    private string $role;
    private Host $host;
    private Customer $customer;

    public function __construct(int $id, string $email, string $phoneNumber, string $role, Host $host, Customer $customer)
    {
        $this->id = $id;
        $this->email = substr($email,0,255);
        $this->phoneNumber = substr($phoneNumber,0,255);
        $this->role = substr($role,0,255);
        $this->host = $host;
        $this->customer = $customer;
    }

    public function getEmail () : string{
        return $this ->email;
    }

    public function getPhoneNumber () : string{
        return $this ->phoneNumber;
    }

    public function getRole () : string{
        return $this ->role;
    }

    public function getHost () : Host{
        return $this ->host;
    }

    public function getCustomer () : Customer{
        return $this ->customer;
    }

    public function setEmail (string $email): void{
        $this->email = substr($email,0,255);
    }

    public function setPhoneNumber (string $phoneNumber): void{
        $this->phoneNumber = substr($phoneNumber,0,255);
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

    public function echoAll (){

        echo "<h2> Contact : </h2>";
        echo "<ul>";
        echo "<li>id : " . $this->getId() . "</li>";
        echo "<li>email : " . $this->getEmail() . "</li>";
        echo "<li>numéro téléphone : " . $this->getPhoneNumber() . "</li>";
        echo "<li>role : " . $this->getRole() . "</li>";
        echo "<li>nom Host : " . $this->getHost()->getName() . "</li>";
        echo "<li>nom Customer : " . $this->getCustomer()->getName() . "</li>";
        echo "</ul>";
        echo "<br>";

    }
    
}
