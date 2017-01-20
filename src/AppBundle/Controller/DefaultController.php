<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categoria;
use AppBundle\Entity\Contacto;
use AppBundle\Entity\Parametro;
use AppBundle\Entity\Producto;
use AppBundle\Form\ContactoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $manzanas = 10;

        $productos = $this->getDoctrine()
            ->getRepository('AppBundle:Producto')
            ->getNuevosProductos(8);

        return $this->render('@App/default/index.html.twig', array(
            'productos' => $productos,
            'manzanas' => $manzanas
        ));
    }

    public function contactoAction(Request $request)
    {
        $contacto = new Contacto();

        $asuntosOptions = $this->getDoctrine()
            ->getRepository('AppBundle:Parametro')
            ->getParametrosForOptions('CONTACTO_ASUNTO');

        $form = $this->createForm(ContactoType::class, $contacto, array(
            'asuntos_options' => $asuntosOptions
        ));

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contacto);
            $em->flush();

            return $this->redirectToRoute('contacto');
        }

        return $this->render('@App/default/contacto.html.twig', array(
            'formulario' => $form->createView()
        ));
    }

    public function productosAction($categoriaSlug=null)
    {
        $params = array();

        if($categoriaSlug){
            $params['categoria'] = $categoriaSlug;
        }

        $productos = $this->getDoctrine()
            ->getRepository('AppBundle:Producto')
            ->getProductos($params);

        if(empty($productos))
            throw $this->createNotFoundException();

        $categorias = $this->getDoctrine()
            ->getRepository('AppBundle:Categoria')
            ->getCategorias();

        return $this->render('@App/default/productos.html.twig', array(
            'productos' => $productos,
            'categorias' => $categorias
        ));
    }

    /**
     * Prohibido usar. Para esto están los DataFixtures
     */
    public function dataImportAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $c1 = new Categoria();
        $c2 = new Categoria();
        $c3 = new Categoria();

        $c1->setNombre('Electrodomésticos')
            ->setEstado('A')
            ->setSlug('electrodomesticos');

        $c2->setNombre('Juegos y Consolas')
            ->setEstado('I')
            ->setSlug('juegos-y-consolas');

        $c3->setNombre('ropa')
            ->setEstado('A')
            ->setSlug('ropa');


        $p1 = new Producto();
        $p2 = new Producto();
        $p3 = new Producto();
        $p4 = new Producto();
        $p5 = new Producto();
        $p6 = new Producto();
        $p7 = new Producto();
        $p8 = new Producto();
        $p9 = new Producto();
        $p10 = new Producto();

        $p1->setNombre('Producto 1')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $p2->setNombre('Producto 2')
            ->setCategoria($c1)
            ->setPrecio(600)
            ->setEstado('A')
            ->setOferta(false);

        $p3->setNombre('Producto 3')
            ->setCategoria($c2)
            ->setPrecio(1500)
            ->setEstado('I')
            ->setOferta(false);

        $p4->setNombre('Producto 4')
            ->setCategoria($c3)
            ->setPrecio(5000)
            ->setEstado('A')
            ->setOferta(true);

        $p5->setNombre('Producto 5')
            ->setCategoria($c1)
            ->setPrecio(5500)
            ->setEstado('A')
            ->setOferta(false);

        $p6->setNombre('Producto 6')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $p7->setNombre('Producto 7')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $p8->setNombre('Producto 8')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $p9->setNombre('Producto 9')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $p10->setNombre('Producto 10')
            ->setCategoria($c1)
            ->setPrecio(500)
            ->setEstado('A')
            ->setOferta(false);

        $em->persist($p1);
        $em->persist($p2);
        $em->persist($p3);
        $em->persist($p4);
        $em->persist($p5);
        $em->persist($p6);
        $em->persist($p7);
        $em->persist($p8);
        $em->persist($p9);
        $em->persist($p10);

        $pa1 = new Parametro();
        $pa2 = new Parametro();
        $pa3 = new Parametro();
        $pa4 = new Parametro();
        $pa5 = new Parametro();

        $pa1->setDominio('ESTADO_PRODUCTO')
            ->setAbreviatura('A')
            ->setDescripcion('Activo')
            ->setOrden(1);

        $pa2->setDominio('ESTADO_PRODUCTO')
            ->setAbreviatura('I')
            ->setDescripcion('Inactivo')
            ->setOrden(2);

        $pa3->setDominio('CONTACTO_ASUNTO')
            ->setAbreviatura('CT')
            ->setDescripcion('Contácto Técnico')
            ->setOrden(1);

        $pa4->setDominio('CONTACTO_ASUNTO')
            ->setAbreviatura('CC')
            ->setDescripcion('Contácto Comercial')
            ->setOrden(2);

        $pa5->setDominio('CONTACTO_ASUNTO')
            ->setAbreviatura('CF')
            ->setDescripcion('Facturación')
            ->setOrden(3);

        $em->persist($pa1);
        $em->persist($pa2);
        $em->persist($pa3);
        $em->persist($pa4);
        $em->persist($pa5);

        $em->flush();

        die('importacion terminada');
    }

    public function productos2Action()
    {
        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository('AppBundle:Producto')->getProductos2();
dump($productos);
        return $this->render('@App/default/productos2.html.twig', array(
            'productos' => $productos,
        ));
    }

    public function clientePruebaAjaxAction($ruc)
    {
        $cliente = array(
            'id' => 1,
            'nombre' => 'Juan Ardissone',
            'ruc' => '4472014-9'
        );

        return new JsonResponse($cliente);
    }

    public function proveedorPruebaAjaxAction($ruc)
    {
        $cliente = array(
            'id' => 1,
            'nombre' => 'Vicente Insfran',
            'ruc' => '4567891-9'
        );

        return new JsonResponse($cliente);
    }
}
