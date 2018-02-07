<?php
namespace App\Helpers;
class CerkauskasCartHelper
{
    // kiek prekių yra
    // kiek visos prekės kainuoja
    // kiek prekių kainos sudaro PVM
    // kiek prekės be PVM kainuoja
    public function getQuantity(Array $collection)
    {
        $count = count($collection);
        return $count;
    }
    public function getTotal(Array $collection)
    {
        $total = 0;
        for ($i=0; $i < count($collection) ; $i++) {
          $total = $total + $collection[$i]->price;
        }
        return number_format($total, 2);

    }
    public function getBeforeTaxes(Array $collection)
    {
        return $this->getTotal($collection) - $this->getVat($collection);
    }
    public function getVat(Array $collection)
    {
        $vat = $this->getTotal($collection) * 0.21;
        return number_format($vat, 2);
    }

    public function getSum(Array $collection)
    {
      $total = 0;
      for ($i=0; $i < count($collection) ; $i++) {
        $total = $total + $collection[$i];
      }
      return number_format($total, 2);
    }

}
