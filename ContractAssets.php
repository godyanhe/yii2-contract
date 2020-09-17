<?php
// +----------------------------------------------------------------------
// | ContractAssets.php
// +----------------------------------------------------------------------
// | User: zhangj <790162770@qq.com>
// +----------------------------------------------------------------------
// | Date: 2020年09月11日
// +----------------------------------------------------------------------
namespace contract;

use yii;
use yii\web\AssetBundle;

class ContractAssets extends AssetBundle {

    /**
     * 路径
     * @var
     */
    public $sourcePath;

    /**
     * 加载需要的JS文件。
     * @var array
     */
    public $js = [
        'js/jquery.min.js',
        'js/jquery-ui.min.js',
        'js/html2canvas.min.js',
        'js/download.js',
        'js/convert.js',
        'js/jSignature.min.js',
        'js/modalBox.js',
    ];

    /**
     * 加载需要的CSS文件。
     * @var array
     */
    public $css = [
        'css/modalBox.css',
    ];


    public $publishOptions = [
        'except' => [
            'php/',
            'index.html',
            '.gitignore'
        ]
    ];


    public function init() {
        parent::init();
        if($this->sourcePath == null)
            $this->sourcePath = __DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR;
    }

}