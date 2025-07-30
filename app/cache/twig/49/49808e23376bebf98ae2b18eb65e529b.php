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
    <p>Друг, если ты читаешь это, значит ты уже на полпути к тому, чтобы стать хорошим разработчиком. Я рад, что ты здесь <i class=\"fa fa-heart-o pulse\"></i></p>
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
    ";
        // line 15
        yield "    
    <div class=\"posts-list\">
        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 18
            yield "        <article class=\"post-item fade-in\">
            <div class=\"post-header\">
                <h3>
                    <a href=\"";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "url", [], "any", false, false, false, 21), "html", null, true);
            yield "\">#&nbsp;";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 21), "html", null, true);
            yield "</a>
                </h3>
            </div>
            
            <div class=\"post-content-wrapper\">
                ";
            // line 26
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "quote", [], "any", false, false, false, 26)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 27
                yield "                <div class=\"post-quote-section\">
                    ";
                // line 28
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 28)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 29
                    yield "                    <div class=\"post-image\">
                        <img src=\"";
                    // line 30
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 30), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 30), "html", null, true);
                    yield "\" class=\"post-thumbnail\">
                    </div>
                    ";
                }
                // line 33
                yield "                    <div class=\"post-quote\">
                        ";
                // line 34
                yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "quote", [], "any", false, false, false, 34);
                yield "
                    </div>
                </div>
                ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 37
$context["post"], "image", [], "any", false, false, false, 37)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 38
                yield "                <div class=\"post-image\">
                    <img src=\"";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 39), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 39), "html", null, true);
                yield "\" class=\"post-thumbnail\">
                </div>
                ";
            }
            // line 42
            yield "                
                <div class=\"post-excerpt\">
                    ";
            // line 44
            yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "excerpt", [], "any", false, false, false, 44);
            yield "
                    ";
            // line 45
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "shortened", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 46
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "url", [], "any", false, false, false, 46), "html", null, true);
                yield "\" class=\"read-more\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["read_more"] ?? null), "html", null, true);
                yield "</a>
                    ";
            }
            // line 48
            yield "                </div>
            </div>
            
            <div class=\"post-meta\">
                <span class=\"post-date\"><i class=\"fa fa-calendar\"></i>&nbsp;";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "date", [], "any", false, false, false, 52), "d.m.Y"), "html", null, true);
            yield "</span>
            </div>
        </article>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
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
        return array (  188 => 56,  178 => 52,  172 => 48,  164 => 46,  162 => 45,  158 => 44,  154 => 42,  146 => 39,  143 => 38,  141 => 37,  135 => 34,  132 => 33,  124 => 30,  121 => 29,  119 => 28,  116 => 27,  114 => 26,  104 => 21,  99 => 18,  95 => 17,  91 => 15,  88 => 14,  81 => 13,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}IT Solutions{% endblock %}

{% block content_header %}
<section class=\"container grid-lg\">
    <h1>Попрощайся</h1>
    <h2>с плохими решениями</h2>
    <p>Друг, если ты читаешь это, значит ты уже на полпути к тому, чтобы стать хорошим разработчиком. Я рад, что ты здесь <i class=\"fa fa-heart-o pulse\"></i></p>
</section>
{% endblock %}

{% block content %}
<section class=\"posts-section\">
    {# <h2 class=\"section-title\">Последние публикации</h2> #}    
    <div class=\"posts-list\">
        {% for post in posts %}
        <article class=\"post-item fade-in\">
            <div class=\"post-header\">
                <h3>
                    <a href=\"{{ post.url }}\">#&nbsp;{{ post.title }}</a>
                </h3>
            </div>
            
            <div class=\"post-content-wrapper\">
                {% if post.quote %}
                <div class=\"post-quote-section\">
                    {% if post.image %}
                    <div class=\"post-image\">
                        <img src=\"{{ post.image }}\" alt=\"{{ post.title }}\" class=\"post-thumbnail\">
                    </div>
                    {% endif %}
                    <div class=\"post-quote\">
                        {{ post.quote | raw }}
                    </div>
                </div>
                {% elseif post.image %}
                <div class=\"post-image\">
                    <img src=\"{{ post.image }}\" alt=\"{{ post.title }}\" class=\"post-thumbnail\">
                </div>
                {% endif %}
                
                <div class=\"post-excerpt\">
                    {{ post.excerpt | raw }}
                    {% if post.shortened %}
                    <a href=\"{{ post.url }}\" class=\"read-more\">{{ read_more }}</a>
                    {% endif %}
                </div>
            </div>
            
            <div class=\"post-meta\">
                <span class=\"post-date\"><i class=\"fa fa-calendar\"></i>&nbsp;{{ post.date | date('d.m.Y') }}</span>
            </div>
        </article>
        {% endfor %}
    </div>
</section> 
{% endblock %} ", "index.html.twig", "/opt/app/templates/index.html.twig");
    }
}
