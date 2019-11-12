var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    }
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
import { isUndefined } from '@syncfusion/ej2-base';
import { ComponentBase, EJComponentDecorator } from '@syncfusion/ej2-vue-base';
import { AutoComplete } from '@syncfusion/ej2-dropdowns';
export var properties = ['actionFailureTemplate', 'allowCustom', 'allowFiltering', 'autofill', 'cssClass', 'dataSource', 'enablePersistence', 'enableRtl', 'enabled', 'fields', 'filterBarPlaceholder', 'filterType', 'floatLabelType', 'footerTemplate', 'groupTemplate', 'headerTemplate', 'highlight', 'htmlAttributes', 'ignoreAccent', 'ignoreCase', 'index', 'itemTemplate', 'locale', 'minLength', 'noRecordsTemplate', 'placeholder', 'popupHeight', 'popupWidth', 'query', 'readonly', 'showClearButton', 'showPopupButton', 'sortOrder', 'suggestionCount', 'text', 'value', 'valueTemplate', 'width', 'zIndex', 'actionBegin', 'actionComplete', 'actionFailure', 'beforeOpen', 'blur', 'change', 'close', 'created', 'customValueSpecifier', 'dataBound', 'destroyed', 'filtering', 'focus', 'open', 'select'];
export var modelProps = ['value'];
/**
 * The AutoComplete component provides all the matched suggestion list on typing the input from which the user can select one.
 * ```html
 * <ejs-autocomplete :dataSource='data'></ejs-autocomplete>
 * ```
 */
var AutoCompleteComponent = /** @class */ (function (_super) {
    __extends(AutoCompleteComponent, _super);
    function AutoCompleteComponent() {
        var _this = _super.call(this) || this;
        _this.propKeys = properties;
        _this.models = modelProps;
        _this.hasChildDirective = false;
        _this.hasInjectedModules = false;
        _this.tagMapper = {};
        _this.tagNameMapper = {};
        _this.ej2Instances = new AutoComplete({});
        _this.ej2Instances._trigger = _this.ej2Instances.trigger;
        _this.ej2Instances.trigger = _this.trigger;
        _this.bindProperties();
        _this.ej2Instances._setProperties = _this.ej2Instances.setProperties;
        _this.ej2Instances.setProperties = _this.setProperties;
        return _this;
    }
    AutoCompleteComponent.prototype.setProperties = function (prop, muteOnChange) {
        var _this = this;
        if (this.ej2Instances && this.ej2Instances._setProperties) {
            this.ej2Instances._setProperties(prop, muteOnChange);
        }
        if (prop && this.models && this.models.length) {
            Object.keys(prop).map(function (key) {
                _this.models.map(function (model) {
                    if ((key === model) && !(/datasource/i.test(key))) {
                        _this.$emit('update:' + key, prop[key]);
                    }
                });
            });
        }
    };
    AutoCompleteComponent.prototype.trigger = function (eventName, eventProp, successHandler) {
        if ((eventName === 'change' || eventName === 'input') && this.models && (this.models.length !== 0)) {
            var key = this.models.toString().match(/checked|value/) || [];
            var propKey = key[0];
            if (eventProp && key && !isUndefined(eventProp[propKey])) {
                this.$emit('update:' + propKey, eventProp[propKey]);
                this.$emit('modelchanged', eventProp[propKey]);
            }
        }
        if (this.ej2Instances && this.ej2Instances._trigger) {
            this.ej2Instances._trigger(eventName, eventProp, successHandler);
        }
    };
    AutoCompleteComponent.prototype.render = function (createElement) {
        return createElement('input', this.$slots.default);
    };
    AutoCompleteComponent.prototype.addItem = function (items, itemIndex) {
        return this.ej2Instances.addItem(items, itemIndex);
    };
    AutoCompleteComponent.prototype.filter = function (dataSource, query, fields) {
        return this.ej2Instances.filter(dataSource, query, fields);
    };
    AutoCompleteComponent.prototype.focusIn = function () {
        return this.ej2Instances.focusIn();
    };
    AutoCompleteComponent.prototype.focusOut = function () {
        return this.ej2Instances.focusOut();
    };
    AutoCompleteComponent.prototype.getDataByValue = function (value) {
        return this.ej2Instances.getDataByValue(value);
    };
    AutoCompleteComponent.prototype.getItems = function () {
        return this.ej2Instances.getItems();
    };
    AutoCompleteComponent.prototype.hidePopup = function () {
        return this.ej2Instances.hidePopup();
    };
    AutoCompleteComponent.prototype.hideSpinner = function () {
        return this.ej2Instances.hideSpinner();
    };
    AutoCompleteComponent.prototype.showPopup = function () {
        return this.ej2Instances.showPopup();
    };
    AutoCompleteComponent.prototype.showSpinner = function () {
        return this.ej2Instances.showSpinner();
    };
    AutoCompleteComponent = __decorate([
        EJComponentDecorator({
            props: properties,
            model: {
                event: 'modelchanged'
            }
        })
    ], AutoCompleteComponent);
    return AutoCompleteComponent;
}(ComponentBase));
export { AutoCompleteComponent };
export var AutoCompletePlugin = {
    name: 'ejs-autocomplete',
    install: function (Vue) {
        Vue.component(AutoCompletePlugin.name, AutoCompleteComponent);
    }
};
