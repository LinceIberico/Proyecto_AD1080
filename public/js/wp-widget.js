// Cargamos css para el widget
var fileref = document.createElement("link");
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", "https://www.bodas.net/build/css/skins/bodas/widget.min.css");
document.getElementsByTagName("head")[0].appendChild(fileref)

// Mostramos widget con recomendaciones
function wpShowReviews(idEmpresa, color) {
    color = color || 'red';
    ajaxpage('https://www.bodas.net/widget/vendors/reviews?id=' + idEmpresa + '&color=' + color, 'wp-widget-reviews');
}

//-------------------------------------------------------------------------------------------
// AJAX
//-------------------------------------------------------------------------------------------
var bustcachevar = 1; //bust potential caching of external pages after initial request? (1=yes, 0=no)
var loadedobjects = "";
var rootdomain = "http://" + window.location.hostname;
var bustcacheparameter = "";
var paisesTipo1 = "198,";
var paisesTipo2 = "10,43,47,139,229";

function ajaxpage(url, containerid) {
    var page_request = false;
    if (window.XMLHttpRequest) // if Mozilla, Safari etc
        page_request = new XMLHttpRequest();
    else if (window.ActiveXObject) { // if IE
        try {
            page_request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                page_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
        }
    } else return false;

    page_request.onreadystatechange = function() { loadpage(page_request, containerid) };

    if (bustcachevar) //if bust caching of external page
        bustcacheparameter = (url.indexOf("?") != -1) ? "&" + new Date().getTime() : "?" + new Date().getTime();
    page_request.open('GET', url + bustcacheparameter, true);
    page_request.send(null);
}

function loadpage(page_request, containerid) {
    if (page_request.readyState == 4 && (page_request.status == 200 || window.location.href.indexOf("http") == -1)) {
        document.getElementById(containerid).innerHTML = page_request.responseText;
        if (typeof(document.onLayerLoaded) != "undefined" && document.onLayerLoaded != null) {
            document.onLayerLoaded();
        }
    }
}