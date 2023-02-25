import hljs from 'highlight.js'

const render = $('#render')

const languageSelect = $('#language-select')

languageSelect.on('change', function(ev) {
    let model = monaco_editor.getModel()
    monaco.editor.setModelLanguage(model, languageSelect.val().toLowerCase())
})

import * as monaco from 'monaco-editor'

import 'monaco-editor/min/vs/editor/editor.main.css'

import editorWorker from 'monaco-editor/esm/vs/editor/editor.worker?worker'
import jsonWorker from 'monaco-editor/esm/vs/language/json/json.worker?worker'
import cssWorker from 'monaco-editor/esm/vs/language/css/css.worker?worker'
import htmlWorker from 'monaco-editor/esm/vs/language/html/html.worker?worker'
import tsWorker from 'monaco-editor/esm/vs/language/typescript/ts.worker?worker'

self.MonacoEnvironment = {
    getWorker(_, label) {
        if (label === 'json') {
            return new jsonWorker()
        }
        if (label === 'css' || label === 'scss' || label === 'less') {
            return new cssWorker()
        }
        if (label === 'html' || label === 'handlebars' || label === 'razor') {
            return new htmlWorker()
        }
        if (label === 'typescript' || label === 'javascript') {
            return new tsWorker()
        }
        return new editorWorker()
    }
}

var monaco_editor = monaco.editor.create(document.getElementById('editor'), {
    value: $('#editor').data('old-content'),
    language: languageSelect.val() ? languageSelect.val().toLowerCase() : 'plaintext',
    theme: 'vs-dark',
    lineNumbers: 'off',
    scrollBeyondLastLine: false
})

monaco_editor.onDidChangeModelContent(e => {
    $('input[name=content]').val(monaco_editor.getModel().getLinesContent().join('\n'))
})