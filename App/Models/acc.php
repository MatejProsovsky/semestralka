<?php

declare(strict_types=1);
namespace App\Models;
use App\Core\Model;


class acc extends Model
{
    protected $ID;
    protected ?string $username;
    protected ?string $password;
    protected ?string $email;
    protected $banned;

    public function __construct(?string $username = null, ?string $email = null, ?string $password = null)
    {
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $banned = 0;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }


    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getBanned()
    {
        return $this->banned;
    }

    /**
     * @param mixed $banned
     */
    public function setBanned($banned): void
    {
        $this->banned = $banned;
    }

    static public function setDbColumns()
    {
        return ['ID', 'username', 'password', 'email','banned'];
    }

    static public function setTableName()
    {
        return 'accounts';
    }
}

