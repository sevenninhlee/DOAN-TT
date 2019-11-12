import { ComponentBase } from '@syncfusion/ej2-vue-base';
export declare const properties: string[];
export declare const modelProps: string[];
/**
 * DropDownList contains a list of predefined values from which the user can choose
 * ```html
 * <ejs-dropdownlist :dataSource='data'></ejs-dropdownlist>
 * ```
 */
export declare class DropDownListComponent extends ComponentBase {
    ej2Instances: any;
    propKeys: string[];
    models: string[];
    hasChildDirective: boolean;
    protected hasInjectedModules: boolean;
    tagMapper: {
        [key: string]: Object;
    };
    tagNameMapper: Object;
    constructor();
    setProperties(prop: any, muteOnChange: boolean): void;
    trigger(eventName: string, eventProp: {
        [key: string]: Object;
    }, successHandler?: Function): void;
    render(createElement: any): any;
    addItem(items: undefined[] | undefined | string | boolean | number | string[] | boolean[] | number[], itemIndex?: number): void;
    filter(dataSource: undefined[] | Object | string[] | number[] | boolean[], query?: Object, fields?: Object): void;
    focusIn(e?: Object | Object | Object | Object): void;
    focusOut(): void;
    getDataByValue(value: string | number | boolean): Object | string | number | boolean;
    getItems(): Object[];
    hidePopup(): void;
    hideSpinner(): void;
    showPopup(): void;
    showSpinner(): void;
}
export declare const DropDownListPlugin: {
    name: string;
    install(Vue: any): void;
};
