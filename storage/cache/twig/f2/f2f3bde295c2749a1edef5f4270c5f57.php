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

/* home.html.twig */
class __TwigTemplate_966f993fb6fc9a841d2f9c0a8ad75081 extends Template
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
        yield "<!DOCTYPE html>
<html lang=\"zh\">
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 800px; margin: 2rem auto; padding: 0 1rem; }
        h1 { color: #333; }
        .card { background: #f5f5f5; border-radius: 8px; padding: 1rem; margin: 1rem 0; }
        code { background: #e0e0e0; padding: 0.2em 0.4em; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</h1>
    <p>";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["message"] ?? null), "html", null, true);
        yield "</p>

    <div class=\"card\">
        <h2>快速开始</h2>
        <ul>
            <li>路由文件: <code>routes/web.php</code></li>
            <li>控制器: <code>app/Controllers/</code></li>
            <li>模板: <code>views/</code></li>
        </ul>
    </div>
</body>
</html>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home.html.twig";
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
        return array (  64 => 15,  60 => 14,  48 => 5,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"zh\">
<head>
    <meta charset=\"UTF-8\">
    <title>{{ title }}</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 800px; margin: 2rem auto; padding: 0 1rem; }
        h1 { color: #333; }
        .card { background: #f5f5f5; border-radius: 8px; padding: 1rem; margin: 1rem 0; }
        code { background: #e0e0e0; padding: 0.2em 0.4em; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>{{ title }}</h1>
    <p>{{ message }}</p>

    <div class=\"card\">
        <h2>快速开始</h2>
        <ul>
            <li>路由文件: <code>routes/web.php</code></li>
            <li>控制器: <code>app/Controllers/</code></li>
            <li>模板: <code>views/</code></li>
        </ul>
    </div>
</body>
</html>
", "home.html.twig", "/app/views/home.html.twig");
    }
}
