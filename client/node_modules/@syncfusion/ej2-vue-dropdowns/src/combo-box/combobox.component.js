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
import { ComboBox } from '@syncfusion/ej2-dropdowns';
export var properties = ['actionFailureTemplate', 'allowCustom', 'allowFiltering', 'autofill', 'cssClass', 'dataSource', 'enablePersistence', 'enableRtl', 'enabled', 'fields', 'filterBarPlaceholder', 'filterType', 'floatLabelType', 'footerTemplate', 'groupTemplate', 'headerTemplate', 'htmlAttributes', 'ignoreAccent', 'ignoreCase', 'index', 'itemTemplate', 'locale', 'noRecordsTemplate', 'placeholder', 'popupHeight', 'popupWidth', 'query', 'readonly', 'showClearButton', 'sortOrder', 'text', 'value', 'valueTemplate', 'width', 'zIndex', 'actionBegin', 'actionComplete', 'actionFailure', 'beforeOpen', 'blur', 'change', 'close', 'created', 'customValueSpecifier', 'dataBound', 'destroyed', 'filtering', 'focus', 'open', 'select'];
export var modelProps = ['value'];
/**
 * ComboBox component allows the user to type a value or choose an option from the list of predefined options available
 * ```html
 * <ejs-combobox :dataSource='data'></ejs-combobox>
 * ```
 */
var ComboBoxComponent = /** @class */ (function (_super) {
    __extends(ComboBoxComponent, _super);
    function ComboBoxComponent() {
        var _this = _super.call(this) || this;
        _this.propKeys = properties;
        _this.models = modelProps;
        _this.hasChildDirective = false;
        _this.hasInjectedModules = false;
        _this.tagMapper = {};
        _this.tagNameMapper = {};
        _this.ej2Instances = new ComboBox({});
        _this.ej2Instances._trigger = _this.ej2Instances.trigger;
        _this.ej2Instances.trigger = _this.trigger;
        _this.bindProperties();
        _this.ej2Instances._setProperties = _this.ej2Instances.setProperties;
        _this.ej2Instances.setProperties = _this.setProperties;
        return _this;
    }
    ComboBoxComponent.prototype.setProperties = function (prop, muteOnChange) {
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
    ComboBoxComponent.prototype.trigger = function (eventName, eventProp, successHandler) {
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
    ComboBoxComponent.prototype.render = function (createElement) {
        return createElement('input', this.$slots.default);
    };
    ComboBoxComponent.prototype.addItem = function (items, itemIndex) {
        return this.ej2Instances.addItem(items, itemIndex);
    };
    ComboBoxComponent.prototype.filter = function (dataSource, query, fields) {
        return this.ej2Instances.filter(dataSource, query, fields);
    };
    ComboBoxComponent.prototype.focusIn = function () {
        return this.ej2Instances.focusIn();
    };
    ComboBoxComponent.prototype.focusOut = function () {
        return this.ej2Instances.focusOut();
    };
    ComboBoxComponent.prototype.getDataByValue = function (value) {
        return this.ej2Instances.getDataByValue(value);
    };
    ComboBoxComponent.prototype.getItems = function () {
        return this.ej2Instances.getItems();
    };
    ComboBoxComponent.prototype.hidePopup = function () {
        return this.ej2Instances.hidePopup();
    };
    ComboBoxComponent.prototype.hideSpinner = function () {
        return this.ej2Instances.hideSpinner();
    };
    ComboBoxComponent.prototype.showPopup = function () {
        return this.ej2Instances.showPopup();
    };
    ComboBoxComponent.prototype.showSpinner = function () {
        return this.ej2Instances.showSpinner();
    };
    ComboBoxComponent = __decorate([
        EJComponentDecorator({
            props: properties,
            model: {
                event: 'modelchanged'
            }
        })
    ], ComboBoxComponent);
    return ComboBoxComponent;
}(ComponentBase));
export { ComboBoxComponent };
export var ComboBoxPlugin = {
    name: 'ejs-combobox',
    install: function (Vue) {
        Vue.component(ComboBoxPlugin.name, ComboBoxComponent);
    }
};
