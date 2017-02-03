<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categoria;
use AppBundle\Entity\Contacto;
use AppBundle\Entity\Parametro;
use AppBundle\Entity\Producto;
use AppBundle\Form\ContactoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function homeAction(Request $request)
    {
        return $this->render('@App/admin/home.html.twig');
    }
}
