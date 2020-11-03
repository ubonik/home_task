<?php

namespace App\Controller\Admin;

use App\Repository\TagRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TagsController extends AbstractController
{
    /**
     * @Route("/admin/tags", name="admin_tags")
     */
    public function index(Request $request, TagRepository $tagRepository, PaginatorInterface $paginator)
    {
        $pagination = $paginator->paginate(
            $tagRepository->findAllWithSearchQuery($request->query->get('q'), $request->query->has('showDeleted')),
            $request->query->getInt('page', 1), $request->query->getInt('p', 1),
        );
         ($request);
        return $this->render('admin/tags/tags.html.twig', [
            'pagination' => $pagination
        ]);
    }

}
