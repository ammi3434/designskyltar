fabric.Object.prototype.transparentCorners = false;
fabric.Object.prototype.padding = 5;


var $ = function (id) { return document.getElementById(id) };


var canvas = this.__canvas = new fabric.Canvas('c');
canvas.setBackgroundColor("#ccc");
var cheight = 300;
var cwidth = 500;

canvas.setHeight(cheight);
canvas.setWidth(cwidth);

document.getElementById('c-width').onchange = function () {
    cwidth = this.value;
    canvas.setWidth(cwidth);
    canvas.renderAll();
    var price = (cwidth * cheight) / 100000;
    price = Math.round(price * 100) / 100
    jQuery('#image-price').html(price + 'kr/st');
};
document.getElementById('c-height').onchange = function () {
    cheight = this.value;
    canvas.setHeight(cheight);
    canvas.renderAll();
    var price = (cheight * cwidth) / 100000;
    jQuery('#image-price').html(price + 'kr/st');
};

window.onload = function WindowLoad(event) {
    Addtext();
}

function Addtext() {
    canvas.add(new fabric.IText('Clicka och ändra', {
        left: cwidth / 2,
        top: cheight / 2,
        fontFamily: 'arial black',
        fill: '#000',
        fontSize: 50,
        originX: 'center',
        originY: 'center',
        centeredScaling: true,
    }));
}
function centerHight() {
    var activeObject = canvas.getActiveObject();
    activeObject.top = cheight / 2;
    canvas.renderAll();
}
function centerWidth() {
    var activeObject = canvas.getActiveObject();
    activeObject.left = cwidth / 2;
    canvas.renderAll();
}

function EnviarCorreo()
{
    $.ajax({
        url: 'send_email.php',
        success: function(data) {
          $('.result').html(data);
        }
      });
}

function saveImg() {
    canvas.deactivateAll().renderAll();  
    var image= canvas.toDataURL('jpg'); 
    // console.log(image);
    window.open('mailto:mattiasg_94@hotmail.com?subject=subject&body=body');
  }
  function sendEmail() {
    Email.send({
        Host : "smtp.mailtrap.io",
        Username : "<Mailtrap username>",
        Password : "<Mailtrap password>",
        To : 'mattiasg_94@hotmail.com',
        From : "mattiasg_94@hotmail.com",
        Subject : "Test email",
        Body : "<html><h2>Header</h2><strong>Bold text</strong><br></br><em>Italic</em></html>"
    }).then(
      message => alert(message)
    );
    }
document.getElementById('text-color').onchange = function () {
    canvas.getActiveObject().setFill(this.value);
    canvas.renderAll();
};

document.getElementById('text-bg-color').onchange = function () {
    canvas.setBackgroundColor(this.value);
    canvas.renderAll();
};

document.getElementById('font-family').onchange = function () {
    canvas.getActiveObject().setFontFamily(this.value);
    canvas.renderAll();
};