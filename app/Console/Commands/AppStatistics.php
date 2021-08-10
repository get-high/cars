<?php

namespace App\Console\Commands;

use App\Services\StatisticsBuilder;
use Illuminate\Console\Command;

class AppStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'App Statistics';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(StatisticsBuilder $statisticsBuilder)
    {
        $headers = ['Статистика', 'Данные'];
        $data = [
            ['Общее количество машин', $statisticsBuilder->getTotalCars()],
            ['Общее количество новостей', $statisticsBuilder->getTotalArticles()],
            ['Самый попуряный тег', $statisticsBuilder->getPopTag()],
            ['Самая длинная новость', $statisticsBuilder->getMostBiggestArticle()],
            ['Cамая короткая новость', $statisticsBuilder->getMostShortestArticle()],
            ['Ср. кол-во новостей у тега', $statisticsBuilder->getAvg()],
            ['Самая тегированная новость', $statisticsBuilder->getMostTaggedArticle()],
        ];
        $this->table($headers, $data);
    }
}
