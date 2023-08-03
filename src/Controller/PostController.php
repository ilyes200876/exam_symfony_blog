<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Comment;
use App\Form\CommentType;

#[Route('/post')]
class PostController extends AbstractController
{
    public function __construct(
        private PostRepository $postRepository,
        private PaginatorInterface $paginator,
        private EntityManagerInterface $entityManager
        )
    {

    }

    #[Route('/', name: 'app_post')]
    public function index(Request $request): Response
    {
        $qb = $this->postRepository->getQbAll();

        $pagination = $this->paginator->paginate(
            $qb, $request->query->getInt('page', 1), 5
        );

        return $this->render('post/index.html.twig', [
            'posts' => $pagination,
        ]);
    }

    #[Route('/show/{id}', name: 'app_post_show')]
    public function detail($id, Request $request): Response
    {

        $postEntity = $this->postRepository->find($id);
        if ($postEntity === null){
            return $this->redirectToRoute('app_home');
        }

        $commentEntity = new Comment();
        $form = $this->createForm(CommentType::class, $commentEntity);
        $form->handleRequest($request);

        $commentEntity->setCreatedAt(new \DateTime());

        if ($form->isSubmitted() && $form->isValid()){
            $commentEntity ->setPost($postEntity);
            $this->entityManager->persist($commentEntity);
            $this->entityManager->flush();
            return $this->redirectToRoute('app_home');
        }

        return $this->render('post/show.html.twig', [
            'post' => $postEntity,
            'form' => $form->createView(),
        ]);
    }

}
