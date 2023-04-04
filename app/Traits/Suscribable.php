<?php

namespace App\Traits;

use App\Models\Suscription;
use App\Models\SuscriptionPackages;
use Carbon\Carbon;
use Cixware\Esewa\Client;
use Cixware\Esewa\Config;

trait Suscribable
{
    public function activeSuscription()
    {
        return $this->suscriptions()->latest()->first();
    }

    public function isSuscribed($planId)
    {
        if ($this->activeSuscription()->package_id == $planId) {
            return true;
        } else {
            return false;
        }
    }

    public function suscribe($planId)
    {
        $plan = SuscriptionPackages::$packages[$planId];
        $suscription = Suscription::create([
            'restaurant_id' => $this->getKey(),
            'package_id' => $plan['id'],
            'package_name' => $plan['name'],
            'started_date' => Carbon::now(),
            'valid_till' => $plan['time'] == 'monthly' ? Carbon::now()->addDay(30) : Carbon::now()->addYear(1),
            'amount' => $plan['price'],
            'payment_method' => 'esewa',
        ]);
        $this->pay($suscription);
    }

    public function pay($suscription)
    {
        // Set success and failure callback URLs.
        $successUrl = route('restaurant.register.success') . '?suscription=' . $suscription->id;
        $failureUrl = route('restaurant.register.failed');

        // Config for development.
        $config = new Config($successUrl, $failureUrl);

        $esewa = new Client($config);

        $esewa->process('MM-SUSCRIBE-' . $suscription->id, $suscription->amount, 0, 0, 0);
    }
}
