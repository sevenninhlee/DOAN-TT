/**
 * Vue Component Base
 */
import Vue from 'vue';
export declare class ComponentBase extends Vue {
    protected ej2Instances: any;
    protected tagMapper: any;
    protected tagNameMapper: any;
    protected hasInjectedModules: boolean;
    protected hasChildDirective: boolean;
    protected childDirObjects: string;
    protected propKeys: any;
    created(): void;
    mounted(): void;
    getInjectedServices(): Object[];
    updated(): void;
    beforeDestroy(): void;
    bindProperties(): void;
    assignValueToWrapper(option: Object, silent?: boolean): void;
    fetchChildPropValues(childOption: Object): void;
    getDirectiveValues(tagDirectives: any, tagMapper: {
        [key: string]: Object;
    }, tagNameMapper: Object): Object;
    getMultiLevelDirValue(tagDirectories: any, tagKey: string | Object, tagNameMapper: Object): Object;
    getVNodeValue(tagDirective: any, tagKey: string | Object, tagNameMapper: Object): Object;
    /**
     * convert kebab case directive props to camel case
     */
    getCamelCaseProps(props: Object): Object;
    dataBind(): void;
    setProperties(arg: Object, muteOnChange?: boolean): void;
}
