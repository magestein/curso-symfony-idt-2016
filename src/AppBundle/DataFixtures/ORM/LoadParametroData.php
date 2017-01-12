<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Categoria;
use AppBundle\Entity\Parametro;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadParametroData extends AbstractFixture  implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $parametros = [
            [
                'dominio' => 'ESTADO_PRODUCTO',
                'abreviatura' => 'A',
                'descripcion' => 'Activo',
                'orden' => 1
            ],
            [
                'dominio' => 'ESTADO_PRODUCTO',
                'abreviatura' => 'I',
                'descripcion' => 'Inactivo',
                'orden' => 2
            ],
            //---------------------------------------------------
            [
                'dominio' => 'CONTACTO_ASUNTO',
                'abreviatura' => 'CT',
                'descripcion' => 'Contácto Técnico',
                'orden' => 1
            ],
            [
                'dominio' => 'CONTACTO_ASUNTO',
                'abreviatura' => 'CC',
                'descripcion' => 'Contácto Comercial',
                'orden' => 2
            ],
            [
                'dominio' => 'CONTACTO_ASUNTO',
                'abreviatura' => 'CF',
                'descripcion' => 'Facturación',
                'orden' => 3
            ],
            //---------------------------------------------------
            [
                'dominio' => 'ESTADO_CATEGORIA',
                'abreviatura' => 'A',
                'descripcion' => 'Activo',
                'orden' => 1
            ],
            [
                'dominio' => 'ESTADO_CATEGORIA',
                'abreviatura' => 'I',
                'descripcion' => 'Inactivo',
                'orden' => 2
            ],
        ];

        foreach ($parametros as $parametro) {

            $p = new Parametro();
            $p->setDominio($parametro['dominio']);
            $p->setAbreviatura($parametro['abreviatura']);
            $p->setDescripcion($parametro['descripcion']);
            $p->setOrden($parametro['orden']);

            $manager->persist($p);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}