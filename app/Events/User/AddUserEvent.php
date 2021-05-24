<?php

namespace App\Events\User;

use App\Events\Event;

class AddUserEvent extends Event
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $username;

    /**
     * @var int
     */
    private $real_name;

    /**
     * @var int
     */
    private $password;

    /**
     * @var int
     */
    private $phone;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * @return int
     */
    public function getUsername(): int
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getRealName(): int
    {
        return $this->real_name;
    }

    /**
     * @return int
     */
    public function getPassword(): int
    {
        return $this->password;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param int $phone
     */
    public function setPhone(int $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param int $username
     */
    public function setUsername(int $username): void
    {
        $this->username = $username;
    }

    /**
     * @param int $real_name
     */
    public function setRealName(int $real_name): void
    {
        $this->real_name = $real_name;
    }

    /**
     * @param int $password
     */
    public function setPassword(int $password): void
    {
        $this->password = $password;
    }

    public function __construct(int $id, string $username, string $real_name, string $password, string $phone)
    {
        $this->setId($id);
        $this->setPassword($password);
        $this->setPhone($phone);
        $this->setRealName($real_name);
        $this->setUsername($username);
    }

}
