function BaseImage(imgFile) {//图片1上传的函数方法
    var f = imgFile.files[0];//获取上传的图片文件
    var filereader = new FileReader();//新建一个图片对象
    filereader.onload = function (event) {//图片加载完成后执行的函数
        var srcpath = event.target.result;//这里获取图片的路径（图片会被转为base6格式）
        $("#baseimg").attr("src",srcpath);//将获取的图片使用jquery的attr()方法插入到id为baseimg的图片元素里
    };
    filereader.readAsDataURL(f);//读取图片（将插入的图片读取显示出来）
}
// $(function() {
//     $( ".drg" ).draggable();//这里使用jquery ui的拖拽方法  draggable()；作用是可以让图片2进行拖拽
// });
function down(){//这个函数是点击下载执行的方法
    html2canvas($(".whole"),{ //这是使用了html2canvas这个插件的方法，将class为whole的整个节点绘制成画布
        onrendered:function(canvas){  //画布绘制完成后执行下面内容，function内的canvas这个参数就是已经被绘制成画布
            var link = document.createElement('a');//创建一个a标签
            link.download = 'my-image-name.jpg';//a标签增加一个download属性，属性值（my-image-name.jpg）就是合成下载后的文件名
            link.href = canvas.toDataURL();//canvas.toDataURL()就是画布的路径，将路径赋给a标签的href
            // console.log(link.href);
            // link.click();//模拟a标签被点击，这样就可以下载了
            var url = aUrl;
            $.post(url, {image: link.href}, function (data) {
                alert(data);
            });
        },
    })
}