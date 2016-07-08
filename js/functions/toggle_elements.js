function toggle_elements(toggleElement, closedClasses, openClasses, target) {
    var arrLen = arguments.length
    if (arrLen < 4) {
        console.log(">> Error: 'ToggleElements' does not have enough parameters")
    }

    if (toggleElement.attr('class') == openClasses) {
        toggleElement.removeClass()
        toggleElement.addClass(closedClasses)

        for (var i = 3; i < arrLen; i++) {
            arguments[i].hide()
        }
        return false;
    } else if (toggleElement.attr('class') == closedClasses) {
        toggleElement.removeClass()
        toggleElement.addClass(openClasses)

        for (var i = 3; i < arrLen; i++) {
            arguments[i].show()
        }
    }
    return true;
}
