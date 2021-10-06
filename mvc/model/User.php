<?php

namespace app\Model;

use Core\AbstractModule;
use Core\DB;

class User extends AbstractModule
{
    const GENDER_MALE = 1;
    const GENDER_FAMALE = 0;


    private $id;
    private $name;
    private $password;
    private $createAt;
    private $gender;

    public function setGender(int $gender): self
    {

        $this->gender = $gender;
        return $this;
    }
    public function setCreateAt(string $createAt): self
    {
        $this->createAt = $createAt;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Geter
     */
    public function getGender(): int
    {
        return $this->gender;
    }

    public function getCreateAt(): string
    {
        return $this->createAt;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function save()
    {
        $db = DB::getInstance();
        $query = "INSERT INTO users (`name`,`password`,`gender`,`createAt`) VALUES (
                                    ':name',':password',':gender',':createAt')";
        $db->exec($query, __METHOD__, [
            ':name' => $this->name,
            ':password' => $this->password,
            ':gender' => $this->getGender(),
            ':createAt' => $this->createAt
        ]);
        $id =  $db->lastInsertId();
        $this->id = $id;
        return $id;
    }

    public static function getPasswordHash($password)
    {
        return \sha1('Hash:dajlkdjas;dkao;' . $password);
    }
    public static function getById(int $id): ?self
    {
        $db = DB::getInstance();
        $select = "SELECT * FROM `users` WHERE id = $id";
        $data = $db->fetchOne($select, __METHOD__);
        if (!$data) {
            return null;
        }
        $model = new self();
        $model->id = $data['id'];
        $model->createAt = $data['createAt'];
        $model->gender = $data['gender'];
        return $model;
    }
    public function getGanderString(): string
    {
        return $this->gender == self::GENDER_MALE  ? "MALE" : "FAMALE";
    }
}
