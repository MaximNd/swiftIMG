class swiftImg {
    constructor(img) {
        this.img = img;
        this.paramsArr = [];
    }

    rotate(degree = 90) {
        let obj = {
            "method" : "rotate",
            "params" : {
                "degree" : degree
            }
        }
        this.paramsArr.push(obj);
    }

    crop(width = null, height = null, startX = null, startY = null,  isProp = false) {
        let obj = {
            "method" : "rotate",
            "params" : {
                "width" : width,
                "height" : height,
                "startX" : startX,
                "startY" : startY,
                "isProp" : isProp
            }
        }
        this.paramsArr.push(obj);
    }

    frame(type = 'type-1') {
        let obj = {
            "method" : "frame",
            "params" : {
                "type" : type
            }
        }
        this.paramsArr.push(obj);
    }

    insert(image, position = 'top-left', offsetX = 0, offsetY = 0) {
        let obj = {
            "method" : "insert",
            "params" : {
                "image" : image,
                "position" : position,
                "offsetX" : offsetX,
                "offsetY" : offsetY
            }
        }
        this.paramsArr.push(obj);
    }

    insertMerge(image, opacityValue = 100, position = 'top-left', offsetX = 0, offsetY = 0) {
        let obj = {
            "method" : "insertMerge",
            "params" : {
                "image" : image,
                "opacityValue" : opacityValue,
                "position" : position,
                "offsetX" : offsetX,
                "offsetY" : offsetY
            }
        }
        this.paramsArr.push(obj);
    }

    insertGrayscale(image, position = 'top-left', offsetX = 0, offsetY = 0) {
        let obj = {
            "method" : "insertGrayscale",
            "params" : {
                "image" : image,
                "position" : position,
                "offsetX" : offsetX,
                "offsetY" : offsetY
            }
        }
        this.paramsArr.push(obj);
    }

    // insertResize(img, array size, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {

    // }

    // insertCrop(img, array $values, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {

    // }

    text(text, startX = 0, startY = 0) {
        let obj = {
            "method" : "text",
            "params" : {
                "text" : text,
                "startX" : startX,
                "startY" : startY
            }
        }
        this.paramsArr.push(obj);
    }

    pixelate(size = 1)  {
        let obj = {
            "method" : "pixelate",
            "params" : {
                "size" : size
            }
        }
        this.paramsArr.push(obj);
    }

    gamma(value = 2) {
        let obj = {
            "method" : "gamma",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);
    }

    bright(value = 15)  {
        let obj = {
            "method" : "bright",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);
    }

    contrast(value = 20) {
        let obj = {
            "method" : "bright",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);
    }

    colorize(red = 10, green = 10, blue = 10) {
        let obj = {
            "method" : "bright",
            "params" : {
                "red" : red,
                "green" : green,
                "blue" : blue
            }
        }
        this.paramsArr.push(obj);
    }

    makeGrayscale() {
        let obj = {
            "method" : "bright",
            "params" : null
        }
        this.paramsArr.push(obj);
    }

    invert(filter) {
        let obj = {
            "method" : "invert",
            "params" : {
                "filter" : filter
            }
        }
        this.paramsArr.push(obj);
    }

    mirror(value = 'h') {
        let obj = {
            "method" : "mirror",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);
    }

    opacity(value = 60) {
        let obj = {
            "method" : "opacity",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);
    }

    // makeGIF(imgArr, param1, param2) {

    // }

    resize(width, heigh = null) {
        let obj = {
            "method" : "resize",
            "params" : {
                "width" : width,
                "heigh" : heigh
            }
        }
        this.paramsArr.push(obj);
    }

    // borders(type = 'color', format = 'jpg', quality = 90, sigma = 1, sobelK = 1, low = 50, high = 150, size = 2) {

    // }

    histogramEqualization(type = 'grayscale') {
        let obj = {
            "method" : "histogramEqualization",
            "params" : {
                "type" : type
            }
        }
        this.paramsArr.push(obj);
    }

    histogramGraph(type = 'grayscale', format = 'jpg', quality = 90, coef = 35) {
        let obj = {
            "method" : "histogramGraph",
            "params" : {
                "type" : type,
                "format" : format,
                "quality" : quality,
                "coef" : coef
            }
        }
        this.paramsArr.push(obj);
    }

    blur(value = 1) {
        let obj = {
            "method" : "blur",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);
    }

    // filters(filters) {

    // }

    sharpen(value = 10) {
        let obj = {
            "method" : "sharpen",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);
    }

    outPut() {
        $.ajax({
            url: '/public/php/port.php',
            type: 'POST',
            data: {"paramsArr" : this.paramsArr},
            success: function(data) {
                //return image
                //this.img= data.img
            }
        });
    }

    save() {

    }
}