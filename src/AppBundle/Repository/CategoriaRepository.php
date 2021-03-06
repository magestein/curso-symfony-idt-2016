<?php

namespace AppBundle\Repository;

/**
 * CategoriaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoriaRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Devuelve todas las categorías activas.
     *
     * @return array
     */
    public function getCategorias()
    {
        $categorias = $this->getEntityManager()->createQueryBuilder()
            ->select('c')
            ->addSelect("(select count(1) from AppBundle:Producto p where p.categoria = c and p.estado = 'A') as cantidad")
            ->from('AppBundle:Categoria', 'c')
            ->andWhere('c.estado = :estadoCategoria')
            ->orderBy('c.nombre', 'ASC')
            ->setParameter('estadoCategoria', 'A')
            ->getQuery()
            ->getResult();

//        $categorias = $this->getEntityManager()->createQueryBuilder()
//            ->select('c')
//            ->from('AppBundle:Categoria', 'c')
//            ->andWhere('c.estado = :estadoCategoria')
//            ->orderBy('c.nombre', 'ASC')
//            ->setParameter('estadoCategoria', 'A')
//            ->getQuery()
//            ->getResult();

        return $categorias;
    }
}
