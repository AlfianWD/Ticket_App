<?php

namespace App\Observers;

use App\Models\Antrian;

class AntrianObserver
{
   public function saving(Antrian $antrian) {
    $antrian->tanggal = now();
   }
}
