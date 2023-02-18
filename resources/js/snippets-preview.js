$('[data-bs-target="#expand-snippet-modal"]').on('click', function (ev) {

    var card = $($(this).parents('.card'))

    var title = card.find('[data-role="title"]').text()
    var body = card.find('.card-body').html()

    var modal = $('#expand-snippet-modal')

    modal.find('.modal-title').text(title)
    modal.find('.modal-body').html(body)

})