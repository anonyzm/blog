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

/* post.html.twig */
class __TwigTemplate_be5e47166fa3db5d0d53354d2a6bec14 extends Template
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
        yield "<article class=\"post\">
    <header class=\"post-header\">
        <h1 class=\"post-title\">";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "title", [], "any", false, false, false, 8), "html", null, true);
        yield "</h1>
        <div class=\"post-meta\">
            <span class=\"post-date\">";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "date", [], "any", false, false, false, 10), "html", null, true);
        yield "</span>
            <span class=\"post-author\">Автор: ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "author", [], "any", false, false, false, 11), "html", null, true);
        yield "</span>
        </div>
    </header>
    
    <div class=\"post-content\">
        ";
        // line 16
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "content", [], "any", false, false, false, 16);
        yield "
    </div>
    
    <footer class=\"post-footer\">
        <a href=\"/\" class=\"btn btn-back\">← Вернуться к списку постов</a>
    </footer>
</article>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "post.html.twig";
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
        return array (  91 => 16,  83 => 11,  79 => 10,  74 => 8,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ title }}{% endblock %}

{% block content %}
<article class=\"post\">
    <header class=\"post-header\">
        <h1 class=\"post-title\">{{ post.title }}</h1>
        <div class=\"post-meta\">
            <span class=\"post-date\">{{ post.date }}</span>
            <span class=\"post-author\">Автор: {{ post.author }}</span>
        </div>
    </header>
    
    <div class=\"post-content\">
        {{ post.content|raw }}
    </div>
    
    <footer class=\"post-footer\">
        <a href=\"/\" class=\"btn btn-back\">← Вернуться к списку постов</a>
    </footer>
</article>
{% endblock %} ", "post.html.twig", "/opt/app/templates/post.html.twig");
    }
}
