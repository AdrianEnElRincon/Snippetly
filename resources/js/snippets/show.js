import hljs from "highlight.js";

hljs.highlightAll()

$('#make-comment').on('click', function(ev) {

    ev.preventDefault()

    console.log(ev)

})