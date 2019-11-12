import { EmitType } from '@syncfusion/ej2-base';
import { INotifyPropertyChanged } from '@syncfusion/ej2-base';
import { Component, KeyboardEventArgs } from '@syncfusion/ej2-base';
import { Button } from '@syncfusion/ej2-buttons';
import { Popup } from '@syncfusion/ej2-popups';
import { MenuEventArgs, BeforeOpenCloseMenuEventArgs, OpenCloseMenuEventArgs } from './../common/common';
import { SplitButtonIconPosition } from './../common/common';
import { ItemModel } from './../common/common-model';
import { DropDownButtonModel } from './drop-down-button-model';
/**
 * DropDownButton component is used to toggle contextual overlays for displaying list of action items.
 * It can contain both text and images.
 * ```html
 * <button id="element">DropDownButton</button>
 * ```
 * ```typescript
 * <script>
 * var dropDownButtonObj = new DropDownButton({items: [{ text: 'Action1' }, { text: 'Action2' },{ text: 'Action3' }]);
 * dropDownButtonObj.appendTo("#element");
 * </script>
 * ```
 */
export declare class DropDownButton extends Component<HTMLButtonElement> implements INotifyPropertyChanged {
    protected dropDown: Popup;
    protected button: Button;
    protected activeElem: HTMLElement[];
    private rippleFn;
    private delegateMousedownHandler;
    /**
     * Defines the content of the DropDownButton element that can either be a text or HTML elements.

     */
    content: string;
    /**
     * Defines class/multiple classes separated by a space in the DropDownButton element. The
     * DropDownButton size and styles can be customized by using this.

     */
    cssClass: string;
    /**
     * Specifies a value that indicates whether the DropDownButton is `disabled` or not.

     */
    disabled: boolean;
    /**
     * Defines class/multiple classes separated by a space for the DropDownButton that is used to
     * include an icon. DropDownButton can also include font icon and sprite image.

     */
    iconCss: string;
    /**
     * Positions the icon before/top of the text content in the DropDownButton. The possible values are:
     * * Left: The icon will be positioned to the left of the text content.
     * * Top: The icon will be positioned to the top of the text content.

     */
    iconPosition: SplitButtonIconPosition;
    /**
     * Specifies action items with its properties which will be rendered as DropDownButton popup.

     */
    items: ItemModel[];
    /**
     * Allows to specify the DropDownButton popup item element.

     */
    target: string | Element;
    /**
     * Triggers while rendering each Popup item of DropDownButton.
     * @event

     */
    beforeItemRender: EmitType<MenuEventArgs>;
    /**
     * Triggers before opening the DropDownButton popup.
     * @event

     */
    beforeOpen: EmitType<BeforeOpenCloseMenuEventArgs>;
    /**
     * Triggers before closing the DropDownButton popup.
     * @event

     */
    beforeClose: EmitType<BeforeOpenCloseMenuEventArgs>;
    /**
     * Triggers while closing the DropDownButton popup.
     * @event

     */
    close: EmitType<OpenCloseMenuEventArgs>;
    /**
     * Triggers while opening the DropDownButton popup.
     * @event

     */
    open: EmitType<OpenCloseMenuEventArgs>;
    /**
     * Triggers while selecting action item in DropDownButton popup.
     * @event

     */
    select: EmitType<MenuEventArgs>;
    /**
     * Triggers once the component rendering is completed.
     * @event

     */
    created: EmitType<Event>;
    /**
     * Constructor for creating the widget
     * @param  {DropDownButtonModel} options?
     * @param  {string|HTMLButtonElement} element?
     */
    constructor(options?: DropDownButtonModel, element?: string | HTMLButtonElement);
    protected preRender(): void;
    /**
     * Get the properties to be maintained in the persisted state.
     * @returns string
     */
    getPersistData(): string;
    /**
     * To open/close DropDownButton popup based on current state of the DropDownButton.
     * @returns void
     */
    toggle(): void;
    /**
     * Initialize the Component rendering
     * @returns void
     * @private
     */
    render(): void;
    private createPopup;
    private getTargetElement;
    private createItems;
    private hasIcon;
    private createAnchor;
    private initialize;
    private appendArrowSpan;
    protected setActiveElem(elem: HTMLElement[]): void;
    /**
     * Get component name.
     * @returns string
     * @private
     */
    getModuleName(): string;
    private canOpen;
    /**
     * Destroys the widget.
     * @returns void
     */
    destroy(): void;
    protected getPopUpElement(): HTMLElement;
    protected getULElement(): HTMLElement;
    protected wireEvents(): void;
    protected keyBoardHandler(e: KeyboardEventArgs): void;
    protected upDownKeyHandler(e: KeyboardEventArgs): void;
    private removeCustomSelection;
    private isValidLI;
    private keyEventHandler;
    private getLI;
    private mousedownHandler;
    protected clickHandler(e: MouseEvent | KeyboardEventArgs): void;
    private openPopUp;
    private closePopup;
    protected unWireEvents(): void;
    /**
     * Called internally if any of the property value changed.
     * @param  {DropDownButtonModel} newProp
     * @param  {DropDownButtonModel} oldProp
     * @returns void
     * @private
     */
    onPropertyChanged(newProp: DropDownButtonModel, oldProp: DropDownButtonModel): void;
    /**
     * Sets the focus to DropDownButton
     * its native method
     * @public
     */
    focusIn(): void;
}
