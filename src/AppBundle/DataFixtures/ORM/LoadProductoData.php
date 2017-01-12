<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Categoria;
use AppBundle\Entity\Producto;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProductoData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
//        $p1->setNombre('Producto 1')
//            ->setCategoria($c1)
//            ->setPrecio(500)
//            ->setEstado('A')
//            ->setOferta(false);

        for($i=1; $i<1001; ++$i){

            $p = new Producto();

            $p->setNombre('Producto ' . $i)
                ->setCategoria()
                ->setPrecio()
                ->setEstado()
                ->setOferta()
                ->setNuevo();

            $manager->persist($p);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}