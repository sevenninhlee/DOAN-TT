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
import { ListBox } from '@syncfusion/ej2-dropdowns';
export var properties = ['actionFailureTemplate', 'allowDragAndDrop', 'allowFiltering', 'cssClass', 'dataSource', 'enablePersistence', 'enableRtl', 'enabled', 'fields', 'filterType', 'groupTemplate', 'height', 'ignoreAccent', 'ignoreCase', 'itemTemplate', 'locale', 'maximumSelectionLength', 'noRecordsTemplate', 'query', 'scope', 'selectionSettings', 'sortOrder', 'toolbarSettings', 'value', 'zIndex', 'actionBegin', 'actionComplete', 'actionFailure', 'beforeItemRender', 'change', 'created', 'dataBound', 'destroyed', 'drag', 'dragStart', 'drop', 'filtering', 'select'];
export var modelProps = ['value'];
/**
 * ListBox component allows the user to select values from the predefined list of values.
 * ```html
 * <ejs-listbox :dataSource='data'></ejs-listbox>
 * ```
 */
var ListBoxComponent = /** @class */ (function (_super) {
    __extends(ListBoxComponent, _super);
    function ListBoxComponent() {
        var _this = _super.call(this) || this;
        _this.propKeys = properties;
        _this.models = modelProps;
        _this.hasChildDirective = false;
        _this.hasInjectedModules = true;
        _this.tagMapper = {};
        _this.tagNameMapper = {};
        _this.ej2Instances = new ListBox({});
        _this.ej2Instances._trigger = _this.ej2Instances.trigger;
        _this.ej2Instances.trigger = _this.trigger;
        _this.bindProperties();
        _this.ej2Instances._setProperties = _this.ej2Instances.setProperties;
        _this.ej2Instances.setProperties = _this.setProperties;
        return _this;
    }
    ListBoxComponent.prototype.setProperties = function (prop, muteOnChange) {
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
    ListBoxComponent.prototype.trigger = function (eventName, eventProp, successHandler) {
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
    ListBoxComponent.prototype.render = function (createElement) {
        return createElement('input', this.$slots.default);
    };
    ListBoxComponent.prototype.addItems = function (items, itemIndex) {
        return this.ej2Instances.addItems(items, itemIndex);
    };
    ListBoxComponent.prototype.enableItems = function (items, enable) {
        return this.ej2Instances.enableItems(items, enable);
    };
    ListBoxComponent.prototype.filter = function (dataSource, query, fields) {
        return this.ej2Instances.filter(dataSource, query, fields);
    };
    ListBoxComponent.prototype.getDataByValue = function (value) {
        return this.ej2Instances.getDataByValue(value);
    };
    ListBoxComponent.prototype.getItems = function () {
        return this.ej2Instances.getItems();
    };
    ListBoxComponent.prototype.removeItem = function (items, itemIndex) {
        return this.ej2Instances.removeItem(items, itemIndex);
    };
    ListBoxComponent.prototype.removeItems = function (items, itemIndex) {
        return this.ej2Instances.removeItems(items, itemIndex);
    };
    ListBoxComponent.prototype.requiredModules = function () {
        return this.ej2Instances.requiredModules();
    };
    ListBoxComponent.prototype.selectAll = function (state) {
        return this.ej2Instances.selectAll(state);
    };
    ListBoxComponent.prototype.selectItems = function (items, state) {
        return this.ej2Instances.selectItems(items, state);
    };
    ListBoxComponent = __decorate([
        EJComponentDecorator({
            props: properties,
            model: {
                event: 'modelchanged'
            }
        })
    ], ListBoxComponent);
    return ListBoxComponent;
}(ComponentBase));
export { ListBoxComponent };
export var ListBoxPlugin = {
    name: 'ejs-listbox',
    install: function (Vue) {
        Vue.component(ListBoxPlugin.name, ListBoxComponent);
    }
};
