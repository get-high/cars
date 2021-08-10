<?php

namespace App\Repositories;

use App\Contracts\SalonsRepositoryContract;
use App\Services\SalonsClientService;

class SalonsRepository implements SalonsRepositoryContract
{
    protected $salonsClientService;

    public function __construct(SalonsClientService $salonsClientService)
    {
        $this->salonsClientService = $salonsClientService;
    }

    public function getTwo()
    {
        return \Cache::tags(['salons'])->remember('two_salons', 300, function () {
            return $this->salonsClientService->getTwo()->object();
        });
    }

    public function getAll()
    {
        return \Cache::tags(['salons'])->remember('all_salons', 3600, function () {
            return $this->salonsClientService->getAll()->object();
        });
    }
}