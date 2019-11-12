import Vue from 'vue';
import { setTemplateEngine, getTemplateEngine, getUniqueID, createElement, detach, extend } from "@syncfusion/ej2-base";
// tslint:disable:no-any
var stringCompiler = getTemplateEngine();
export function compile(templateElement, helper) {
    var that = this;
    if (typeof templateElement === 'string') {
        return stringCompiler(templateElement, helper);
    }
    else {
        return function (data) {
            var pid = getUniqueID('templateParentDiv');
            var id = getUniqueID('templateDiv');
            var ele = createElement('div', { id: pid, innerHTML: '<div id="' + id + '"></div>' });
            document.body.appendChild(ele);
            var tempObj = templateElement.call(that, {});
            var templateVue = new Vue(tempObj.template);
            templateVue.$data.data = extend(tempObj.data, data);
            templateVue.$mount('#' + id);
            var returnEle = ele.childNodes;
            detach(ele);
            return returnEle;
        };
    }
}
setTemplateEngine({ compile: compile });
