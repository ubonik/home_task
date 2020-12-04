<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PartialController extends AbstractController
{
    public function lastComments(CommentRepository $commentRepository)
    {
        $comments = $commentRepository->findBy([], [], 3);

        return $this->render('partial/last_comments.html.twig', [
            'comments' => $comments
        ]);
    }
}
