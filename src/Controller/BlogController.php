<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Post;

final class BlogController extends AbstractController
{
    #[Route('/', name: 'blog_index')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([], ['createdAt' => 'DESC'], 10); // Latest 10 posts
        $featuredPost=$postRepository->findOneBy([], ['createdAt' => 'DESC']);
        return $this->render('blog/index.html.twig', [
            'posts' => $posts,
            'featuredPost' => $featuredPost,
        ]);
    }

    #[Route('/blog/{slug}', name: 'show_blog')]
    public function show(string $slug,PostRepository $postRepository): Response
    {
        $post = $postRepository->findOneBy(['slug' => $slug]);
        if (!$post) {
            throw $this->createNotFoundException('Blog post not found');
        }
        return $this->render('blog/show.html.twig', [
            'post' => $post
        ]);
    }


}
