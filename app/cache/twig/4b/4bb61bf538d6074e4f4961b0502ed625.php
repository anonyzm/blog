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
            'content_header' => [$this, 'block_content_header'],
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
        // line 26
        yield "
</head>
<body id=\"top\" class=\"";
        // line 28
        yield from $this->unwrap()->yieldBlock('body_classes', $context, $blocks);
        yield "\">
    <div id=\"page-wrapper\">
    ";
        // line 30
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 54
        yield "
        <section id=\"start\">
        ";
        // line 56
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 69
        yield "        </section>

    </div>

    ";
        // line 73
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 78
        yield "
    ";
        // line 79
        yield from $this->unwrap()->yieldBlock('mobile', $context, $blocks);
        // line 91
        yield "
";
        // line 92
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 100
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
        yield "    <link rel=\"stylesheet\" href=\"/assets/css/spectre.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/theme.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/notices.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/awesome.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/custom.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/hljs.min.css\">
";
        yield from [];
    }

    // line 28
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body_classes(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "title-center title-h1h2 header-fixed header-animated sticky-footer";
        yield from [];
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 31
        yield "        <section id=\"header\" class=\"section\">
            <section class=\"container grid-lg\">
                <nav class=\"navbar\">
                    <section class=\"navbar-section logo\">
                        ";
        // line 35
        yield from $this->load("partials/logo.html.twig", 35)->unwrap()->yield($context);
        // line 36
        yield "                    </section>
                    <section class=\"navbar-section navbar-title\">
                        ";
        // line 38
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 39
        yield "                    </section>
                    <section class=\"navbar-section desktop-menu\">
                        ";
        // line 41
        yield from $this->load("partials/navigation.html.twig", 41)->unwrap()->yield($context);
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

    // line 38
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "IT Solutions";
        yield from [];
    }

    // line 56
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 57
        yield "            <section id=\"top-wrapper\" class=\"section\">
                ";
        // line 58
        yield from $this->unwrap()->yieldBlock('content_header', $context, $blocks);
        yield "              
            </section>
            <section id=\"body-wrapper\" class=\"section\">
                <section class=\"container grid-lg\">
                    ";
        // line 65
        yield "                    ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        yield "        
                </section>
            </section>
        ";
        yield from [];
    }

    // line 58
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 65
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 73
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 74
        yield "        <section id=\"footer\" class=\"section bg-gray\">
            ";
        // line 75
        yield from $this->load("partials/footer.html.twig", 75)->unwrap()->yield($context);
        // line 76
        yield "        </section>
    ";
        yield from [];
    }

    // line 79
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_mobile(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 80
        yield "    <div class=\"mobile-container\">
        <div class=\"overlay\" id=\"overlay\">
            <div class=\"mobile-logo\">
                ";
        // line 83
        yield from $this->load("partials/logo.html.twig", 83)->unwrap()->yield($context);
        // line 84
        yield "            </div>
            <nav class=\"overlay-menu\">
                ";
        // line 86
        yield from $this->load("partials/navigation.html.twig", 86)->unwrap()->yield(CoreExtension::merge($context, ["tree" => true]));
        // line 87
        yield "            </nav>
        </div>
    </div>
    ";
        yield from [];
    }

    // line 92
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 93
        yield "    <script src=\"/assets/js/jquery-3.x.min.js\"></script>
    <script src=\"/assets/js/tree-menu.js\"></script>
    <script src=\"/assets/js/hljs/highlight.min.js\"></script>
    <script src=\"/assets/js/hljs/languages/go.min.js\"></script>
    <script src=\"/assets/js/hljs/languages/php.min.js\"></script>
    <script>hljs.highlightAll();</script>
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
        return array (  323 => 93,  316 => 92,  308 => 87,  306 => 86,  302 => 84,  300 => 83,  295 => 80,  288 => 79,  282 => 76,  280 => 75,  277 => 74,  270 => 73,  260 => 65,  250 => 58,  240 => 65,  233 => 58,  230 => 57,  223 => 56,  212 => 38,  194 => 41,  190 => 39,  188 => 38,  184 => 36,  182 => 35,  176 => 31,  169 => 30,  158 => 28,  147 => 19,  140 => 18,  121 => 6,  118 => 5,  111 => 4,  103 => 100,  101 => 92,  98 => 91,  96 => 79,  93 => 78,  91 => 73,  85 => 69,  83 => 56,  79 => 54,  77 => 30,  72 => 28,  68 => 26,  66 => 18,  63 => 17,  61 => 4,  56 => 2,  53 => 1,);
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
    <link rel=\"stylesheet\" href=\"/assets/css/spectre.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/theme.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/notices.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/awesome.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/custom.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/hljs.min.css\">
{% endblock %}

</head>
<body id=\"top\" class=\"{% block body_classes %}title-center title-h1h2 header-fixed header-animated sticky-footer{% endblock %}\">
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
            <section id=\"top-wrapper\" class=\"section\">
                {% block content_header %}{% endblock %}              
            </section>
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
    <script src=\"/assets/js/jquery-3.x.min.js\"></script>
    <script src=\"/assets/js/tree-menu.js\"></script>
    <script src=\"/assets/js/hljs/highlight.min.js\"></script>
    <script src=\"/assets/js/hljs/languages/go.min.js\"></script>
    <script src=\"/assets/js/hljs/languages/php.min.js\"></script>
    <script>hljs.highlightAll();</script>
{% endblock %}

</body>
</html>
", "base.html.twig", "/opt/app/templates/base.html.twig");
    }
}
