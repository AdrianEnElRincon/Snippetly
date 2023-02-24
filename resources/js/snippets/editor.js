import hljs from 'highlight.js'


const render = $('#render')

const languageSelect = $('#language-select')

languageSelect.on('change', function(ev) {
    let model = monaco_editor.getModel()
    monaco.editor.setModelLanguage(model, languageSelect.val().toLowerCase())
})

import * as monaco from 'monaco-editor'

self.MonacoEnvironment = {
    getWorker: function (workerId, label) {
        const getWorkerModule = (moduleUrl, label) => {
            return new Worker(self.MonacoEnvironment.getWorkerUrl(moduleUrl), {
                name: label,
                type: 'module'
            });
        };

        switch (label) {
            case 'json':
                return getWorkerModule('/monaco/esm/vs/language/json/json.worker.js', label);
            case 'css':
            case 'scss':
            case 'less':
                return getWorkerModule('/monaco/esm/vs/language/css/css.worker.js', label);
            case 'html':
            case 'handlebars':
            case 'razor':
                return getWorkerModule('/monaco/esm/vs/language/html/html.worker.js', label);
            case 'typescript':
            case 'javascript':
                return getWorkerModule('/monaco/esm/vs/language/typescript/ts.worker.js', label);
            default:
                return getWorkerModule('/monaco/esm/vs/editor/editor.worker.js', label);
        }
    },
    getWorkerUrl: function (moduleUrl) {
        return 'http://127.0.0.1:8000' + moduleUrl;
    }
};

var monaco_editor = monaco.editor.create(document.getElementById('editor'), {
    value: $('#editor').data('old-content'),
    language: languageSelect.val().toLowerCase(),
    theme: 'vs-dark',
    lineNumbers: 'off',
    scrollBeyondLastLine: false
})

monaco_editor.onDidChangeModelContent(e => {
    $('input[name=content]').val(monaco_editor.getModel().getLinesContent().join('\n'))
})