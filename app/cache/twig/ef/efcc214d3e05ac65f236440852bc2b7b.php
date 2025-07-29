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

/* partials/footer.html.twig */
class __TwigTemplate_6a42d5cc2dd310ad654667415222d54c extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<section class=\"container ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["grid_size"] ?? null), "html", null, true);
        yield "\">
    <p><i class=\"fa fa-copyright\"></i> 2018-2025 IT Solutions with <i class=\"fa fa-heart-o pulse\"></i> by <a href=\"https://anonyzm.tech/\">Leo</a>.</p>
</section>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/footer.html.twig";
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section class=\"container {{ grid_size }}\">
    <p><i class=\"fa fa-copyright\"></i> 2018-2025 IT Solutions with <i class=\"fa fa-heart-o pulse\"></i> by <a href=\"https://anonyzm.tech/\">Leo</a>.</p>
</section>", "partials/footer.html.twig", "/opt/app/templates/partials/footer.html.twig");
    }
}
