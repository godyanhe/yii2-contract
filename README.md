合约签字
====
电子合约签名插件

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yanhe/yii2-contract "*"
```

or add

```
"yanhe/yii2-contract": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \contract\AutoloadExample::widget(); ?>

```

params
------

size 签名大小 以百分比为单位

top 位置y轴 以百分比为单位

left 位置x轴 以百分比为单位

image 合约图片

url 接受合成图片流的方法

实例：
```php
<?=
$path = "图片存放路径";
if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
    $type = $result[2];
    $new_file = $path."/".date('Ymd',time())."/";
    if(!file_exists($new_file)){
        //检查是否有该文件夹，如果没有就创建，并给予最高权限
        mkdir($new_file, 0777);
    }
    $new_file = $new_file.time().".{$type}";
    if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
        return $new_file;
    }else{
        return false;
    }
}else{
    return false;
}
?>
```
