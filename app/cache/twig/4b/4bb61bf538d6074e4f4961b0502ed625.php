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

/* base.html.twig */
class __TwigTemplate_5c33e19b1e4d6a2be60e66d6b3f53834 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body_classes' => [$this, 'block_body_classes'],
            'header' => [$this, 'block_header'],
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
            'mobile' => [$this, 'block_mobile'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"";
        // line 2
        yield ((($context["language"] ?? null)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["language"], "html", null, true)) : ("ru"));
        yield "\">
<head>
";
        // line 4
        yield from $this->unwrap()->yieldBlock('head', $context, $blocks);
        // line 17
        yield "
";
        // line 18
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 22
        yield "
</head>
<body id=\"top\" class=\"";
        // line 24
        yield from $this->unwrap()->yieldBlock('body_classes', $context, $blocks);
        yield "\">
    <div id=\"page-wrapper\">
    ";
        // line 26
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 50
        yield "
        <section id=\"start\">
        ";
        // line 52
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 62
        yield "        </section>

    </div>

    ";
        // line 66
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 71
        yield "
    ";
        // line 72
        yield from $this->unwrap()->yieldBlock('mobile', $context, $blocks);
        // line 84
        yield "
";
        // line 85
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 89
        yield "
</body>
</html>
";
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 5
        yield "    <meta charset=\"utf-8\" />
    <title>";
        // line 6
        if ((($tmp = ($context["title"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html");
            yield " | ";
        }
        yield " IT Solutions</title>

    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"IT architecture, development and management blog\" />

    <link rel=\"icon\" type=\"image/png\" href=\"/assets/images/blogo.png\" />
    <link rel=\"canonical\" href=\"/\" />
";
        yield from [];
    }

    // line 18
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 19
        yield "    <link rel=\"stylesheet\" href=\"/assets/css/base.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/markdown.css\">
";
        yield from [];
    }

    // line 24
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body_classes(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "header-fixed header-animated header-dark header-transparent sticky-footer";
        yield from [];
    }

    // line 26
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 27
        yield "        <section id=\"header\" class=\"section\">
            <section class=\"container grid-lg\">
                <nav class=\"navbar\">
                    <section class=\"navbar-section logo\">
                        ";
        // line 31
        yield from $this->load("partials/logo.html.twig", 31)->unwrap()->yield($context);
        // line 32
        yield "                    </section>
                    <section class=\"navbar-section navbar-title\">
                        ";
        // line 34
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 35
        yield "                    </section>
                    <section class=\"navbar-section desktop-menu\">
                        ";
        // line 37
        yield from $this->load("partials/navigation.html.twig", 37)->unwrap()->yield($context);
        yield "                      
                    </section>
                </nav>
            </section>
        </section>
        <div class=\"mobile-menu\">
            <div class=\"button_container\" id=\"toggle\">
                <span class=\"top\"></span>
                <span class=\"middle\"></span>
                <span class=\"bottom\"></span>
            </div>
        </div>
    ";
        yield from [];
    }

    // line 34
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "IT Solutions";
        yield from [];
    }

    // line 52
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 53
        yield "            <section id=\"body-wrapper\" class=\"section\">
                <section class=\"container grid-lg\">
                    ";
        // line 58
        yield "                    ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        yield "        
                </section>
            </section>
        ";
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 66
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 67
        yield "        <section id=\"footer\" class=\"section bg-gray\">
            ";
        // line 68
        yield from $this->load("partials/footer.html.twig", 68)->unwrap()->yield($context);
        // line 69
        yield "        </section>
    ";
        yield from [];
    }

    // line 72
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_mobile(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 73
        yield "    <div class=\"mobile-container\">
        <div class=\"overlay\" id=\"overlay\">
            <div class=\"mobile-logo\">
                ";
        // line 76
        yield from $this->load("partials/logo.html.twig", 76)->unwrap()->yield($context);
        // line 77
        yield "            </div>
            <nav class=\"overlay-menu\">
                ";
        // line 79
        yield from $this->load("partials/navigation.html.twig", 79)->unwrap()->yield(CoreExtension::merge($context, ["tree" => true]));
        // line 80
        yield "            </nav>
        </div>
    </div>
    ";
        yield from [];
    }

    // line 85
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 86
        yield "    <script src=\"/system/assets/jquery/jquery-3.x.min.js\"></script>
    <script src=\"/system/assets/jquery/base.js\"></script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  301 => 86,  294 => 85,  286 => 80,  284 => 79,  280 => 77,  278 => 76,  273 => 73,  266 => 72,  260 => 69,  258 => 68,  255 => 67,  248 => 66,  229 => 58,  225 => 53,  218 => 52,  207 => 34,  189 => 37,  185 => 35,  183 => 34,  179 => 32,  177 => 31,  171 => 27,  164 => 26,  153 => 24,  146 => 19,  139 => 18,  120 => 6,  117 => 5,  110 => 4,  102 => 89,  100 => 85,  97 => 84,  95 => 72,  92 => 71,  90 => 66,  84 => 62,  82 => 52,  78 => 50,  76 => 26,  71 => 24,  67 => 22,  65 => 18,  62 => 17,  60 => 4,  55 => 2,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"{{ language ?: 'ru' }}\">
<head>
{% block head %}
    <meta charset=\"utf-8\" />
    <title>{% if title %}{{ title|e('html') }} | {% endif %} IT Solutions</title>

    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"IT architecture, development and management blog\" />

    <link rel=\"icon\" type=\"image/png\" href=\"/assets/images/blogo.png\" />
    <link rel=\"canonical\" href=\"/\" />
{% endblock head %}

{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"/assets/css/base.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/markdown.css\">
{% endblock %}

</head>
<body id=\"top\" class=\"{% block body_classes %}header-fixed header-animated header-dark header-transparent sticky-footer{% endblock %}\">
    <div id=\"page-wrapper\">
    {% block header %}
        <section id=\"header\" class=\"section\">
            <section class=\"container grid-lg\">
                <nav class=\"navbar\">
                    <section class=\"navbar-section logo\">
                        {% include 'partials/logo.html.twig' %}
                    </section>
                    <section class=\"navbar-section navbar-title\">
                        {% block title %}IT Solutions{% endblock %}
                    </section>
                    <section class=\"navbar-section desktop-menu\">
                        {% include 'partials/navigation.html.twig' %}                      
                    </section>
                </nav>
            </section>
        </section>
        <div class=\"mobile-menu\">
            <div class=\"button_container\" id=\"toggle\">
                <span class=\"top\"></span>
                <span class=\"middle\"></span>
                <span class=\"bottom\"></span>
            </div>
        </div>
    {% endblock %}

        <section id=\"start\">
        {% block body %}
            <section id=\"body-wrapper\" class=\"section\">
                <section class=\"container grid-lg\">
                    {# {% block messages %}
                        {% include 'partials/messages.html.twig' ignore missing %}
                    {% endblock %} #}
                    {% block content %}{% endblock %}        
                </section>
            </section>
        {% endblock %}
        </section>

    </div>

    {% block footer %}
        <section id=\"footer\" class=\"section bg-gray\">
            {% include 'partials/footer.html.twig' %}
        </section>
    {% endblock %}

    {% block mobile %}
    <div class=\"mobile-container\">
        <div class=\"overlay\" id=\"overlay\">
            <div class=\"mobile-logo\">
                {% include 'partials/logo.html.twig' %}
            </div>
            <nav class=\"overlay-menu\">
                {% include 'partials/navigation.html.twig' with {tree: true} %}
            </nav>
        </div>
    </div>
    {% endblock %}

{% block javascripts %}
    <script src=\"/system/assets/jquery/jquery-3.x.min.js\"></script>
    <script src=\"/system/assets/jquery/base.js\"></script>
{% endblock %}

</body>
</html>
", "base.html.twig", "/opt/app/templates/base.html.twig");
    }
}
