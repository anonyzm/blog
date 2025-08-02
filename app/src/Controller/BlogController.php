<?php

namespace App\Controller;

use App\Interface\PostInterface;
use App\Interface\TranslationInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class BlogController
{
    public function __construct(
        private PostInterface $post,
        private TranslationInterface $translationService,
        private Environment $twig
    ) {}

    public function index(Request $request): Response
    {
        $posts = $this->post->getAll();

        $content = $this->twig->render('index.html.twig', [
            'title' => $this->translationService->translate('main'),
            'read_more' => $this->translationService->translate('read_more'),
            'posts' => array_map(fn(PostInterface $post) => $post->toArray(), $posts)
        ]);
        
        return new Response($content);
    }
    
    public function view(Request $request, string $slug): Response
    {
        $post = $this->post->fromSlug($slug);
        
        if (!$post->exists()) {
            return new Response('Пост не найден', 404);
        }
        
        $content = $this->twig->render('post.html.twig', [
            'post' => $post->toArray()
        ]);
        
        return new Response($content);
    }
}