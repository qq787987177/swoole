<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class UserController
 * @Route("/user")
 *
 * @package App\Controller
 */
class UserController extends Controller
{
    /**
     * login
     * @Route("/login")
     *
     * @author yangyi
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function login(Request $request){
        return new JsonResponse('123');
    }
}
