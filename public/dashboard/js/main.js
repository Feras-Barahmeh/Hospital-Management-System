/**
 * Start Show Panel Form Login
 * */
let panelForms = document.querySelectorAll('[panel-form]');

let  selectRankInput = document.querySelector('[select-rank]');
function hideAllPanelForms() {
    panelForms.forEach(form => {
        form.classList.add("d-none");
    });
}
function setSelectedValueFromLocalStorage(selectInput) {
    selectInput.querySelectorAll("option").forEach(option => {
        if (option.value === localStorage.getItem("last-login-opened")) {
            option.selected = true;
        }
    });
}
function showForm(form) {
    form.classList.remove('d-none');
}

if (selectRankInput) {
    selectRankInput.addEventListener("change", (e) => {
        hideAllPanelForms();
        let targetForm = document.getElementById(selectRankInput.value);
        if (targetForm) {
            localStorage.setItem("last-login-opened", selectRankInput.value);
            showForm(targetForm);
        }
    });
// Show last form opened
    hideAllPanelForms();
    showForm(document.getElementById(localStorage.getItem("last-login-opened")));
    setSelectedValueFromLocalStorage(selectRankInput);
}



/**
 * End Show Panel Form Login
 * */


/**
 * Show password in input
 */
function showPasswordSpan(content) {
    let span = document.createElement('span');
    span.classList.add('show-password-hint');
    span.textContent = content;
    return span;
}
let showPasswordInputs = document.querySelectorAll('[show-password]')
showPasswordInputs.forEach(input => {
    let content = input.getAttribute("show-password");
    let hintSpan = showPasswordSpan(content);
    hintSpan.addEventListener("click", () => {
        if (input.type === 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    });
    input.parentElement.style.position = 'relative';
    input.parentElement.appendChild(hintSpan);

});

/**
 * Show image when upload
 */
let liveImageInputs = document.querySelectorAll('[live-image]');

liveImageInputs.forEach(input => {
    input.addEventListener("change", (e) => {
        let outputContainer = input.parentElement.querySelector('[live-img-output]');
        outputContainer.classList.remove('d-none')
        outputContainer.src = URL.createObjectURL(e.target.files[0]);
        outputContainer.onload = function () {
            URL.revokeObjectURL(outputContainer.src)
        }
    });
});
//click , drag, scroll to edit positions in the canvas
$().ready(function () {
    //janky implementation
    setTimeout(function(){
        $('#myPhotos').trigger('click');
    }, 10);

    function readURL(canvas) {
        if (canvas.files && canvas.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#selectedImage').attr('src', e.target.result)

                var linkedImage3 = new Image;

                linkedImage3.src = e.target.result

                linkedImage3.onload = function () {
                    var canvas = $('#selectedImage')[0];
                    var linkedImageNumber = linkedImage3;

                    mediaQuery(canvas, linkedImageNumber);
                };
            }
            reader.readAsDataURL(canvas.files[0]);
        }
    }

    $("#myPhotos").change(function () {
        console.log(this)
        readURL(this);
    });

    var linkedImage1 = new Image;

    $('#myPhotos').on('click', function () {

        linkedImage1.src = $('#recordImage').attr('src');
        linkedImage1.onload = function () {

            var img_ID = ("imagepreviewform");
            replace_Child(img_ID);

            var img_ID = ("selectedImage");
            replace_Child(img_ID);

            var canvas = $('#imagepreviewform')[0];
            var linkedImageNumber = linkedImage1;
            mediaQuery(canvas, linkedImageNumber);
        };

    });

    var media_query = window.matchMedia("(min-width:1601px)")

    function mediaQuery(canvas, linkedImageNumber) {

        if (media_query.matches) {
            canvas.width = 500;
            canvas.height = 500;
        } else {
            canvas.width = 350;
            canvas.height = 350;
        }
        return setupCanvasZoom(canvas, linkedImageNumber, canvas.width, canvas.height, ".zoomBtnOut", ".zoomBtnIn", ".fitBtn")
    }

    function replace_Child(img_ID) {
        var old_element = document.getElementById(img_ID);
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element);
    }

    function setupCanvasZoom (canvas, gkhead, canvasWidth, canvasHeight, zoomBtnOut, zoomBtnIn, fitBtn) {

        var check = true;

        if (!$(canvas).is("canvas")) {
            console.error("Supplied parameter was not of type 'canvas'.");
            check = false;
        }

        if (!$(gkhead).is("img")) {
            console.error("Supplied parameter was not of type 'img'.");
        }

        if ((canvasWidth <= 0 || canvasHeight <= 0)) {
            console.error("Canvas width and height but be greater than 0.");
        }

        if (check === true) {
            var ctx = canvas.getContext('2d');
            trackTransforms(ctx);

            function redraw() {

                // Clear the entire canvas
                var p1 = ctx.transformedPoint(0, 0);
                var p2 = ctx.transformedPoint(canvas.width, canvas.height);
                ctx.clearRect(p1.x, p1.y, p2.x - p1.x, p2.y - p1.y);

                $(canvas).attr('data-x', p1.x);
                $(canvas).attr('data-y', p1.y);
                $(canvas).attr('data-width', p2.x - p1.x);
                $(canvas).attr('data-height', p2.y - p1.y);

                ctx.save();
                ctx.setTransform(1, 0, 0, 1, 0, 0);
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.restore();

                var ratio = calculateAspectRatioFit(gkhead.width, gkhead.height, canvasWidth, canvasHeight)

                //to get Images to show in middle of canvas
                ctx.drawImage(gkhead, 0, 0, ratio.width, ratio.height);
            }
            redraw();

            var lastX = canvas.width / 2, lastY = canvas.height / 2;

            var dragStart, dragged;

            canvas.addEventListener('mousedown', function (evt) {
                document.body.style.mozUserSelect = document.body.style.webkitUserSelect = document.body.style.userSelect = 'none';
                lastX = evt.offsetX || (evt.pageX - canvas.offsetLeft);
                lastY = evt.offsetY || (evt.pageY - canvas.offsetTop);
                dragStart = ctx.transformedPoint(lastX, lastY);
                dragged = false;
            }, false);

            canvas.addEventListener('touchstart', function (evt) {
                document.body.style.mozUserSelect = document.body.style.webkitUserSelect = document.body.style.userSelect = 'none';
                lastX = evt.offsetX || (evt.pageX - canvas.offsetLeft);
                lastY = evt.offsetY || (evt.pageY - canvas.offsetTop);
                dragStart = ctx.transformedPoint(lastX, lastY);
                dragged = false;
            }, false);

            canvas.addEventListener('mousemove', function (evt) {
                lastX = evt.offsetX || (evt.pageX - canvas.offsetLeft);
                lastY = evt.offsetY || (evt.pageY - canvas.offsetTop);
                dragged = true;
                if (dragStart) {
                    var pt = ctx.transformedPoint(lastX, lastY);
                    ctx.translate(pt.x - dragStart.x, pt.y - dragStart.y);
                    redraw();
                }
            }, false);

            canvas.addEventListener('touchmove', function (evt) {
                lastX = evt.offsetX || (evt.pageX - canvas.offsetLeft);
                lastY = evt.offsetY || (evt.pageY - canvas.offsetTop);
                dragged = true;
                if (dragStart) {
                    var pt = ctx.transformedPoint(lastX, lastY);
                    ctx.translate(pt.x - dragStart.x, pt.y - dragStart.y);
                    redraw();
                }
            }, false);

            canvas.addEventListener('mouseup', function (evt) {
                dragStart = null;
                if (!dragged) zoom(evt.shiftKey ? -1 : 1);
            }, false);


            var scaleFactor = 1.1;

            var zoom = function (clicks) {
                var pt = ctx.transformedPoint(lastX, lastY);
                ctx.translate(pt.x, pt.y);
                var factor = Math.pow(scaleFactor, clicks);
                ctx.scale(factor, factor);
                ctx.translate(-pt.x, -pt.y);
                redraw();
            }

            var handleScroll = function (evt) {
                var delta = evt.wheelDelta ? evt.wheelDelta / 40 : evt.detail ? -evt.detail : 0;
                if (delta) zoom(delta);
                return evt.preventDefault() && false;
            };

            canvas.addEventListener('DOMMouseScroll', handleScroll, false);
            canvas.addEventListener('mousewheel', handleScroll, false);

            //keep background from moving with touchevents
            document.body.addEventListener("touchstart", function (e) {
                if (e.target === canvas) {
                    e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchend", function (e) {
                if (e.target === canvas) {
                    e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchmove", function (e) {
                if (e.target === canvas) {
                    e.preventDefault();
                }
            }, false);

            //buttons for zooming in and out of individual canvas
            if (zoomBtnIn !== "") {
                $(canvas).parent().find(zoomBtnIn)[0].addEventListener("click", function (int) {
                    zoom(this ? 2 : 2);

                });
            }
            if (zoomBtnOut !== "") {
                $(canvas).parent().find(zoomBtnOut)[0].addEventListener("click", function (int) {
                    zoom(this ? -2 : -2);

                });
            }
            //Recenter image on canvas
            if (fitBtn !== "") {
                $(canvas).parent().find(fitBtn)[0].addEventListener("click", function (evt) {
                    ctx.setTransform(1, 0, 0, 1, 0, 0);
                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    var ratio = calculateAspectRatioFit(gkhead.width, gkhead.height, canvasWidth, canvasHeight)

                    ctx.drawImage(gkhead, 0, 0, ratio.width, ratio.height);
                    redraw();
                });
            }

        }

        function trackTransforms(ctx) {
            let svg = document.createElementNS("http://www.w3.org/2000/svg", 'svg');
            let xform = svg.createSVGMatrix();
            ctx.getTransform = function () { return xform; };

            let savedTransforms = [];
            let save = ctx.save;
            ctx.save = function () {
                savedTransforms.push(xform.translate(0, 0));
                return save.call(ctx);
            };

            let restore = ctx.restore;
            ctx.restore = function () {
                xform = savedTransforms.pop();
                return restore.call(ctx);
            };

            let scale = ctx.scale;
            ctx.scale = function (sx, sy) {
                xform = xform.scaleNonUniform(sx, sy);
                return scale.call(ctx, sx, sy);
            };

            let rotate = ctx.rotate;
            ctx.rotate = function (radians) {
                xform = xform.rotate(radians * 180 / Math.PI);
                return rotate.call(ctx, radians);
            };

            let translate = ctx.translate;
            ctx.translate = function (dx, dy) {
                xform = xform.translate(dx, dy);
                return translate.call(ctx, dx, dy);
            };

            let transform = ctx.transform;
            ctx.transform = function (a, b, c, d, e, f) {
                let m2 = svg.createSVGMatrix();
                m2.a = a; m2.b = b; m2.c = c; m2.d = d; m2.e = e; m2.f = f;
                xform = xform.multiply(m2);
                return transform.call(ctx, a, b, c, d, e, f);
            };

            let setTransform = ctx.setTransform;
            ctx.setTransform = function (a, b, c, d, e, f) {
                xform.a = a;
                xform.b = b;
                xform.c = c;
                xform.d = d;
                xform.e = e;
                xform.f = f;
                return setTransform.call(ctx, a, b, c, d, e, f);
            };

            let pt = svg.createSVGPoint();
            ctx.transformedPoint = function (x, y) {
                pt.x = x; pt.y = y;
                return pt.matrixTransform(xform.inverse());
            }
        }
        function calculateAspectRatioFit(srcWidth, srcHeight, maxWidth, maxHeight) {

            let ratio = Math.min(maxWidth / srcWidth, maxHeight / srcHeight);

            return { width: srcWidth * ratio, height: srcHeight * ratio };
        }

    }
});
