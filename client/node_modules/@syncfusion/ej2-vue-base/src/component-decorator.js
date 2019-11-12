/**
 * Vue Component Base
 */
import Vue from 'vue';
import { ComponentBase } from './component-base';
export var $internalHooks = [
    'data',
    'beforeCreate',
    'created',
    'beforeMount',
    'mounted',
    'beforeDestroy',
    'destroyed',
    'beforeUpdate',
    'updated',
    'activated',
    'deactivated',
    'render',
    'errorCaptured' // 2.5
];
export function EJComponentDecorator(options) {
    return function (Component) {
        return EJcomponentFactory(Component, options);
    };
}
export function EJcomponentFactory(Component, options) {
    if (options === void 0) { options = {}; }
    options.name = options.name || Component._componentTag || Component.name;
    // prototype props.
    var proto = Component.prototype;
    if (options.props) {
        var _loop_1 = function (prop) {
            (options.props || (options.props = {}))[prop] = {};
            (options.watch || (options.watch = {}))[prop] = function (newVal) {
                this.ej2Instances[prop] = newVal;
            };
        };
        for (var _i = 0, _a = options.props; _i < _a.length; _i++) {
            var prop = _a[_i];
            _loop_1(prop);
        }
    }
    Object.getOwnPropertyNames(proto).forEach(function (key) {
        // hooks
        if (key === 'constructor') {
            return;
        }
        if ($internalHooks.indexOf(key) > -1) {
            options[key] = proto[key];
            return;
        }
        var descriptor = Object.getOwnPropertyDescriptor(proto, key);
        if (typeof descriptor.value === 'function') {
            // methods
            (options.methods || (options.methods = {}))[key] = descriptor.value;
        }
        else if (descriptor.get || descriptor.set) {
            // computed properties
            (options.computed || (options.computed = {}))[key] = {
                get: descriptor.get,
                set: descriptor.set
            };
        }
    });
    Object.getOwnPropertyNames(ComponentBase.prototype).forEach(function (key) {
        if ($internalHooks.indexOf(key) > -1) {
            options[key] = proto[key];
            return;
        }
    });
    (options.mixins || (options.mixins = [])).push({
        data: function () {
            return collectDataFromConstructor(this, Component);
        }
    });
    //  decorate options
    var decorators = Component.__decorators__;
    if (decorators) {
        decorators.forEach(Function(options));
        delete Component.__decorators__;
    }
    // find super
    var superProto = Object.getPrototypeOf(Component.prototype);
    var Super = superProto instanceof Vue
        ? superProto.constructor
        : Vue;
    var Extended = Super.extend(options);
    return Extended;
}
function collectDataFromConstructor(vm, Component) {
    Component.prototype._init = function () {
        var _this = this;
        var keys = Object.getOwnPropertyNames(vm);
        if (vm.$options.props) {
            for (var key in vm.$options.props) {
                if (!vm.hasOwnProperty(key)) {
                    keys.push(key);
                }
            }
        }
        keys.forEach(function (key) {
            if (key.charAt(0) !== '_') {
                Object.defineProperty(_this, key, {
                    get: function () { return vm[key]; },
                    set: function (value) { return vm[key] = value; }
                });
            }
        });
    };
    var data = new Component();
    var plainData = {};
    Object.keys(data).forEach(function (key) {
        if (data[key] !== undefined) {
            plainData[key] = data[key];
        }
    });
    return plainData;
}
