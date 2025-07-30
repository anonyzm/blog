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
            'content_header' => [$this, 'block_content_header'],
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
        yield "IT Solutions";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<section class=\"container grid-lg\">
    <h1>Попрощайся</h1>
    <h2>с плохими решениями</h2>
    <p>Друг, если ты читаешь это, значит ты уже на полпути к тому, чтобы стать хорошим разработчиком. Я не знаю, как ты попал сюда, но я рад, что ты здесь <i class=\"fa fa-heart-o pulse\"></i></p>
</section>
";
        yield from [];
    }

    // line 13
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 14
        yield "<section class=\"posts-section\">
    <h2 class=\"section-title\">Последние публикации</h2>
    
    <div class=\"posts-list\">
        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 19
            yield "        <article class=\"post-item fade-in\">
            <div class=\"post-header\">
                <h3>
                    <a href=\"";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "url", [], "any", false, false, false, 22), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 22), "html", null, true);
            yield "</a>
                </h3>
            </div>
            <div class=\"post-excerpt\">
                ";
            // line 26
            yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "excerpt", [], "any", false, false, false, 26);
            yield "
            </div>
            <div class=\"post-meta\">
                <span class=\"post-date\">";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "date", [], "any", false, false, false, 29), "html", null, true);
            yield "</span>
            </div>
        </article>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "    </div>
</section> 
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
        return array (  128 => 33,  118 => 29,  112 => 26,  103 => 22,  98 => 19,  94 => 18,  88 => 14,  81 => 13,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}IT Solutions{% endblock %}

{% block content_header %}
<section class=\"container grid-lg\">
    <h1>Попрощайся</h1>
    <h2>с плохими решениями</h2>
    <p>Друг, если ты читаешь это, значит ты уже на полпути к тому, чтобы стать хорошим разработчиком. Я не знаю, как ты попал сюда, но я рад, что ты здесь <i class=\"fa fa-heart-o pulse\"></i></p>
</section>
{% endblock %}

{% block content %}
<section class=\"posts-section\">
    <h2 class=\"section-title\">Последние публикации</h2>
    
    <div class=\"posts-list\">
        {% for post in posts %}
        <article class=\"post-item fade-in\">
            <div class=\"post-header\">
                <h3>
                    <a href=\"{{ post.url }}\">{{ post.title }}</a>
                </h3>
            </div>
            <div class=\"post-excerpt\">
                {{ post.excerpt | raw}}
            </div>
            <div class=\"post-meta\">
                <span class=\"post-date\">{{ post.date }}</span>
            </div>
        </article>
        {% endfor %}
    </div>
</section> 
{% endblock %} ", "index.html.twig", "/opt/app/templates/index.html.twig");
    }
}
