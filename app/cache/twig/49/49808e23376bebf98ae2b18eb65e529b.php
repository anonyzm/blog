<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* index.html.twig */
class __TwigTemplate_2654a39c8828c9ec7f195a0353cb9b3c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield " - IT Solutions Blog";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<div class=\"hero fade-in\">
    <h1 class=\"hero-title\">Добро пожаловать в IT Solutions Blog</h1>
    <p class=\"hero-subtitle\">Здесь вы найдете интересные статьи о технологиях, решениях и последних тенденциях в IT индустрии</p>
</div>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  71 => 6,  64 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ title }} - IT Solutions Blog{% endblock %}

{% block content %}
<div class=\"hero fade-in\">
    <h1 class=\"hero-title\">Добро пожаловать в IT Solutions Blog</h1>
    <p class=\"hero-subtitle\">Здесь вы найдете интересные статьи о технологиях, решениях и последних тенденциях в IT индустрии</p>
</div>

{# <section class=\"posts-section slide-up\">
    <h2 class=\"section-title\">Последние публикации</h2>
    
    <div class=\"posts-list\">
        {% for post in posts %}
        <article class=\"post-item fade-in\">
            <h3 class=\"post-title\">
                <a href=\"/blog/{{ post.slug }}\">{{ post.title }}</a>
            </h3>
            <div class=\"post-excerpt\">
                {{ post.excerpt }}
            </div>
            <div class=\"post-meta\">
                <span class=\"post-date\">{{ post.date }}</span>
                <span class=\"post-author\">Автор: {{ post.author }}</span>
            </div>
        </article>
        {% endfor %}
    </div>
</section> #}
{% endblock %} ", "index.html.twig", "/opt/app/templates/index.html.twig");
    }
}
