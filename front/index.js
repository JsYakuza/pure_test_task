$('.square').mouseover(function () {
    let x = Math.random() * $(window).innerHeight()
    let y = Math.random() * $(window).innerWidth()
    $('.square').css({
        top: x,
        left: y,
        position: 'absolute'
    })
    const isBottom = $(window).innerHeight() / 2 < x
    const isRight = $(window).innerWidth() / 2 < y
    if (isBottom && isRight) {
        $('.square').css({
            'background-color': '#000'
        })
    }
    if (isBottom && !isRight) {
        $('.square').css({
            'background-color': '#f00'
        })
    }
    if (!isBottom && isRight) {
        $('.square').css({
            'background-color': '#0f0'
        })
    }
    if (!isBottom && !isRight) {
        $('.square').css({
            'background-color': '#00f'
        })
    }
})
