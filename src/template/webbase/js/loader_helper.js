function loadRaw(url, target, history) {
    LoadData(url, target, 'LOAD', 1);
    if (history) {
        setHistory(url);
    }
}

function loadUrl(url, target, history) {
    LoadData(url, target, 'LOAD', 1);
    if (history) {
        setHistory(url);
    }
}


function loadModal(url) {
    jQuery('#wb_modal').modal();
    LoadData(url, 'wb_modal_content', 'LOAD', 1);
}


function modalHide() {
    jQuery('#wb_modal').modal('hide');
    jQuery("#wb_modal").hide();
}



function setHistory(url) {
    var urlArray = URLToArray(url);

    if (urlArray['view']) {
        urlArray['wb3_view'] = urlArray['view'];
        delete urlArray['view'];
        delete urlArray['format'];
    }
    var historyUrl = 'index.php?' + ArrayToURL(urlArray);
    window.history.pushState({goBack: true}, '', window.location.href);
    window.history.replaceState('', '', historyUrl);
}


function URLToArray(url) {
    var request = {};
    var pairs = url.substring(url.indexOf('?') + 1).split('&');
    for (var i = 0; i < pairs.length; i++) {
        if (!pairs[i])
            continue;
        var pair = pairs[i].split('=');
        request[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
    }
    return request;
}

function ArrayToURL(array) {
    var pairs = [];
    for (var key in array)
        if (array.hasOwnProperty(key))

            pairs.push(encodeURIComponent(key) + '=' + encodeURIComponent(array[key]));
    return pairs.join('&');
}