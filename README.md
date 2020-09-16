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
<?= \contract\sign\AutoloadExample::widget(); ?>```