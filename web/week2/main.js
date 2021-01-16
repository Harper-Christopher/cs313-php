function alertFunction() {
    alert("Clicked!");
}

function changeColor() {
    let color = document.getElementById('divColor').value;
    //https://developer.mozilla.org/en-US/docs/Web/API/ElementCSSInlineStyle/style
    document.getElementById('one').style.backgroundColor = color;
}

function jQueryChangeColor() {
    let color = document.getElementById('divColorTwo').value;

    //https://www.w3schools.com/jquery/jquery_css_classes.asp
    $("button").click(function() {
    //https://www.w3schools.com/jquery/jquery_css.asp
    $(".two").css("background-color", color);
    });
}