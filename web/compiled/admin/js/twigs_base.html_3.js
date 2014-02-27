/**
 * @fileoverview Compiled template for file
 *
 * 
 *
 * @suppress {checkTypes|fileoverviewTags}
 */

goog.provide('modaleTemplate');

goog.require('twig');
goog.require('twig.filter');

/**
 * @constructor
 * @param {twig.Environment} env
 * @extends {twig.Template}
 */
modaleTemplate = function(env) {
    twig.Template.call(this, env);
};
twig.inherits(modaleTemplate, twig.Template);

/**
 * @inheritDoc
 */
modaleTemplate.prototype.getParent_ = function(context) {
    return false;
};

/**
 * @inheritDoc
 */
modaleTemplate.prototype.render_ = function(sb, context, blocks) {
    // line 2
    sb.append("<div class=\"modal\">\n    <div class=\"modal-dialog\">\n        <div class=\"modal-content\">\n            <div class=\"modal-header\">\n                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">\u00d7<\/button>\n            <\/div>\n            <div class=\"modal-body\">\n                ");
    // line 9
    sb.append(("modal_content" in context ? context["modal_content"] : null));
    sb.append("\n            <\/div>\n            <div class=\"modal-footer\">\n                <a class=\"btn btn-lg btn-success\" href=\"#\"><i class=\"icon-ok\"><\/i> Submit<\/a>\n            <\/div>\n        <\/div>\n    <\/div>\n<\/div>\n");
};

/**
 * @inheritDoc
 */
modaleTemplate.prototype.getTemplateName = function() {
    return "modaleTemplate";
};

/**
 * Returns whether this template can be used as trait.
 *
 * @return {boolean}
 */
modaleTemplate.prototype.isTraitable = function() {
    return false;
};
