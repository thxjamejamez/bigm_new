@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'เเจ้งชำระเงิน')

@section('header-css')

@endsection

@section('content')

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div >
                <style>
                * {
                    /*
                    padding: 0;
                    margin: 0;
                    */
                }
                
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
                                        {{-- <div class="col-md-3">
                                            <div class="blog_info text-right">
                                                <div class="bgcolor single-defination">                                    
                                                    <h4 class="mb-20">เปลี่ยนสีขอบหน้าต่าง</h4>
                                                    <span class="white"></span>
                                                    <span class="gray"></span>
                                                    <span class="silver"></span>
                                                    <span class="red"></span>
                                                    <span class="green"></span>
                                                    <span class="blue"></span>
                                                    <span class="black"></span>
                                                    <span class="yellow"></span>
                                                    <span class="purple"></span>
                                                </div>
                                            </div>
                                            <div class="blog_info"></div>
                                        </div> --}}
                                        <div class="col-md-9">
                                            <div class="blog_post">
                                                <div class="blog_details">
                                                    <div style="font-size: 20px;font-weight: bold;color: black" align="center">
                                                        ออกแบบหน้าต่าง
                                                    </div>                                    
                                                    <center><canvas id="mainscreen"></canvas></center>
                                                    {{-- <div>
                                                    <br>
                                                    <h4 align="center">คำนวณราคาทั้งหมด 
                                                        <div id="showprice" name="custom_price"></div>
                                                    </h4>                                    
                                                    </div> --}}
                                                    <div>
                                                    <h4 align="center">มีอะไรบ้าง</h4>
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
                                        <div class="col-lg-6">
                                            <div class="drag-me">
                                                <input type="image" src="img/material_custom/butterfly.png" 
                                                class="addpic" name="l2" style="width: 120px;">
                                            </div>
                                            <div class="drag-me">
                                                <input type="image" src="img/material_custom/butterfly01.png" 
                                                class="addpic2" name="" style="width: 120px;">
                                            </div>
                                            <div class="drag-me">
                                                <input type="image" src="img/material_custom/butterfly02.png" 
                                                class="addpic3" name="" style="width: 120px;">
                                            </div>
                                            <div class="drag-me">
                                                <input type="image" src="img/material_custom/10050022_EA.png" 
                                                class="addpic4" name="" style="width: 120px;">
                                            </div>
                                            <div class="drag-me">
                                                <input type="image" src="img/material_custom/flow1.png" 
                                                class="addpic5" name="" style="width: 120px;">
                                            </div>
                                            <div class="drag-me">
                                                <input type="image" src="img/material_custom/10050047_EA_1200_1.png" 
                                                class="addpic6" name="" style="width: 120px;">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="drag-me">
                                                <input type="image" src="img/material_custom/10050025_EA_1200_1.png" 
                                                class="addpic7" name="" style="width: 120px;">
                                            </div>
                                            <div class="drag-me">
                                                <input type="image" src="img/material_custom/10050027_EA_1200_1.png" 
                                                class="addpic8" name="" style="width: 120px;">
                                            </div>
                                            <div class="drag-me">
                                                <input type="image" src="img/material_custom/10050035_EA_1200_1.png" 
                                                class="addpic9" name="" style="width: 120px;">
                                            </div>
                                            <div class="drag-me">
                                                <input type="image" src="img/material_custom/10050037_EA_1200_1.png" 
                                                class="addpic10" name="" style="width: 120px;">
                                            </div>                            
                                        </div>
                                        {{-- <div class="single-defination">
                                            <h4 class="mb-20">เพิ่มรูปภาพตกแต่ง</h4>
                                            <input id="imagebroswer" class="genric-btn info radius" type="file">
                                        </div> --}}
                                    </aside>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_details" align="center">
                                <form action="index.php?page=custom&action=add_custom" method="post">
                                    <div class="clear:both; single-defination" align="center" style="font-weight: bold;font-size: 16px;">                   
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
            // var total = []
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
                    document.getElementById("showprice").innerHTML = totalprice
                    document.getElementById("submitprice").value = totalprice
                    screen.remove(activeObject);
                }
            });
            
            $(".addpic").click(function() {
                var pic = fabric.Image.fromURL('img/material_custom/butterfly.png');
                var txt = $(".txt").val();
              //  fruits.push("Kiwi");
                
                fabric.Image.fromURL('img/material_custom/butterfly.png', function(myImg) {
                    var img1 = myImg.set({
                        name:'butterfly',
                        price:20,
                        left: 0,
                        top: 0,
                        width: 150,
                        height: 100
                    });
                    // localStorage.setItem("addprice", 100);
                    screen.add(img1);
                    totalprice += 20
                    product_name_txt = 'แมลงปอ'
                    //product_name += "แมงปอ";
                    product_name.push(product_name_txt);
                    console.log(product_name)
                    document.getElementById("showname").innerHTML = product_name
                    //document.getElementById("submitname").value = product_name
                    
                    document.getElementById("showprice").innerHTML = totalprice
                    document.getElementById("submitprice").value = totalprice
                    console.log('dasdsaccc',canvas.toDataURL())
                    
                });
                
            });
            $(".addpic2").click(function() {
                var pic = fabric.Image.fromURL('img/material_custom/butterfly01.png');
                var txt = $(".txt").val();
                fabric.Image.fromURL('img/material_custom/butterfly01.png', function(myImg) {
                    var img1 = myImg.set({
                        name:'butterfly01',
                        price:15,
                        left: 0,
                        top: 0,
                        width: 150,
                        height: 150
                    });
                    screen.add(img1);
                    totalprice += 15
                    document.getElementById("showprice").innerHTML = totalprice
                    document.getElementById("submitprice").value = totalprice
                });
            });
            $(".addpic3").click(function() {
                var pic = fabric.Image.fromURL('img/material_custom/butterfly02.png');
                var txt = $(".txt").val();
                fabric.Image.fromURL('img/material_custom/butterfly02.png', function(myImg) {
                    var img1 = myImg.set({
                        name:'butterfly02',
                        price:18,
                        left: 0,
                        top: 0,
                        width: 150,
                        height: 100
                    });
                    screen.add(img1);
                    totalprice += 18
                    document.getElementById("showprice").innerHTML = totalprice          
                    document.getElementById("submitprice").value = totalprice
                    
                });
            });
            $(".addpic4").click(function() {
                var pic = fabric.Image.fromURL('img/material_custom/10050022_EA.png');
                var txt = $(".txt").val();
                fabric.Image.fromURL('img/material_custom/10050022_EA.png', function(myImg) {
                    var img1 = myImg.set({
                        name:'10050022_EA',
                        price:15,
                        left: 0,
                        top: 0,
                        width: 120,
                        height: 150
                    });
                    screen.add(img1);
                    totalprice += 15
                    document.getElementById("showprice").innerHTML = totalprice
                    document.getElementById("submitprice").value = totalprice
                });
            });
            $(".addpic5").click(function() {
                var pic = fabric.Image.fromURL('img/material_custom/flow1.png');
                var txt = $(".txt").val();
                fabric.Image.fromURL('img/material_custom/flow1.png', function(myImg) {
                    var img1 = myImg.set({
                        name:'flow1',
                        price:15,
                        left: 0,
                        top: 0,
                        width: 150,
                        height: 100
                    });
                    screen.add(img1);
                    totalprice += 15
                    document.getElementById("showprice").innerHTML = totalprice
                    document.getElementById("submitprice").value = totalprice
                });
            });
            $(".addpic6").click(function() {
                var pic = fabric.Image.fromURL('img/material_custom/10050047_EA_1200_1.png');
                var txt = $(".txt").val();
                fabric.Image.fromURL('img/material_custom/10050047_EA_1200_1.png', function(myImg) {
                    var img1 = myImg.set({
                        name:'10050047_EA_1200_1',
                        price:30,
                        left: 0,
                        top: 0,
                        width: 120,
                        height: 120
                    });
                    screen.add(img1);
                    totalprice += 30
                    document.getElementById("showprice").innerHTML = totalprice
                    document.getElementById("submitprice").value = totalprice
                });
            });
            $(".addpic7").click(function() {
                var pic = fabric.Image.fromURL('img/material_custom/10050025_EA_1200_1.png');
                var txt = $(".txt").val();
                fabric.Image.fromURL('img/material_custom/10050025_EA_1200_1.png', function(myImg) {
                    var img1 = myImg.set({
                        name:'10050025_EA_1200_1',
                        price:25,
                        left: 0,
                        top: 0,
                        width: 150,
                        height: 120
                    });
                    screen.add(img1);
                    totalprice += 25
                    document.getElementById("showprice").innerHTML = totalprice
                    document.getElementById("submitprice").value = totalprice
                });
            });
            $(".addpic8").click(function() {
                var pic = fabric.Image.fromURL('img/material_custom/10050027_EA_1200_1.png');
                var txt = $(".txt").val();
                fabric.Image.fromURL('img/material_custom/10050027_EA_1200_1.png', function(myImg) {
                    var img1 = myImg.set({
                        name:'10050027_EA_1200_1',
                        price:35,
                        left: 0,
                        top: 0,
                        width: 120,
                        height: 120
                    });
                    screen.add(img1);
                    totalprice += 35
                    document.getElementById("showprice").innerHTML = totalprice
                    document.getElementById("submitprice").value = totalprice
                });
            });
            $(".addpic9").click(function() {
                var pic = fabric.Image.fromURL('img/material_custom/10050035_EA_1200_1.png');
                var txt = $(".txt").val();
                fabric.Image.fromURL('img/material_custom/10050035_EA_1200_1.png', function(myImg) {
                    var img1 = myImg.set({
                        name:'10050035_EA_1200_1',
                        price:35,
                        left: 0,
                        top: 0,
                        width: 110,
                        height: 200
                    });
                    screen.add(img1);
                    totalprice += 35
                    document.getElementById("showprice").innerHTML = totalprice
                    document.getElementById("submitprice").value = totalprice
                });
            });
            $(".addpic10").click(function() {
                var pic = fabric.Image.fromURL('img/material_custom/10050037_EA_1200_1.png');
                var txt = $(".txt").val();
                fabric.Image.fromURL('img/material_custom/10050037_EA_1200_1.png', function(myImg) {
                    var img1 = myImg.set({
                        name:'10050037_EA_1200_1',
                        price:25,
                        left: 0,
                        top: 0,
                        width: 120,
                        height: 120
                    });
                    screen.add(img1);
                    totalprice += 25
                    document.getElementById("showprice").innerHTML = totalprice
                    document.getElementById("submitprice").value = totalprice
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
