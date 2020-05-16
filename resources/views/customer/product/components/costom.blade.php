@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'ออกแบบสินค้า')

@section('header-css')

@endsection

@section('content')

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div>
                <style>
                    * {}

                    .content {
                        margin: 0 auto;
                        width: 600px;
                        max-width: 100%;
                    }

                    .text {
                        /*
                    float: left;
                    width: 50%;
                    */
                    }

                    .imageupload {
                        /*
                        float:left;
                        width:50%;
                        */
                    }

                    .bgcolor span,
                    .txtcolor span {
                        width: 40px;
                        height: 40px;
                        display: inline-block;
                        /*margin:5px;*/

                    }
                </style>

                <!-- Start Banner Area -->
                <section class="blog_area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="blog_left_sidebar">
                                    <br>
                                    <article class="row blog_item">
                                        <div class="col-md-9">
                                            <div class="blog_post">
                                                <div class="blog_details">
                                                    <div style="font-size: 20px;font-weight: bold;color: black"
                                                        align="center">
                                                        ออกแบบหน้าต่าง
                                                    </div>
                                                    <center><canvas id="mainscreen"></canvas></center>
                                                    <div>
                                                        <br>
                                                        <h4 align="center">
                                                            <div id="showprice" name="custom_price"></div>
                                                        </h4>
                                                    </div>
                                                    <div>
                                                        <h4 align="center"></h4>
                                                        <div id="showname" name="custom_name"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="blog_right_sidebar">
                                    <aside class="row blog_item">
                                        <div class="col-lg-12">

                                            <div class="row">
                                                @foreach ($material as $key => $item)
                                                <div class="col-lg-6">
                                                    <div
                                                        class="drag-me mx-auto d-flex justify-content-center flex-wrap">
                                                        <img src="{{$item->img_path}}" class="addpic col-centered"
                                                            data-img="{{$item->img_path}}" data-name="{{$item->name}}"
                                                            style="width: 100px; height: 100px">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>

                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_details" align="center">
                        <form action="index.php?page=custom&action=add_custom" method="post">
                            <div class="clear:both; single-defination" align="center"
                                style="font-weight: bold;font-size: 16px;">
                                หากต้องการลบรูป ให้กดที่รูปและกดปุ่ม Delete
                            </div>
                            <hr>
                            <!-- <div id="showprice" name="custom_price"></div> -->
                            <input type="hidden" id="submitprice" name="custom_price">
                            <div class="save genric-btn danger circle">บันทึกรูปภาพ</div>
                            <!--
                                    <button type="submit" value="สั่งซื้อสินค้า" 
                                    class="genric-btn danger circle">สั่งซื้อสินค้า</button>
                    -->
                        </form>
                    </div>
                </section>


            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-js')
<script src="js/customProduct/jquery.min.js" type="text/javascript"></script>
<script src="js/customProduct/fabric.js" type="text/javascript"></script>
<script src="js/customProduct/FileSaver.js" type="text/javascript"></script>
<script src="js/customProduct/canvas-toBlob.js"></script>

<link rel="stylesheet" href="css/customer/style2.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script>
    $(document).ready(function() {
        const material = JSON.parse(window.atob("{{base64_encode(json_encode($material))}}"))

        var screen = new fabric.Canvas('mainscreen');
        screen.setHeight(620);
        screen.setWidth(420);
        fabric.Image.fromURL('img/material_custom/Model.png', function(oImg) {
            oImg.width = 387;
            oImg.height = 584;
            oImg.set('selectable', false);
            screen.add(oImg);
            screen.centerObject(oImg);
            bg = screen.item(0);
            bg.filters.length = 0;
            bg.filters.push(new fabric.Image.filters.Tint({
                color: 'white',
                opacity: 0.6
            }));
            bg.applyFilters(screen.renderAll.bind(screen));
        });
        // loop ใส่สีให้ กับ ปุ่มเลือกสีเสื้อ
        $.each($(".bgcolor span"), function() {
            var className = $(this).attr('class');
            $(".bgcolor ." + className).css("background", className);
        });
        // loop ใส่สีให้ กับ ปุ่มเลือกสีตัวอักษร
        $.each($(".txtcolor span"), function() {
            var className = $(this).attr('class');
            $(".txtcolor ." + className).css("background", className);
        });
        // save รูปที่แต่งแล้ว
        $(".save").click(function() {
            //screen.deactivateAll().renderAll();
            //window.open(screen.toDataURL('image/png'));
            var d = new Date();
            $("#mainscreen").get(0).toBlob(function(blob) {
                console.log(blob)
                saveAs(blob, d.getDate() + d.getHours() + d.getMilliseconds() + "myImg.png")
                //var name = new String(d.getDate()+d.getHours()+d.getMilliseconds()+"myImg.png");
                
            });
            location.reload();
        });
        // event การเลือกสีเสื้อ
        $(".bgcolor span").click(function() {
            var color = $(this).attr('class');
            bg = screen.item(0);
            bg.filters.length = 0;
    
            bg.filters.push(new fabric.Image.filters.Tint({
                color: color,
                opacity: .5
            }));
            bg.applyFilters(screen.renderAll.bind(screen));
        });
        
        $("#imagebroswer").change(function() {
            var e = $(this);
            var reader = new FileReader();
            reader.onload = function(event) {
                var imgObj = new Image();
                imgObj.src = event.target.result;
                imgObj.onload = function() {
                    var image = new fabric.Image(imgObj);
                    image.set({
                        angle: 0,
                    });
                    screen.centerObject(image);
                    screen.add(image);
                    screen.renderAll();
                }
            }
            reader.readAsDataURL(e[0].files[0]);
        });
    
        var totalprice = 300
        var product_name = []
        var product_name_txt = '';
    
        // กดปุ่ม delete
        $('body').keyup(function(e) {
                
            if (e.keyCode == 46) {
                // delete
                var activeObject = screen.getActiveObject();
                    product_name -= screen.getActiveObject().product_name
                    product_name -= screen.getActiveObject().product_name
                totalprice -= screen.getActiveObject().price
                
                document.getElementById("showname").innerHTML = product_name
                if(isNaN(product_name)){
                    console.log("NAN")
                    document.getElementById("showname").innerHTML = ''
                }else{
                    var activeObject = screen.getActiveObject();
    
                    product_name -= screen.getActiveObject().product_name
                    product_name -= screen.getActiveObject().product_name
                    document.getElementById("showname").innerHTML = product_name
                    totalprice -= screen.getActiveObject().price
                }            
                document.getElementById("submitprice").value = totalprice
                screen.remove(activeObject);
            }
        });
        
        $(".addpic").click(function() {
            var pic = fabric.Image.fromURL($(this).data('img'));
            var txt = $(".txt").val();

            fabric.Image.fromURL($(this).data('img'), function(myImg) {
                var img1 = myImg.set({
                    name:$(this).data('name'),
                    price:20,
                    left: 0,
                    top: 0,
                    width: 150,
                    height: 100
                });
                screen.add(img1);
                product_name_txt = $(this).data('name')
                product_name.push(product_name_txt);
                console.log(product_name)
                document.getElementById("showname").innerHTML = product_name
                document.getElementById("submitprice").value = totalprice
                console.log('dasdsaccc',canvas.toDataURL())
                
            });
            
        });
     
    });


    var canvas = new fabric.Canvas('canvas');
    var DIMICON = 15;
    var HideControls = {
        'tl': true,
        'tr': true,
        'bl': true,
        'br': true,
        'ml': true,
        'mt': true,
        'mr': true,
        'mb': true,
        'mtr': true
    };
    
    var dataImage = [
        "img/cell-8-10-120.png", /*scale*/
        "img/Rotate360_red.png", /*rotate*/
        "img/cell-8-10-121.png", /*scale2*/
        "img/cell-8-10-122.png" /*scale3*/
    ];
    //********override*****//
    fabric.Object.prototype._drawControl = function(control, ctx, methodName, left, top) {
        if (!this.isControlVisible(control)) {
            return;
        }
        var SelectedIconImage = new Image();
        var size = this.cornerSize;
        /*  fabric.isVML() ||*/
        this.transparentCorners || ctx.clearRect(left, top, size, size);
        switch (control) {
            case 'tl':
                SelectedIconImage.src = dataImage[2];
                break;
            case 'tr':
                /*scale*/
                SelectedIconImage.src = dataImage[0];
                break;
            case 'bl':
                /*scale*/
                SelectedIconImage.src = dataImage[0];
                break;
            case 'br':
                /*rotate*/
                SelectedIconImage.src = dataImage[1];
                break;
            case 'ml':
                SelectedIconImage.src = dataImage[3];
                break;
            default:
                ctx[methodName](left, top, size, size);
        }
    
        if (control == 'tl' || control == 'tr' || control == 'bl' || control == 'br') {
            try {
                ctx.drawImage(SelectedIconImage, left, top, DIMICON, DIMICON);
            } catch (e) {
                ctx[methodName](left, top, size, size);
            }
        }
    }
    //override prorotype _setCornerCursor to change the corner cusrors
    fabric.Canvas.prototype._setCornerCursor = function(corner, target) {
        if (corner === 'mtr' && target.hasRotatingPoint) {
            this.setCursor(this.rotationCursor);
            /*ADD*/
        } else if (corner == "tr" || corner == "bl") {
            this.setCursor('sw-resize');
    
        } else if (corner == "tl" || corner == "br") {
            this.setCursor('pointer');
        }
        /*ADD END*/
        else {
            this.setCursor(this.defaultCursor);
            return false;
        }
    };
    fabric.Canvas.prototype._getActionFromCorner = function(target, corner) {
        var action = 'drag';
        if (corner) {
            switch (corner) {
                case 'ml':
                    action = 'scale';
                    break;
                case 'mr':
                    action = 'scaleX'; //ขยายไปด้านข้าง
                    break;
                case 'mt':
                case 'mb':
                    action = 'scaleY'; //ขยายรูปขึ้น
                    break;
                case 'mtr':
                    action = 'rotate'; //หมุน
                    break;
                    /**ADD **/
                case 'br':
                    action = 'rotate';
                    break;
                case 'tl':
                    action = 'scale';
                    break;
                    /**ADD END**/
                default:
                    action = 'scale';
            }
            return action;
        }
    }
    fabric.Canvas.prototype._performTransformAction = function(e, transform, pointer) {
        var x = pointer.x,
            y = pointer.y,
            target = transform.target,
            action = transform.action;
    
        if (action === 'rotate') {
            this._rotateObject(x, y);
            this._fire('rotating', target, e);
        } else if (action === 'scale') {
            this._onScale(e, transform, x, y);
            this._fire('scaling', target, e);
        } else if (action === 'scaleX') {
            this._scaleObject(x, y, 'x');
            this._fire('scaling', target, e);
        } else if (action === 'scaleY') {
            this._scaleObject(x, y, 'y');
            this._fire('scaling', target, e);
        }
        /**ADD**/
        else if (action === 'delete') {
            //do nothing, because here function executed when mouse moves
        }
        /**ADD END**/
        else {
            this._translateObject(x, y);
            this._fire('moving', target, e);
            this.setCursor(this.moveCursor);
        }
    }
    //********override END*****//
    
    fabric.Image.fromURL('http://serio.piiym.net/CVBla/txtboard/thumb/1260285874089s.jpg', function(img) {
        img.top = 0;
        img.left = 0;
        img.setControlsVisibility(HideControls);
        canvas.add(img);
    });
    canvas.renderAll();
</script>
@endsection