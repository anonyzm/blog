<?php

namespace App\Controller;

use App\Interfaces\BlogInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class BlogController
{
    public function __construct(
        private BlogInterface $blogService,
        private Environment $twig
    ) {}

    public function index(Request $request): Response
    {
        // Получаем посты через сервис
        $posts = $this->blogService->getAllPosts();
        
        $content = $this->twig->render('index.html.twig', [
            'title' => 'Главная страница блога',
            //'posts' => $posts
        ]);
        
        return new Response($content);
    }
    
    public function typography(Request $request): Response
    {
        $content = $this->twig->render('typography.html.twig', [
            'title' => 'Типографика'
        ]);
        
        return new Response($content);
    }
    
    public function view(Request $request, string $slug): Response
    {
        // Получаем пост через сервис
        $post = $this->blogService->getPostBySlug($slug);
        
        if (!$post) {
            return new Response('Пост не найден', 404);
        }
        
        $content = $this->twig->render('post.html.twig', [
            'title' => $post['title'],
            'post' => $post
        ]);
        
        return new Response($content);
    }
} 