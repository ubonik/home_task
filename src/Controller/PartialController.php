<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PartialController extends AbstractController
{
    public function lastComments()
    {
        Scomments = ''
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PartialController.php',
        ]);
    }
}
