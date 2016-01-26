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
