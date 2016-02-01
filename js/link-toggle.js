
                                                                                /*
FUNCTION: LinkToggle (Andrew Downie, FEB01-2016, projectportfolio.io)
PARAMETERS:
    > toggleElement: The button that causes the visiblity toggle to occur.
                     This is the element where the icon should go to hold toggle state.
    > closedClasses: The classes that means the target html element is hidden.
    > openClasses: The classes that means the target html element is shown.
    > target: The html element that is to be shown / hidden based on the
              state of the currentIcon.
DESCRIPTION: Toggles the visiblity of an html element.                          */
function LinkToggle(toggleElement, closedClasses, openClasses, target){
    if(toggleElement.attr('class') == openClasses){
        toggleElement.removeClass()
        toggleElement.addClass('closedClasses')
        target.hide();
    }
    else if(toggleElement.attr('class') == closedClasses){
        toggleElement.removeClass()
        toggleElement.addClass('closedClasses')
        target.show();
    }
}
