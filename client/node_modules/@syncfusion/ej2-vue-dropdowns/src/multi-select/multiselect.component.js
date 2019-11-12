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
import { MultiSelect } from '@syncfusion/ej2-dropdowns';
export var properties = ['actionFailureTemplate', 'allowCustomValue', 'allowFiltering', 'changeOnBlur', 'closePopupOnSelect', 'cssClass', 'dataSource', 'delimiterChar', 'enableGroupCheckBox', 'enablePersistence', 'enableRtl', 'enableSelectionOrder', 'enabled', 'fields', 'filterBarPlaceholder', 'filterType', 'floatLabelType', 'footerTemplate', 'groupTemplate', 'headerTemplate', 'hideSelectedItem', 'htmlAttributes', 'ignoreAccent', 'ignoreCase', 'itemTemplate', 'locale', 'maximumSelectionLength', 'mode', 'noRecordsTemplate', 'openOnClick', 'placeholder', 'popupHeight', 'popupWidth', 'query', 'readonly', 'selectAllText', 'showClearButton', 'showDropDownIcon', 'showSelectAll', 'sortOrder', 'text', 'unSelectAllText', 'value', 'valueTemplate', 'width', 'zIndex', 'actionBegin', 'actionComplete', 'actionFailure', 'beforeOpen', 'blur', 'change', 'chipSelection', 'close', 'created', 'customValueSelection', 'dataBound', 'destroyed', 'filtering', 'focus', 'open', 'removed', 'removing', 'select', 'selectedAll', 'tagging'];
export var modelProps = ['value'];
/**
 * MultiSelect component allows the user to select a value from the predefined list of values.
 * ```html
 * <ejs-multiselect :dataSource='data'></ejs-multiselect>
 * ```
 */
var MultiSelectComponent = /** @class */ (function (_super) {
    __extends(MultiSelectComponent, _super);
    function MultiSelectComponent() {
        var _this = _super.call(this) || this;
        _this.propKeys = properties;
        _this.models = modelProps;
        _this.hasChildDirective = false;
        _this.hasInjectedModules = true;
        _this.tagMapper = {};
        _this.tagNameMapper = {};
        _this.ej2Instances = new MultiSelect({});
        _this.ej2Instances._trigger = _this.ej2Instances.trigger;
        _this.ej2Instances.trigger = _this.trigger;
        _this.bindProperties();
        _this.ej2Instances._setProperties = _this.ej2Instances.setProperties;
        _this.ej2Instances.setProperties = _this.setProperties;
        return _this;
    }
    MultiSelectComponent.prototype.setProperties = function (prop, muteOnChange) {
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
    MultiSelectComponent.prototype.trigger = function (eventName, eventProp, successHandler) {
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
    MultiSelectComponent.prototype.render = function (createElement) {
        return createElement('input', this.$slots.default);
    };
    MultiSelectComponent.prototype.addItem = function (items, itemIndex) {
        return this.ej2Instances.addItem(items, itemIndex);
    };
    MultiSelectComponent.prototype.filter = function (dataSource, query, fields) {
        return this.ej2Instances.filter(dataSource, query, fields);
    };
    MultiSelectComponent.prototype.focusIn = function () {
        return this.ej2Instances.focusIn();
    };
    MultiSelectComponent.prototype.focusOut = function () {
        return this.ej2Instances.focusOut();
    };
    MultiSelectComponent.prototype.getDataByValue = function (value) {
        return this.ej2Instances.getDataByValue(value);
    };
    MultiSelectComponent.prototype.getItems = function () {
        return this.ej2Instances.getItems();
    };
    MultiSelectComponent.prototype.hidePopup = function () {
        return this.ej2Instances.hidePopup();
    };
    MultiSelectComponent.prototype.hideSpinner = function () {
        return this.ej2Instances.hideSpinner();
    };
    MultiSelectComponent.prototype.requiredModules = function () {
        return this.ej2Instances.requiredModules();
    };
    MultiSelectComponent.prototype.selectAll = function (state) {
        return this.ej2Instances.selectAll(state);
    };
    MultiSelectComponent.prototype.showPopup = function () {
        return this.ej2Instances.showPopup();
    };
    MultiSelectComponent.prototype.showSpinner = function () {
        return this.ej2Instances.showSpinner();
    };
    MultiSelectComponent = __decorate([
        EJComponentDecorator({
            props: properties,
            model: {
                event: 'modelchanged'
            }
        })
    ], MultiSelectComponent);
    return MultiSelectComponent;
}(ComponentBase));
export { MultiSelectComponent };
export var MultiSelectPlugin = {
    name: 'ejs-multiselect',
    install: function (Vue) {
        Vue.component(MultiSelectPlugin.name, MultiSelectComponent);
    }
};
