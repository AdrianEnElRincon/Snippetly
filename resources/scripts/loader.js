export function clearLoadingScreen() {
    var loader = $('.loader')

    loader.find('svg').css('opacity', 0)

    loader.css('opacity', 0)

    loader.find('style').remove()

    loader.on('transitionend', () => loader.remove())
}