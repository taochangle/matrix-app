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
class __TwigTemplate_05568b3c5e42d863e5be499abef5db99 extends Template
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
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, sans-serif; max-width: 900px; margin: 2rem auto; padding: 0 1.5rem; background: #f9fafb; color: #1f2937; }
        h1 { font-size: 2rem; margin-bottom: 0.5rem; }
        p.sub { color: #6b7280; margin-bottom: 2rem; }
        .card { background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 1.5rem; margin-bottom: 1.5rem; }
        .card h2 { font-size: 1.1rem; margin-bottom: 1rem; color: #374151; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 0.6rem 0.8rem; border-bottom: 1px solid #f3f4f6; }
        th { font-size: 0.8rem; color: #9ca3af; text-transform: uppercase; font-weight: 600; }
        td { font-size: 0.95rem; }
        .badge { display: inline-block; background: #dbeafe; color: #1e40af; padding: 0.15em 0.6em; border-radius: 999px; font-size: 0.8rem; font-weight: 500; }
        .empty { color: #9ca3af; font-style: italic; }
        code { background: #e5e7eb; padding: 0.15em 0.4em; border-radius: 4px; font-size: 0.9em; }
        ul { list-style: none; display: flex; gap: 1rem; flex-wrap: wrap; }
        ul li { background: #f3f4f6; padding: 0.35em 0.75em; border-radius: 6px; font-size: 0.9rem; }
    </style>
</head>
<body>
    <h1>";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</h1>
    <p class=\"sub\">";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["message"] ?? null), "html", null, true);
        yield " — 页面底部 DebugBar 可查看 SQL 查询、时间线、消息</p>

    <div class=\"card\">
        <h2>Users (Eloquent ORM)</h2>
        ";
        // line 30
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["users"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 31
            yield "        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Created</th></tr></thead>
            <tbody>
            ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["users"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 35
                yield "            <tr>
                <td><span class=\"badge\">#";
                // line 36
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 36), "html", null, true);
                yield "</span></td>
                <td>";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 37), "html", null, true);
                yield "</td>
                <td>";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 38), "html", null, true);
                yield "</td>
                <td>";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "created_at", [], "any", false, false, false, 39), "html", null, true);
                yield "</td>
            </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            yield "            </tbody>
        </table>
        ";
        } else {
            // line 45
            yield "        <p class=\"empty\">暂无用户数据。在 Tinker 中执行 <code>App\\Models\\User::create([\x27name\x27=>\x27Alice\x27,\x27email\x27=>\x27alice@example.com\x27,\x27password\x27=>\x27secret\x27])</code></p>
        ";
        }
        // line 47
        yield "    </div>

    <div class=\"card\">
        <h2>快速开始</h2>
        <ul>
            <li>routes/web.php</li>
            <li>app/Controllers/</li>
            <li>views/*.html.twig</li>
            <li>app/Models/</li>
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
        return array (  126 => 47,  122 => 45,  117 => 42,  108 => 39,  104 => 38,  100 => 37,  96 => 36,  93 => 35,  89 => 34,  84 => 31,  82 => 30,  75 => 26,  71 => 25,  48 => 5,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"zh\">
<head>
    <meta charset=\"UTF-8\">
    <title>{{ title }}</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, sans-serif; max-width: 900px; margin: 2rem auto; padding: 0 1.5rem; background: #f9fafb; color: #1f2937; }
        h1 { font-size: 2rem; margin-bottom: 0.5rem; }
        p.sub { color: #6b7280; margin-bottom: 2rem; }
        .card { background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 1.5rem; margin-bottom: 1.5rem; }
        .card h2 { font-size: 1.1rem; margin-bottom: 1rem; color: #374151; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 0.6rem 0.8rem; border-bottom: 1px solid #f3f4f6; }
        th { font-size: 0.8rem; color: #9ca3af; text-transform: uppercase; font-weight: 600; }
        td { font-size: 0.95rem; }
        .badge { display: inline-block; background: #dbeafe; color: #1e40af; padding: 0.15em 0.6em; border-radius: 999px; font-size: 0.8rem; font-weight: 500; }
        .empty { color: #9ca3af; font-style: italic; }
        code { background: #e5e7eb; padding: 0.15em 0.4em; border-radius: 4px; font-size: 0.9em; }
        ul { list-style: none; display: flex; gap: 1rem; flex-wrap: wrap; }
        ul li { background: #f3f4f6; padding: 0.35em 0.75em; border-radius: 6px; font-size: 0.9rem; }
    </style>
</head>
<body>
    <h1>{{ title }}</h1>
    <p class=\"sub\">{{ message }} — 页面底部 DebugBar 可查看 SQL 查询、时间线、消息</p>

    <div class=\"card\">
        <h2>Users (Eloquent ORM)</h2>
        {% if users is not empty %}
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Created</th></tr></thead>
            <tbody>
            {% for user in users %}
            <tr>
                <td><span class=\"badge\">#{{ user.id }}</span></td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.created_at }}</td>
            </tr>
            {% endfor %}
            </tbody>
        </table>
        {% else %}
        <p class=\"empty\">暂无用户数据。在 Tinker 中执行 <code>App\\Models\\User::create([\x27name\x27=>\x27Alice\x27,\x27email\x27=>\x27alice@example.com\x27,\x27password\x27=>\x27secret\x27])</code></p>
        {% endif %}
    </div>

    <div class=\"card\">
        <h2>快速开始</h2>
        <ul>
            <li>routes/web.php</li>
            <li>app/Controllers/</li>
            <li>views/*.html.twig</li>
            <li>app/Models/</li>
        </ul>
    </div>
</body>
</html>
", "home.html.twig", "/app/views/home.html.twig");
    }
}
