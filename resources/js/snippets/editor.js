import hljs from 'highlight.js'


const render = $('#render')

const languageSelect = $('#language-select')

languageSelect.on('change', function(ev) {
    render.get(0).classList = `hljs language-${languageSelect.val().toLocaleLowerCase()}`
    hljs.highlightAll()
})

const editor = $('#editor')

const renderStyles = getComputedStyle(render.get(0))

editor.css('font', renderStyles.font)

render.css('height', 720)

editor.css('height', 720)

editor.css('padding', render.css('padding'))

editor.css('width', render.css('width'))

document.addEventListener('DOMContentLoaded', () => {
    render.text(editor.val())
    hljs.highlightAll()
})

editor.on('input', function (ev) {
    render.text(this.value)
    hljs.highlightAll()
})

editor.get(0).addEventListener('focusin', function (ev) {
    editor.get(0).addEventListener('keydown', handleKeyboardControls)
})

editor.get(0).addEventListener('focusout', function (ev) {
    editor.get(0).removeEventListener('keydown', handleKeyboardControls)
})

function handleKeyboardControls(/** @type {KeyboardEvent} */ event) {

    const tab = '    '

    switch (event.key) {
        case 'Escape':
            document.activeElement.blur()
            break
        case 'Tab':
            event.preventDefault()
            insertAtCursor(event.target, tab)
            hljs.highlightAll()
            break
    }

}

function insertAtCursor(myField, myValue) {
    //IE support
    if (document.selection) {
        myField.focus();
        sel = document.selection.createRange();
        sel.text = myValue;
    }
    //MOZILLA and others
    else if (myField.selectionStart || myField.selectionStart == '0') {
        var startPos = myField.selectionStart;
        var endPos = myField.selectionEnd;
        myField.value = myField.value.substring(0, startPos)
            + myValue
            + myField.value.substring(endPos, myField.value.length);
    } else {
        myField.value += myValue;
    }
}