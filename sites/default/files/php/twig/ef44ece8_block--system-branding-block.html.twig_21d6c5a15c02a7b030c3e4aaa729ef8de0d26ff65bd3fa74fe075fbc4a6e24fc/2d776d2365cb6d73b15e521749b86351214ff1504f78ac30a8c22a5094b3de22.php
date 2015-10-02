<?php

/* core/themes/classy/templates/block/block--system-branding-block.html.twig */
class __TwigTemplate_ff245199d799da15640ac30f2c2b6b26c0d334986563cac36e144c443c10591b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("block.html.twig", "core/themes/classy/templates/block/block--system-branding-block.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "block.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "  ";
        if ((isset($context["site_logo"]) ? $context["site_logo"] : null)) {
            // line 18
            echo "    <a href=\"";
            echo $this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('drupal_core')->getPath("<front>"));
            echo "\" title=\"";
            echo $this->env->getExtension('drupal_core')->renderVar(t("Home"));
            echo "\" rel=\"home\" class=\"site-logo\">
      <img src=\"";
            // line 19
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["site_logo"]) ? $context["site_logo"] : null), "html", null, true);
            echo "\" alt=\"";
            echo $this->env->getExtension('drupal_core')->renderVar(t("Home"));
            echo "\" />
    </a>
  ";
        }
        // line 22
        echo "  ";
        if ((isset($context["site_name"]) ? $context["site_name"] : null)) {
            // line 23
            echo "    <div class=\"site-name\">
      <a href=\"";
            // line 24
            echo $this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('drupal_core')->getPath("<front>"));
            echo "\" title=\"";
            echo $this->env->getExtension('drupal_core')->renderVar(t("Home"));
            echo "\" rel=\"home\">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
            echo "</a>
    </div>
  ";
        }
        // line 27
        echo "  ";
        if ((isset($context["site_slogan"]) ? $context["site_slogan"] : null)) {
            // line 28
            echo "    <div class=\"site-slogan\">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["site_slogan"]) ? $context["site_slogan"] : null), "html", null, true);
            echo "</div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/block/block--system-branding-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 28,  65 => 27,  55 => 24,  52 => 23,  49 => 22,  41 => 19,  34 => 18,  31 => 17,  28 => 16,  11 => 1,);
    }
}
/* {% extends "block.html.twig" %}*/
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for a branding block.*/
/*  **/
/*  * Each branding element variable (logo, name, slogan) is only available if*/
/*  * enabled in the block configuration.*/
/*  **/
/*  * Available variables:*/
/*  * - site_logo: Logo for site as defined in Appearance or theme settings.*/
/*  * - site_name: Name for site as defined in Site information settings.*/
/*  * - site_slogan: Slogan for site as defined in Site information settings.*/
/*  *//* */
/* #}*/
/* {% block content %}*/
/*   {% if site_logo %}*/
/*     <a href="{{ path('<front>') }}" title="{{ 'Home'|t }}" rel="home" class="site-logo">*/
/*       <img src="{{ site_logo }}" alt="{{ 'Home'|t }}" />*/
/*     </a>*/
/*   {% endif %}*/
/*   {% if site_name %}*/
/*     <div class="site-name">*/
/*       <a href="{{ path('<front>') }}" title="{{ 'Home'|t }}" rel="home">{{ site_name }}</a>*/
/*     </div>*/
/*   {% endif %}*/
/*   {% if site_slogan %}*/
/*     <div class="site-slogan">{{ site_slogan }}</div>*/
/*   {% endif %}*/
/* {% endblock %}*/
/* */
