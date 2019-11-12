import { ComponentBase } from '@syncfusion/ej2-vue-base';
export declare const properties: string[];
export declare const modelProps: string[];
/**
 * The AutoComplete component provides all the matched suggestion list on typing the input from which the user can select one.
 * ```html
 * <ejs-autocomplete :dataSource='data'></ejs-autocomplete>
 * ```
 */
export declare class AutoCompleteComponent extends ComponentBase {
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
    focusIn(): void;
    focusOut(): void;
    getDataByValue(value: string | number | boolean): Object | string | number | boolean;
    getItems(): Object[];
    hidePopup(): void;
    hideSpinner(): void;
    showPopup(): void;
    showSpinner(): void;
}
export declare const AutoCompletePlugin: {
    name: string;
    install(Vue: any): void;
};
