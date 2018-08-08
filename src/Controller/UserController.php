<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route("/swagger")
     */
    public function index()
    {
        return $this->render('user/swagger.html.twig', ['yml_url' => '/swagger/api.yml']);
    }
}
