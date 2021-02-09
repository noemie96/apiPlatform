<?php

namespace App\Controller;

use App\Entity\Invoice;
use Doctrine\ORM\EntityManagerInterface;

class InvoiceIncrementationController 
{
   private $manager;

   public function __construct(EntityManagerInterface $manager)
   {
       $this->manager = $manager;
   }

   /* Quand on appel un objet comme une focntion, la fonction magique __invoke s'active */

   public function __invoke(Invoice $data)
   {
    $data->setChrono($data->getChrono() +1);
    $this->manager->persist($data);
    $this->manager->flush();
    dd($data);

    
   }
   



}
