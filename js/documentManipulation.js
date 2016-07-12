/*------------------------------------------------------------------------------
DOCUMENT NAME: documentManipulation.js
PROJECT: projectportfolio.io
AUTHOR                      DATE CREATED                    LAST MODIFIED
Andrew Downie               2016 FEB 01                     2016 FEB 02
--------------------------------------------------------------------------------
DESCRIPTION:
    This file contains a series of functions related to making it easier to work
    with html, and css.
------------------------------------------------------------------------------*/

//TODO: move these to functions
function getCssInt(pageElement, cssProperty) {
    var intValue = $(pageElement).css(cssProperty).replace(/[^-\d\.]/g, '');
    return parseInt(intValue);
}

function setCssInt(pageElement, cssProperty, intAmount) {
    $("body").css("padding-top", intAmount);
}

function modifyCssInt(pageElement, cssProperty, intAmount) {
    var curval = getCssInt(pageElement, cssProperty);
    $("body").css("padding-top", curval + intAmount);
}



/*------------------------------------------------------------------------------
FUNCTION: addClassToText
AUTHOR                      DATE CREATED                    LAST MODIFIED
Andrew Downie               2016 FEB 01                     2016 FEB 02
--------------------------------------------------------------------------------
DESCRIPTION:
    This function adds classes around the currently user selected text using
    spans.
PARAMETERS:
    -- classes: The class to add to the selected text.
RETURN: VOID
------------------------------------------------------------------------------*/
function addClassToText(classes) {

    var text = wrapText('span');
    if(text == null){
        return;
    }
    text.setAttribute("class", classes);



}

function linkText(href, id) {
    var text = wrapText('a');
    if(text == null){
        return;
    }
    text.setAttribute("href", href);
    text.setAttribute("id", id);
}

function wrapText(wrapperType) {
    var selection = getSelection();
    var selection_text = selection;

    if (selection_text == "") {
        return null;
    }

    var wrapper = document.createElement(wrapperType);
    wrapper.textContent = selection_text;

    var range = selection.getRangeAt(0);
    range.deleteContents();
    range.insertNode(wrapper);
    return wrapper;
}


/*------------------------------------------------------------------------------
FUNCTION NAME: getSelection()
SOURCE:
RETURN: the text currently selected by the user.
------------------------------------------------------------------------------*/
function getSelection() {
    t = (document.all) ? document.selection.createRange().text : document.getSelection();
    return t;
}




/*------------------------------------------------------------------------------
FUNCTION NAME: ToggleElements()
AUTHOR                      DATE CREATED                    LAST MODIFIED
Andrew Downie               2016 FEB 01                     2016 FEB 01
--------------------------------------------------------------------------------
PARAMETERS:
    -- toggleElement: The element that causes the visiblity toggle to occur.
        This is the element where the icon should go to hold toggle state.
    -- closedClasses: The classes that means the target html element is hidden.
    -- openClasses: The classes that means the target html element is shown.
    -- target: The html element that is to be shown / hidden based on the
        state of the currentIcon. Unlimited targets can be selected, but one is
        required.
RETURN: BOOLEAN:
            true: if the targets are visible
            false: if the targets are hidden
------------------------------------------------------------------------------*/
/*function ToggleElements(toggleElement, closedClasses, openClasses, target) {
    var arrLen = arguments.length;
    if (arrLen < 4) {
        console.log(">> Error: 'ToggleElements' does not have enough parameters");
    }

    if (toggleElement.attr('class') == openClasses) {
        toggleElement.removeClass();
        toggleElement.addClass(closedClasses);

        for (var i = 3; i < arrLen; i++) {
            arguments[i].hide();
        }
        return false;
    } else if (toggleElement.attr('class') == closedClasses) {
        toggleElement.removeClass();
        toggleElement.addClass(openClasses);

        for (var i = 3; i < arrLen; i++) {
            arguments[i].show();
        }
    }
    return true;
}*/

function ShowElements(toggleElement, openClasses, target){
    var arrLen = arguments.length;
    if (arrLen < 3) {
        console.log(">> Error: 'ShowElements' does not have enough parameters");
    }
    toggleElement.removeClass();
    toggleElement.addClass(openClasses);

    for (var i = 2; i < arrLen; i++) {
        arguments[i].show();
    }
}


/*TODO: create header description*/
function IsEditableParagraph(target){
    //Check if the selected element is an editable paragraph
    if(target.is("p[contenteditable=true]")){
        return true;

    }//check if any child element is an editable paragraph
    else if(target.parents("p[contenteditable=true]").length){
        return true;
    }
    return false;
}

/*TODO: create header description*/
function GetNearestEditable(focusElement){
    if(focusElement == null){
        return 0;
    }

    if(focusElement.is("[contenteditable=true]")){
        return focusElement;
    }

    return focusElement.parents("[contenteditable=true]");
}

//returns true if a parent of the parameter 'target' is one of the side panel pads (addpad, stylepad or blogpad)
function IsInPad(target){
    if(target.is("#addpad") || target.is("#stylepad") || target.is("#blogpad")){
        return true;
    }
    else if(target.parents("#addpad").length > 0 || target.parents("#stylepad").length > 0 || target.parents("#blogpad").length > 0){
        return true;
    }

    return false;
}
