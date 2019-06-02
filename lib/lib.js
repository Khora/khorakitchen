var numberOfCookiesToBeUsed = 10;
var maxLengthOfCookieArray = 300;
var cookieValidDurationDays = 300;
var cookiePrefix = "ifc_"; // Infomap Favorites Cookie
var starElementPrefix = "s_";
var starImageElements = [];
var currentlyVisibleElements = [];
var currentlyVisibleElements = [];
var map = null;

var doNotExecuteTaskBeforeMap = new Map();

function startSearch(searchString) {
    if (searchString != "") {
        window.location.href = location.protocol + '//' + location.host + location.pathname + '?search=' + searchString + '#search';
    } else {
        window.location.href = location.protocol + '//' + location.host + location.pathname + '#search';
    }
}

function changeIsOpen(element) {
	if(!element.style.display) {
		element.style.display = "block";
    }
	if (element.style.display !== "none") {
        element.style.display = "none";
    } else {
        element.style.display = "block";
    }
}

function elementIsVisible(element) {
    return element.style.display !== "none";
}

function closeOthersAndChangeIsOpen(element) {
	document.getElementById('settingsField').style.display = "none";
	document.getElementById('infoField').style.display = "none";
	changeIsOpen(element);
}

function hideDiv(element) {
	element.style.display = "none";
}

function showDiv(element) {
	element.style.display = "block";
}

function hideIfNoMobileDevice(element) {
	if(!isMobileOrTablet()) {
		hideDiv(element);
	}
}

function isMobileOrTablet() {
	if(navigator.userAgent.match(/Android/i)
		|| navigator.userAgent.match(/webOS/i)
		|| navigator.userAgent.match(/iPhone/i)
		|| navigator.userAgent.match(/iPad/i)
		|| navigator.userAgent.match(/iPod/i)
		|| navigator.userAgent.match(/BlackBerry/i)
		|| navigator.userAgent.match(/Windows Phone/i)){
		return true;
	}
	return false;
}

function getCurrentFileName() {
    var url = window.location.pathname;
    var lastUri = url.substring(url.lastIndexOf('/') + 1);
    if (lastUri.indexOf('?') != -1) {
        return lastUri.substring(0, lastUri.indexOf('?'));
    }
    else {
        return lastUri;
    }
}

function getCurrentServerAndPath() {
    var url = window.location.pathname;
    var fileName = url.substring(url.lastIndexOf('/') + 1);
    return window.location.origin + window.location.pathname.replace(fileName, '');
}

function goToMobilePage() {
    if (!isMobileOrTablet()) {
        document.location = getCurrentFileName() + "?mobile=true";
    }
}

function resizeHeaderElements() {
    var widthOfDisplayArea = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    
    var widthCombinedWithSpacing = 1000;
    var spaceAvailableLeftAndRightCombined = Math.max(0, widthOfDisplayArea - widthCombinedWithSpacing);
    
    var leftOfLogo = spaceAvailableLeftAndRightCombined / 2;
    var leftOfTitle = spaceAvailableLeftAndRightCombined / 2 + 200;
    var leftOfMenuArea = spaceAvailableLeftAndRightCombined / 2 + 575;
    
    if (spaceAvailableLeftAndRightCombined == 0) {
        goToMobilePage();
    }
}

function changeIcon(element, newIconPath) {
	element.src = newIconPath;
}

function callDelayed(functionToCall, delayMs) {
    setTimeout(function() { functionToCall(); }, delayMs);
}