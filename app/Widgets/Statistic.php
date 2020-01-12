<?php

namespace App\Widgets;

use App\Services\BrowserService;
use Illuminate\Support\Facades\DB;
use Arrilot\Widgets\AbstractWidget;
use App\Statistic as StatisticModel;

class Statistic extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $browser = new BrowserService();
        $browser = $browser->getBrowser();
        $ip = $_SERVER['REMOTE_ADDR'];

        if ($this->checkUser($ip) && $ip) {
            $this->addStatistic($ip, $browser);
        }

        return view('widgets.statistic', [
            'staticInfo' => $this->getStatistic()
        ]);
    }

    /**
     * @param $ip
     * @return bool
     */
    private function checkUser($ip)
    {
        $user = StatisticModel::where('ip', $ip)->first();
        return (!empty($user) > 0 ? false : true);
    }

    /**
     * @param string $ip
     * @param string $browser
     */
    private function addStatistic(string $ip, string $browser)
    {
        StatisticModel::create(
            [
                'ip' => $ip,
                'browser' => $browser
            ]
        );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getStatistic()
    {
        $info = DB::table('statistic')
            ->select('browser', DB::raw('count(*) as total'))
            ->groupBy('browser')
            ->get();
        return $info;
    }
}