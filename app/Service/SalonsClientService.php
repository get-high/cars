<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class SalonsClientService
{
    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getTwo()
    {
        return Http::withBasicAuth($this->login, $this->password)->get('https://studentsapi.academy.qsoft.ru/api/v1/salons/two_randoms');
    }

    public function getAll()
    {
        return Http::withBasicAuth($this->login, $this->password)->get('https://studentsapi.academy.qsoft.ru/api/v1/salons');
    }
}