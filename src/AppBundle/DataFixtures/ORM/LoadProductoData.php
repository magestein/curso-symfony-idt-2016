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
        $categorias = $manager
            ->getRepository('AppBundle:Categoria')
            ->findAll();

        $estados = ['A', 'I'];

        $precios = [100, 50.20, 59.99, 30, 40, 80, 55, 46];

        $oferta = [true, false];

        $nuevo = [
            $this->sumarFecha('P10D'),
            $this->sumarFecha('P1D'),
            new \DateTime('now'),
            $this->restarFecha('P10D'),
            $this->restarFecha('P1D'),
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
        ];

        for($i=1; $i<2001; ++$i){

            $p = new Producto();

            $p->setNombre('Producto ' . $i)
                ->setCategoria($categorias[array_rand($categorias)])
                ->setPrecio($precios[array_rand($precios)])
                ->setEstado($estados[array_rand($estados)])
                ->setOferta($oferta[array_rand($oferta)])
                ->setNuevo($nuevo[array_rand($nuevo)]);

            $manager->persist($p);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }

    private function sumarFecha($dias){
        $f1 = new \DateTime('now');
        $f1->add(new \DateInterval($dias));
        return $f1;
    }

    private function restarFecha($dias){
        $f1 = new \DateTime('now');
        $f1->sub(new \DateInterval($dias));
        return $f1;
    }
}