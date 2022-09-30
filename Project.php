<?php

/*require_once 'host.php';
require_once 'customer.php';*/

class Project
{
    private int $id;
    private string $name;
    private string $code;
    private string $lastpass_folder;
    private string $link_mock_ups;
    private bool $managed_server;
    private string $note;
    private Host $host;
    private Customer $customer;
    public function  __construct( $id, $name, $code, $lastpass_folder, $link_mock_ups, $managed_server, $note, $host, $customer)
    {
        $this->id = $id;
        $this->name = substr($name,0, 255);
        $this->code = substr($code, 0, 255);
        $this->lastpass_folder = substr($lastpass_folder, 0, 255);
        $this->link_mock_ups = substr($link_mock_ups, 0, 255);
        $this->managed_server = $managed_server;
        $this->note = substr($note, 0, 1000);
        $this->host = $host;
        $this->customer = $customer;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCode(): string
    {
        return $this->code;
    }
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getLastpassFolder(): string
    {
        return $this->lastpass_folder;
    }
    public function setLastpassFolder(string $lastpass_folder): void
    {
        $this->lastpass_folder = $lastpass_folder;
    }

    public function getLinkMockUps(): string
    {
        return $this->link_mock_ups;
    }
    public function setLinkMockUps(string $link_mock_ups): void
    {
        $this->link_mock_ups = $link_mock_ups;
    }

    public function getManagedServer(): bool
    {
        return $this->managed_server;
    }
    public function setManagedServer(bool $managed_server): void
    {
        $this->managed_server = $managed_server;
    }

    public function getNote(): string
    {
        return $this->note;
    }
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    public function getHost(): Host
    {
        return $this->host;
    }

    public function setHost(Host $host): void
    {
        $this->host = $host;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }
}