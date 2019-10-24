window.onpopstate = function (event) {
    this.document.location.href = location.href;
};

function getLoadingIcon(id) {
    var loadingIcons = [];
    loadingIcons[1] = '<span><img src="/templates/webbase/images/loaders/3.gif"></span><span>Загрузка данных</span></img>';
    loadingIcons[2] = '<span><img src="/templates/webbase/images/loaders/36.gif"></span><span>Обработка данных</span></img>';
    return loadingIcons[id];
}


function LoadData(url, target, method, iconId) {
    if (document.getElementById(target) != null) {
        var container = document.getElementById(target);
        if (iconId > 0) {
            var loading = '<div class="wb3_loading">' + getLoadingIcon(iconId) + '</div>';
            jQuery("#" + target).append(loading);
        }
        var ret = 'done';
        var xmlhttp = getXmlHttp();
        xmlhttp.open('GET', url, true);
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4) {
                if (xmlhttp.status == 200) {

                    if (method == 'LOAD') {
                        container.innerHTML = xmlhttp.responseText;
                    }
                    if (method == 'APPEND') {
                        jQuery("#" + target).append(xmlhttp.responseText);
                    }
                    var myScripts = container.getElementsByTagName("script");
                    if (myScripts.length > 0) {
                        for (i = 0; i < myScripts.length; i++) {
                            eval(myScripts[i].innerHTML);
                        }
                    }
                } else {
                    container.innerHTML = "<p class='alert alert-danger'>Ошибка : " + xmlhttp.status + "</p>" + xmlhttp.responseText;
                }
            }
        };
        xmlhttp.send(null);
        return ret;
    }
}


function getXmlHttp() {
    var xmlhttp;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}


function PostData(url, target, form, iconId) {
    if (document.getElementById(target) != null) {
        if (iconId > 0) {
            jQuery("#" + target).append(getLoadingIcon(iconId));
        }
        if (typeof CKEDITOR !== 'undefined') {
            for (instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
        }
        var postData = new FormData(jQuery("#" + form)[0]);
        jQuery.ajax({
            url: "" + url,
            type: "POST",
            data: postData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                jQuery("#" + target).html(data);
            },
            error: function (errormessage) {
                jQuery("#" + target).html('Ошибка данных!');
            }
        });
    }
}
