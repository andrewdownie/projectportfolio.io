/*------------------------------------------------------------------------------
DOCUMENT NAME: documentManipulation.js
PROJECT: projectportfolio.io
AUTHOR                      DATE CREATED                    LAST MODIFIED
Andrew Downie               2016 FEB 01                     2016 FEB 02
--------------------------------------------------------------------------------
DESCRIPTION:
    This file contains a series of functions related to making it easier to work
    with html, and css.
FUNCTION LIST:
    -- modifyCssInt
    -- setCssInt
    -- getCssInt
    -- addClassToText
    -- getSelectedText
    -- ToggleElements
------------------------------------------------------------------------------*/


function getCssInt(pageElement, cssProperty){
    var intValue = $(pageElement).css(cssProperty).replace(/[^-\d\.]/g, '')
    return parseInt(intValue)
}

function setCssInt(pageElement, cssProperty, intAmount){
    $("body").css("padding-top", intAmount)
}

function modifyCssInt(pageElement, cssProperty, intAmount){
    var curval = getCssInt(pageElement, cssProperty)
    $("body").css("padding-top", curval + intAmount)
}



/*------------------------------------------------------------------------------
FUNCTION NAME: addClassToText
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
function addClassToText(classes){
    var selection = getSelectedText()
    var selection_text = selection.toString()

    if(selection_text == ""){ return; }

    var span = document.createElement('SPAN')
    span.textContent = selection_text
    span.classList.add(classes)

    var range = selection.getRangeAt(0)
    range.deleteContents()
    range.insertNode(span)
}



/*------------------------------------------------------------------------------
FUNCTION NAME: getSelectedText
SOURCE:
RETURN: the text currently selected by the user.
------------------------------------------------------------------------------*/
function getSelectedText() {
  t = (document.all) ? document.selection.createRange().text : document.getSelection();
  return t;
}



/*------------------------------------------------------------------------------
FUNCTION NAME: ToggleElements
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
RETURN: VOID
------------------------------------------------------------------------------*/
function ToggleElements(toggleElement, closedClasses, openClasses, target){
    var arrLen = arguments.length
    if(arrLen < 4){
        console.log(">> Error: 'ToggleElements' does not have enough parameters")
    }

    if(toggleElement.attr('class') == openClasses){
        toggleElement.removeClass()
        toggleElement.addClass(closedClasses)

        for(var i = 3; i < arrLen; i++){
            arguments[i].hide()
        }

    }
    else if(toggleElement.attr('class') == closedClasses){
        toggleElement.removeClass()
        toggleElement.addClass(openClasses)

        for(var i = 3; i < arrLen; i++){
            arguments[i].show()
        }

    }
}
