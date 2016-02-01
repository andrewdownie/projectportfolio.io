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

function getSelectedText() {
  t = (document.all) ? document.selection.createRange().text : document.getSelection();

  return t;
}



                                                                                /*
FUNCTION: ToggleElements (Andrew Downie, FEB01-2016, projectportfolio.io)
PARAMETERS:
    > toggleElement: The button that causes the visiblity toggle to occur.
                     This is the element where the icon should go to hold toggle state.
    > closedClasses: The classes that means the target html element is hidden.
    > openClasses: The classes that means the target html element is shown.
    > target: The html element that is to be shown / hidden based on the
              state of the currentIcon. Unlimited targets can be selected, but one is required.
DESCRIPTION: Toggles the visiblity of an html element.                          */
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
