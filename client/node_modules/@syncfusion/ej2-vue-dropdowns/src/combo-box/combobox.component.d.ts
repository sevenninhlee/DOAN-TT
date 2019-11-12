import { ComponentBase } from '@syncfusion/ej2-vue-base';
export declare const properties: string[];
export declare const modelProps: string[];
/**
 * ComboBox component allows the user to type a value or choose an option from the list of predefined options available
 * ```html
 * <ejs-combobox :dataSource='data'></ejs-combobox>
 * ```
 */
export declare class ComboBoxComponent extends ComponentBase {
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
export declare const ComboBoxPlugin: {
    name: string;
    install(Vue: any): void;
};
