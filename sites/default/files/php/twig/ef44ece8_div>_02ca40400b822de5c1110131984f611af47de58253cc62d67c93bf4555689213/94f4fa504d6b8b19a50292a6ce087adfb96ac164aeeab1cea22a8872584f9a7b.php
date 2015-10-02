<?php

/* {# inline_template_start #}<div id="js-cookieterms" class="cookieterms">
  <div class="cookieterms--inner">
    <span class="cookieterms--text">{{ text }}.
    {% if not (read_more_url is empty or read_more_text is empty) %}
    <a href="{{ read_more_url }}">{{ read_more_text }}</a>.
    {% endif %}
    </span>
    <span class="cookieterms--agree">
      <span id="js-cookieterms--agree" class="cookieterms--button">{{ accept_button_text }}</span>
    </span>
  </div>
</div> */
class __TwigTemplate_450613224b3e3ea4c8571f689aeed925b9b5dd48364bb5c1c80b5d664c341053 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"js-cookieterms\" class=\"cookieterms\">
  <div class=\"cookieterms--inner\">
    <span class=\"cookieterms--text\">";
        // line 3
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["text"]) ? $context["text"] : null), "html", null, true);
        echo ".
    ";
        // line 4
        if ( !(twig_test_empty((isset($context["read_more_url"]) ? $context["read_more_url"] : null)) || twig_test_empty((isset($context["read_more_text"]) ? $context["read_more_text"] : null)))) {
            // line 5
            echo "    <a href=\"";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["read_more_url"]) ? $context["read_more_url"] : null), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["read_more_text"]) ? $context["read_more_text"] : null), "html", null, true);
            echo "</a>.
    ";
        }
        // line 7
        echo "    </span>
    <span class=\"cookieterms--agree\">
      <span id=\"js-cookieterms--agree\" class=\"cookieterms--button\">";
        // line 9
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["accept_button_text"]) ? $context["accept_button_text"] : null), "html", null, true);
        echo "</span>
    </span>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}<div id=\"js-cookieterms\" class=\"cookieterms\">
  <div class=\"cookieterms--inner\">
    <span class=\"cookieterms--text\">{{ text }}.
    {% if not (read_more_url is empty or read_more_text is empty) %}
    <a href=\"{{ read_more_url }}\">{{ read_more_text }}</a>.
    {% endif %}
    </span>
    <span class=\"cookieterms--agree\">
      <span id=\"js-cookieterms--agree\" class=\"cookieterms--button\">{{ accept_button_text }}</span>
    </span>
  </div>
</div>";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 9,  48 => 7,  40 => 5,  38 => 4,  34 => 3,  30 => 1,);
    }
}
/* {# inline_template_start #}<div id="js-cookieterms" class="cookieterms">*/
/*   <div class="cookieterms--inner">*/
/*     <span class="cookieterms--text">{{ text }}.*/
/*     {% if not (read_more_url is empty or read_more_text is empty) %}*/
/*     <a href="{{ read_more_url }}">{{ read_more_text }}</a>.*/
/*     {% endif %}*/
/*     </span>*/
/*     <span class="cookieterms--agree">*/
/*       <span id="js-cookieterms--agree" class="cookieterms--button">{{ accept_button_text }}</span>*/
/*     </span>*/
/*   </div>*/
/* </div>*/
