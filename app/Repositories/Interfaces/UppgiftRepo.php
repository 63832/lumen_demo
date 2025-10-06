<?php

namespace App\Repositories\Interfaces;

use App\Models\Uppgift;

interface UppgiftRepo {
    /**
     *Returnerar alla uppgifter
     *@return Uppgift[]
    */
    public function all():array;
    /**
     * Returnerar en uppgift baserat på id
     * @param string $id
     * @retur Uppgift|null 
     */
    public function get(string $id):?Uppgift;

    /**
     * Lägger till en uppgift till samlingen
     * @param Uppgift $uppgift
     * @return void 
     */
    public function add(Uppgift $uppgift):void;

    /**
     * Lägger till en befintlig uppgift 
     * @param Uppgift $uppgift
     * @return void 
     */
    public function update(Uppgift $uppgift):void;

    /**
     * Raderar en uppgift ur listan
     * @param Uppgift $uppgift
     * 
     */
      public function delete(string $id):void;
}