/**
 * @fileoverview Compiled template for file
 *
 * 
 *
 * @suppress {checkTypes|fileoverviewTags}
 */

goog.provide('confirmModal');

goog.require('twig');
goog.require('twig.filter');

/**
 * @constructor
 * @param {twig.Environment} env
 * @extends {twig.Template}
 */
confirmModal = function(env) {
    twig.Template.call(this, env);
};
twig.inherits(confirmModal, twig.Template);

/**
 * @inheritDoc
 */
confirmModal.prototype.getParent_ = function(context) {
    return false;
};

/**
 * @inheritDoc
 */
confirmModal.prototype.render_ = function(sb, context, blocks) {
    // line 2
    sb.append("<div class=\"modal container fade in\" id=\"confirmModal\">\n    <div class=\"modal-header\">\n        <button type=\"button\" class=\"bootbox-close-button close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;<\/button>\n        <h4 class=\"modal-title\">");
    // line 5
    sb.append(twig.filter.escape(this.env_, ((("confirmTitle" in context)) ? (twig.filter.def(("confirmTitle" in context ? context["confirmTitle"] : null), "Please confirm")) : ("Please confirm")), "html", null, true));
    sb.append("<\/h4>\n    <\/div>\n    <div class=\"modal-body\">\n        <div class=\"bootbox-body\">");
    // line 8
    sb.append(twig.filter.escape(this.env_, ((("confirmMessage" in context)) ? (twig.filter.def(("confirmMessage" in context ? context["confirmMessage"] : null), "Are you sure you want to perform this action ?")) : ("Are you sure you want to perform this action ?")), "html", null, true));
    sb.append("<\/div>\n    <\/div>\n    <div class=\"modal-footer\">\n        <button type=\"button\" class=\"btn btn-default\" data-bb-handler=\"cancel\">");
    // line 11
    sb.append(twig.filter.escape(this.env_, ((("confirmButtonCancel" in context)) ? (twig.filter.def(("confirmButtonCancel" in context ? context["confirmButtonCancel"] : null), "Cancel")) : ("Cancel")), "html", null, true));
    sb.append("<\/button>\n        <button type=\"button\" class=\"btn btn-primary\" data-bb-handler=\"confirm\">");
    // line 12
    sb.append(twig.filter.escape(this.env_, ((("confirmButtonOk" in context)) ? (twig.filter.def(("confirmButtonOk" in context ? context["confirmButtonOk"] : null), "Ok")) : ("Ok")), "html", null, true));
    sb.append("<\/button>\n    <\/div>\n<\/div>\n");
};

/**
 * @inheritDoc
 */
confirmModal.prototype.getTemplateName = function() {
    return "confirmModal";
};

/**
 * Returns whether this template can be used as trait.
 *
 * @return {boolean}
 */
confirmModal.prototype.isTraitable = function() {
    return false;
};
