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

/* typography.html.twig */
class __TwigTemplate_1ca0f8116896d4a8d303c746419254eb extends Template
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
        yield "Типографика - IT Solutions Blog";
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
        yield "<div class=\"typography fade-in\">
    <h1>Типографика</h1>
    
    <p>Эта страница демонстрирует различные стили типографики, используемые в нашем блоге.</p>
    
    <h2>Заголовки</h2>
    
    <h1>Заголовок первого уровня (H1)</h1>
    <h2>Заголовок второго уровня (H2)</h2>
    <h3>Заголовок третьего уровня (H3)</h3>
    
    <h2>Параграфы и текст</h2>
    
    <p>Это обычный параграф текста. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    
    <p>Еще один параграф с <strong>жирным текстом</strong> и <em>курсивом</em>. Также можно использовать <code>моноширинный шрифт</code> для кода.</p>
    
    <h2>Списки</h2>
    
    <h3>Маркированный список:</h3>
    <ul>
        <li>Первый элемент списка</li>
        <li>Второй элемент списка</li>
        <li>Третий элемент списка</li>
        <li>Четвертый элемент списка</li>
    </ul>
    
    <h3>Нумерованный список:</h3>
    <ol>
        <li>Первый элемент</li>
        <li>Второй элемент</li>
        <li>Третий элемент</li>
    </ol>
    
    <h2>Цитаты</h2>
    
    <blockquote>
        Это пример цитаты. Она выделяется отступом слева и курсивным шрифтом. Цитаты часто используются для выделения важных мыслей или цитирования источников.
    </blockquote>
    
    <h2>Код</h2>
    
    <p>Встроенный код: <code>console.log('Hello World');</code></p>
    
    <p>Блок кода:</p>
    <pre><code>function greet(name) {
    return 'Hello, ' + name + '!';
}

console.log(greet('World'));</code></pre>
    
    <h2>Ссылки</h2>
    
    <p>Это <a href=\"#\">пример ссылки</a>. Ссылки обычно выделяются цветом и подчеркиванием при наведении.</p>
    
    <h2>Таблицы</h2>
    
    <table style=\"width: 100%; border-collapse: collapse; margin: 1rem 0;\">
        <thead>
            <tr style=\"background-color: #f8f9fa;\">
                <th style=\"padding: 0.75rem; text-align: left; border: 1px solid #dee2e6;\">Заголовок 1</th>
                <th style=\"padding: 0.75rem; text-align: left; border: 1px solid #dee2e6;\">Заголовок 2</th>
                <th style=\"padding: 0.75rem; text-align: left; border: 1px solid #dee2e6;\">Заголовок 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 1</td>
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 2</td>
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 3</td>
            </tr>
            <tr style=\"background-color: #f8f9fa;\">
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 4</td>
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 5</td>
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 6</td>
            </tr>
        </tbody>
    </table>
    
    <div class=\"mt-4\">
        <a href=\"/\" class=\"btn btn-back\">← Вернуться на главную</a>
    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "typography.html.twig";
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
        return array (  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Типографика - IT Solutions Blog{% endblock %}

{% block content %}
<div class=\"typography fade-in\">
    <h1>Типографика</h1>
    
    <p>Эта страница демонстрирует различные стили типографики, используемые в нашем блоге.</p>
    
    <h2>Заголовки</h2>
    
    <h1>Заголовок первого уровня (H1)</h1>
    <h2>Заголовок второго уровня (H2)</h2>
    <h3>Заголовок третьего уровня (H3)</h3>
    
    <h2>Параграфы и текст</h2>
    
    <p>Это обычный параграф текста. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    
    <p>Еще один параграф с <strong>жирным текстом</strong> и <em>курсивом</em>. Также можно использовать <code>моноширинный шрифт</code> для кода.</p>
    
    <h2>Списки</h2>
    
    <h3>Маркированный список:</h3>
    <ul>
        <li>Первый элемент списка</li>
        <li>Второй элемент списка</li>
        <li>Третий элемент списка</li>
        <li>Четвертый элемент списка</li>
    </ul>
    
    <h3>Нумерованный список:</h3>
    <ol>
        <li>Первый элемент</li>
        <li>Второй элемент</li>
        <li>Третий элемент</li>
    </ol>
    
    <h2>Цитаты</h2>
    
    <blockquote>
        Это пример цитаты. Она выделяется отступом слева и курсивным шрифтом. Цитаты часто используются для выделения важных мыслей или цитирования источников.
    </blockquote>
    
    <h2>Код</h2>
    
    <p>Встроенный код: <code>console.log('Hello World');</code></p>
    
    <p>Блок кода:</p>
    <pre><code>function greet(name) {
    return 'Hello, ' + name + '!';
}

console.log(greet('World'));</code></pre>
    
    <h2>Ссылки</h2>
    
    <p>Это <a href=\"#\">пример ссылки</a>. Ссылки обычно выделяются цветом и подчеркиванием при наведении.</p>
    
    <h2>Таблицы</h2>
    
    <table style=\"width: 100%; border-collapse: collapse; margin: 1rem 0;\">
        <thead>
            <tr style=\"background-color: #f8f9fa;\">
                <th style=\"padding: 0.75rem; text-align: left; border: 1px solid #dee2e6;\">Заголовок 1</th>
                <th style=\"padding: 0.75rem; text-align: left; border: 1px solid #dee2e6;\">Заголовок 2</th>
                <th style=\"padding: 0.75rem; text-align: left; border: 1px solid #dee2e6;\">Заголовок 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 1</td>
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 2</td>
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 3</td>
            </tr>
            <tr style=\"background-color: #f8f9fa;\">
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 4</td>
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 5</td>
                <td style=\"padding: 0.75rem; border: 1px solid #dee2e6;\">Ячейка 6</td>
            </tr>
        </tbody>
    </table>
    
    <div class=\"mt-4\">
        <a href=\"/\" class=\"btn btn-back\">← Вернуться на главную</a>
    </div>
</div>
{% endblock %} ", "typography.html.twig", "/opt/app/templates/typography.html.twig");
    }
}
