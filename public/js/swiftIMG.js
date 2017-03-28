class swiftImg {
    constructor(img) {
        this.img = img;
    }

    rotate(degree = 90) {
        this.sendToPort("rotate", degree);
    }

    crop(width = null, height = null, startX = null, startY = null,  isProp = false) {
        this.sendToPort("rotate", width, height, startX, startY, isProp);
    }

    frame(color, width, isRounded = false) {

    }

    insert(image, position, offset, offsetY) {

    }

    insertMerge(image, opacityValue, pos = 'top-left', offsetX = 0, offsetY = 0) {

    }

    insertGrayscale(image, pos = 'top-left', $offsetX = 0, $offsetY = 0) {

    }

    // insertResize(img, array size, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {

    // }

    // insertCrop(img, array $values, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {

    // }

    text(text, startX = 0, startY = 0) {

    }

    pixelate(size = 1) {

    }

    gamma(value = 40) {

    }

    bright(value = 40) {

    }

    contrast(value = 50) {

    }

    colorize(red = 40, green = 40, blue = 40) {

    }

    makeGrayscale() {

    }

    invert(filter) {

    }

    mirror(value = 'h') {

    }

    //Оптимизация. Тоже самое что и шестой пункт.

    opacity(value = 60) {

    }

    makeGIF(imgArr, param1, param2) {

    }

    resize(width, heigh = null) {

    }

    borders(type = 'color', format = 'jpg', quality = 90, sigma = 1, sobelK = 1, low = 50, high = 150, size = 2) {

    }

    histogramEqualization(type = 'grayscale') {

    }

    histogramGraph(type = 'grayscale', format = 'jpg', quality = 90, coef = 35) {

    }

    blur(value = 1) {

    }

    filters(filters) {

    }

    sharpen(value = 10) {

    }

    outPut() {

    }

    save() {

    }

    sendToPort(method, ...params) {
        $.ajax({
            url: '/public/php/port.php',
            type: 'POST',
            data: {method, params : JSON.stringify(params)},
            success: function(data) {
                //return image
                //this.img= data.img
            }
        })
    }
}