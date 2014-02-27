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
    sb.append("<div class=\"bootbox modal fade in\" id=\"confirmModal\">\n    <div class=\"modal-dialog\">\n        <div class=\"modal-content\">\n            <div class=\"modal-header\">\n                <button type=\"button\" class=\"bootbox-close-button close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;<\/button>\n                <h4 class=\"modal-title\">");
    // line 7
    sb.append(twig.filter.escape(this.env_, ((("confirmTitle" in context)) ? (twig.filter.def(("confirmTitle" in context ? context["confirmTitle"] : null), "Please confirm")) : ("Please confirm")), "html", null, true));
    sb.append("<\/h4>\n            <\/div>\n            <div class=\"modal-body\">\n                <div class=\"bootbox-body\">");
    // line 10
    sb.append(twig.filter.escape(this.env_, ((("confirmMessage" in context)) ? (twig.filter.def(("confirmMessage" in context ? context["confirmMessage"] : null), "Are you sure you want to perform this action ?")) : ("Are you sure you want to perform this action ?")), "html", null, true));
    sb.append("<\/div>\n            <\/div>\n            <div class=\"modal-footer\">\n                <button type=\"button\" class=\"btn btn-default\" data-bb-handler=\"cancel\">");
    // line 13
    sb.append(twig.filter.escape(this.env_, ((("confirmButtonCancel" in context)) ? (twig.filter.def(("confirmButtonCancel" in context ? context["confirmButtonCancel"] : null), "Cancel")) : ("Cancel")), "html", null, true));
    sb.append("<\/button>\n                <button type=\"button\" class=\"btn btn-primary\" data-bb-handler=\"confirm\">");
    // line 14
    sb.append(twig.filter.escape(this.env_, ((("confirmButtonOk" in context)) ? (twig.filter.def(("confirmButtonOk" in context ? context["confirmButtonOk"] : null), "Ok")) : ("Ok")), "html", null, true));
    sb.append("<\/button>\n            <\/div>\n        <\/div>\n    <\/div>\n<\/div>");
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
