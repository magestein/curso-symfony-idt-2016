<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Categoria;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoriaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
//        $categorias = [
//            'electrodomesticos' => 'Electrodomésticos',
//            'juegos-y-consolas' => 'Juegos y Consolas',
//            'celulares' => 'Celulares',
//            'ropa' => 'Ropa'
//        ];

        $categorias = [
            'Electrodomésticos',
            'Juegos y Consolas',
            'Celulares',
            'Ropa'
        ];

        $estados = ['A', 'I'];

        foreach($categorias as $nombre){

            $c = new Categoria();
            $c->setNombre($nombre);
            $c->setEstado($estados[array_rand($estados)]);

            $manager->persist($c);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}