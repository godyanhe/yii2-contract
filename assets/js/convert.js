$(function() {
    var $sigdiv = $("#signature");
    var arguments = {
        width: '900px',
        height: '300px',
        cssclass: 'zx11',
        signatureLine: false,//去除默认画布上那条横线
        lineWidth: '5'
    };
    $sigdiv.jSignature(arguments); // 初始化jSignature插件.
    $("#yes").click(function(){
        //将画布内容转换为图片
        var datapair = $sigdiv.jSignature("getData", "image");
        var srcpath = "data:" + datapair[0] + "," + datapair[1];
        $("#styleimg").attr("src",srcpath);
    });
    $("#reset").click(function(){
        $sigdiv.jSignature("reset"); //重置画布，可以进行重新作画.
        $("#styleimg").html("");
    });
});
/**
 * 将以base64的图片url数据转换为Blob
 * @param urlData
 * 用url方式表示的base64图片数据
 */
function convertBase64UrlToBlob(urlData){
    var bytes=window.atob(urlData.split(',')[1]);        //去掉url的头，并转换为byte
    //处理异常,将ascii码小于0的转换为大于0
    var ab = new ArrayBuffer(bytes.length);
    var ia = new Uint8Array(ab);
    for (var i = 0; i < bytes.length; i++) {
        ia[i] = bytes.charCodeAt(i);
    }
    return new Blob( [ab] , {type : 'image/png'});
}