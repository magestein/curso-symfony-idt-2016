<?php

namespace AppBundle\Repository;

/**
 * ProductoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductoRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Este método devuele los nuevos productos de la tienda.
     *
     * @param $max int Cantidad maxima de productos a devolver

     * @return array
     */
    public function getNuevosProductos($max = 8)
    {
        $productos = $this->getEntityManager()->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Producto', 'p')
            ->join('p.categoria', 'c')
            ->where('p.estado = :estadoProducto')
            ->andWhere('c.estado = :estadoCategoria')

            ->orderBy('p.fechaAlta', 'DESC')
            ->addOrderBy('p.id', 'DESC')
            ->setMaxResults($max)

            ->setParameter('estadoProducto', 'A')
            ->setParameter('estadoCategoria', 'A')

            ->getQuery()
            ->getResult();

        return $productos;
    }
}
