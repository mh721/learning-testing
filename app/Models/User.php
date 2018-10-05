<?php

namespace App\Models;

class User
{
    public $first_name;
    public $last_name;
    public $email;

    public function setFirstName($firstName) {
        $this->first_name = $firstName;
    }

    public function getFirstName() {
        return trim($this->first_name);
    }

    public function setLastName($lastName) {
        $this->last_name = $lastName;
    }

    public function getLastName() {
        return trim($this->last_name);
    }

    public function getFullName() {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return trim($this->email);
    }

    public function getEmailVariables() {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }
}