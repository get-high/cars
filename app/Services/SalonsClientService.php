<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SalonsClientService
{
    private $login;
    private $password;
    private $url;

    public function __construct($login, $password, $url)
    {
        $this->login = $login;
        $this->password = $password;
        $this->url = $url;
    }

    public function getTwo()
    {
        return Http::withBasicAuth($this->login, $this->password)->get($this->url.'/two_randoms');
    }

    public function getAll()
    {
        return Http::withBasicAuth($this->login, $this->password)->get($this->url);
    }
}