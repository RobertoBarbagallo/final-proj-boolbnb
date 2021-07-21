<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services=["Bagno privato","Vasca o doccia", "Terrazza", "Giardino", "TV a schermo piatto", "Telefono" ,"Armadietti", "Possibilità di colazione in camera" , "Minibar" , "Parcheggio per disabili", "Deposito bagagli", "Servizio pulizie giornaliero","Check-in e check-out express","Reception 24 ore su 24", "Cassaforte", "Navetta aeroportuale", "Aria condizionata", "Sveglia telefonica", "Riscaldamento", "Accesso su sedia a rotelle", "Wi-Fi", ];
        foreach ($services as $service) {
            $new_service = new Service();
            $new_service->name = $service;
            $new_service->save();
        }
    }
}
