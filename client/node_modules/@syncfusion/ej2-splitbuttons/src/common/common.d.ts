import { ChildProperty, BaseEventArgs } from '@syncfusion/ej2-base';
import { ItemModel } from './common-model';
export declare type SplitButtonIconPosition = 'Left' | 'Top';
/**
 * @param props
 * @param model
 */
export declare function getModel(props: Object, model: string[]): Object;
export declare class Item extends ChildProperty<Item> {
    /**
     * Defines class/multiple classes separated by a space for the item that is used to include an icon.
     * Action item can include font icon and sprite image.

     */
    iconCss: string;
    /**
     * Specifies the id for item.

     */
    id: string;
    /**
     * Specifies separator between the items. Separator are horizontal lines used to group action items.

     */
    separator: boolean;
    /**
     * Specifies text for item.

     */
    text: string;
    /**
     * Specifies url for item that creates the anchor link to navigate to the url provided.

     */
    url: string;
}
/**
 * Interface for before item render / select event.
 */
export interface MenuEventArgs extends BaseEventArgs {
    element: HTMLElement;
    item: ItemModel;
}
/**
 * Interface for before open / close event.
 */
export interface BeforeOpenCloseMenuEventArgs extends BaseEventArgs {
    element: HTMLElement;
    items: ItemModel[];
    event: Event;
    cancel?: boolean;
}
/**
 * Interface for open/close event.
 */
export interface OpenCloseMenuEventArgs extends BaseEventArgs {
    element: HTMLElement;
    items: ItemModel[];
    parentItem?: ItemModel;
}
