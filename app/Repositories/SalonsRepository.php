<?php

namespace App\Repositories;

use App\Contracts\SalonsRepositoryContract;
use App\Service\SalonsClientService;

class SalonsRepository implements SalonsRepositoryContract
{
    protected $salonsClientService;

    public function __construct(SalonsClientService $salonsClientService)
    {
        $this->salonsClientService = $salonsClientService;
    }

    public function getTwo()
    {
        return $this->salonsClientService->getTwo();
    }

    public function getAll()
    {
        return $this->salonsClientService->getAll();
    }
}