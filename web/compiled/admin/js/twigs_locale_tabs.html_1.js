/**
 * @fileoverview Compiled template for file
 *
 * 
 *
 * @suppress {checkTypes|fileoverviewTags}
 */

goog.provide('localeTabs');

goog.require('twig');
goog.require('twig.filter');

/**
 * @constructor
 * @param {twig.Environment} env
 * @extends {twig.Template}
 */
localeTabs = function(env) {
    twig.Template.call(this, env);
};
twig.inherits(localeTabs, twig.Template);

/**
 * @inheritDoc
 */
localeTabs.prototype.getParent_ = function(context) {
    return false;
};

/**
 * @inheritDoc
 */
localeTabs.prototype.render_ = function(sb, context, blocks) {
    // line 2
    sb.append("<div class=\"locale-tabs\">\n    ");
    // line 3
    context['_parent'] = context;
    var seq = ("locales" in context ? context["locales"] : null);
    twig.forEach(seq, function(v, k) {
        context["_key"] = k;
        context["locale"] = v;
        // line 4
        sb.append("        <a href=\"#\"");
        if (((("locale" in context ? context["locale"] : null)) == (("currentLocale" in context ? context["currentLocale"] : null)))) {
            sb.append(" class=\"active\"");
        }
        sb.append(" data-locale=\"");
        sb.append(twig.filter.escape(this.env_, ("locale" in context ? context["locale"] : null), "html", null, true));
        sb.append("\"><img src=\"");
        sb.append(twig.filter.escape(this.env_, ("basePath" in context ? context["basePath"] : null), "html", null, true));
        sb.append("\/bundles\/bigfootcore\/img\/flags\/");
        sb.append(twig.filter.escape(this.env_, ("locale" in context ? context["locale"] : null), "html", null, true));
        sb.append(".gif\" title=\"");
        sb.append(twig.filter.escape(this.env_, ("locale" in context ? context["locale"] : null), "html", null, true));
        sb.append("\" \/><\/a>\n    ");
    }, this);
    // line 6
    sb.append("<\/div>");
};

/**
 * @inheritDoc
 */
localeTabs.prototype.getTemplateName = function() {
    return "localeTabs";
};

/**
 * Returns whether this template can be used as trait.
 *
 * @return {boolean}
 */
localeTabs.prototype.isTraitable = function() {
    return false;
};
