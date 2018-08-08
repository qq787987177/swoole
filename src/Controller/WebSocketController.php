<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebSocketController extends Controller
{
    /**
     * @Route("/web/socket", name="web_socket")
     */
    public function index()
    {
        return $this->render('web_socket/index.html.twig', [
            'controller_name' => 'WebSocketController',
        ]);
    }
}
