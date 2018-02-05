<?php
namespace App\Helpers;
class CerkauskasCartHelper
{
    // kiek prekių yra
    // kiek visos prekės kainuoja
    // kiek prekių kainos sudaro PVM
    // kiek prekės be PVM kainuoja
    public function getQuantity($collection)
    {
        $count = count($collection);
        return $count;
    }
    public function getTotal($collection)
    {
        $total = 0;
        for ($i=0; $i < count($collection) ; $i++) {
          $total = $total + $collection[$i]->price;
        }
        return number_format($total, 2);

    }
    public function getBeforeTaxes($collection)
    {
        return $this->getTotal($collection) - $this->getVat($collection);
    }
    public function getVat($collection)
    {
        $vat = $this->getTotal($collection) * 0.21;
        return number_format($vat, 2);
    }
}
