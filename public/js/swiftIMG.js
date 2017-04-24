class swiftImg {



    constructor(key, img, type = "jpg", quality = 90) {
        this.img = img;
        this.key = key;
        this.type = type;
        this.quality = quality;
        this.paramsArr = [];
        this.imgParams = {"img" : this.img, "key" : this.key, "type" : this.type, "quality" : this.quality};
    }

    rotate(degree = 90) {
        let obj = {
            "method" : "rotate",
            "params" : {
                "degree" : degree
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    crop(width = null, height = null, startX = null, startY = null,  isProp = false) {
        let obj
        if(width == null) {
            obj = {
            "method" : "crop",
            "params" : ""
            }
        } else {
            obj = {
            "method" : "crop",
            "params" : {
                "width" : width,
                "height" : height,
                "startX" : startX,
                "startY" : startY,
                "isProp" : isProp
                }
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    frame(type = 'type-1') {
        let obj = {
            "method" : "frame",
            "params" : {
                "type" : type
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    insert(image, position = 'top-left', offsetX = 0, offsetY = 0) {
        let obj = {
            "method" : "insert",
            "params" : {
                "image" : image,
                "position" : position,
                "offsetX" : offsetX,
                "offsetY" : offsetY
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    insertMerge(image, opacityValue = 100, position = 'top-left', offsetX = 0, offsetY = 0) {
        let obj = {
            "method" : "insertMerge",
            "params" : {
                "image" : image,
                "opacityValue" : opacityValue,
                "position" : position,
                "offsetX" : offsetX,
                "offsetY" : offsetY
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    insertGrayscale(image, position = 'top-left', offsetX = 0, offsetY = 0) {
        let obj = {
            "method" : "insertGrayscale",
            "params" : {
                "image" : image,
                "position" : position,
                "offsetX" : offsetX,
                "offsetY" : offsetY
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    insertResize(image, sizeArr, position = 'top-left', offsetX = 0, offsetY = 0) {
         let obj = {
            "method" : "insertResize",
            "params" : {
                "image" : image,
                "sizeArr" : sizeArr,
                "position" : position,
                "offsetX" : offsetX,
                "offsetY" : offsetY
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    insertCrop(image, valuesArr, position = 'top-left', offsetX = 0, offsetY = 0) {
        let obj = {
            "method" : "insertCrop",
            "params" : {
                "image" : image,
                "valuesArr" : valuesArr,
                "position" : position,
                "offsetX" : offsetX,
                "offsetY" : offsetY
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    pixelate(size = 1)  {
        let obj = {
            "method" : "pixelate",
            "params" : {
                "size" : size
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    gamma(value = 2) {
        let obj = {
            "method" : "gamma",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    bright(value = 15)  {
        let obj = {
            "method" : "bright",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    contrast(value = 20) {
        let obj = {
            "method" : "contrast",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    colorize(red = 10, green = 10, blue = 10) {
        let obj = {
            "method" : "colorize",
            "params" : {
                "red" : red,
                "green" : green,
                "blue" : blue
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    makeGrayscale() {
        let obj = {
            "method" : "makeGrayscale",
            "params" : null
        }
        this.paramsArr.push(obj);

        return this;
    }

    invert() {
        let obj = {
            "method" : "invert",
            "params" : ""
        }
        this.paramsArr.push(obj);

        return this;
    }

    mirror(value = 'h') {
        let obj = {
            "method" : "mirror",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    opacity(value = 60) {
        let obj = {
            "method" : "opacity",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    resize(width, heigh = null) {
        let obj = {
            "method" : "resize",
            "params" : {
                "width" : width,
                "heigh" : heigh
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    // borders(type = 'color', format = 'jpg', quality = 90, sigma = 1, sobelK = 1, low = 50, high = 150, size = 2) {

    // }

    histogramEqualization(type = 'grayscale') {
        let obj = {
            "method" : "histogramEqualization",
            "params" : {
                "type" : type
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    histogramGraph(type = 'grayscale', format = 'jpg', quality = 90, coef = 35) {
        let obj = {
            "method" : "histogramGraph",
            "params" : {
                "type" : type,
                "format" : format,
                "quality" : quality,
                "coef" : coef
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    CannyBorder(type = 'color', format = 'jpg', quality = 90, sigma = 1, sobelK = 1, low = 50, high = 150, size = 2) {
        let obj = {
            "method" : "CannyBorder",
            "params" : {
                "type" : type,
                "format" : format,
                "quality" : quality,
                "sigma" : sigma,
                "sobelK" : sobelK,
                "low" : low,
                "high" : high,
                "size" : size
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    SobelBorder(type = 'color', k = 1, format = 'jpg', quality = 90) {
        let obj = {
            "method" : "SobelBorder",
            "params" : {
                "type" : type,
                "k" : k,
                "format" : format,
                "quality" : quality
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    regionGrowing(T = 10, type = 'color') {
        let obj = {
            "method" : "regionGrowing",
            "params" : {
                "T" : T,
                "type" : type
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    blur(value = 1) {
        let obj = {
            "method" : "blur",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    // filters(filters) {

    // }

    sharpen(value = 10) {
        let obj = {
            "method" : "sharpen",
            "params" : {
                "value" : value
            }
        }
        this.paramsArr.push(obj);

        return this;
    }

    sendRequest(callbackSuccess, callbackBeforeSend) {
        $.ajax({
            url: 'app/API.php',
            type: 'POST',
            data: {"paramsArr" : this.paramsArr, "imgParams" : this.imgParams},
            beforeSend: callbackBeforeSend,
            success: callbackSuccess
        });
    }

    outPut(callbackSuccess, callbackBeforeSend) {
        let obj = {
            "method" : "outPut",
            "params" : null
        }

        this.paramsArr.push(obj);
        
        this.sendRequest(callbackSuccess, callbackBeforeSend);
    }

    save(callbackSuccess, callbackBeforeSend, path = null) {
        let hostName = location.protocol + "//" + location.hostname;
        let obj = {
            "method" : "save",
            "params" : {
                "hostName" : hostName,
                "path" : path
            }
        }

        this.paramsArr.push(obj);
        
        this.sendRequest(callbackSuccess, callbackBeforeSend);
    }
}