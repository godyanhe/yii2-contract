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

/**
 * Class UEditorAsset
 * 负责UEditor的资源文件引入。
 * 由于bower上的源码是纯源码，需要用grunt打包后才能使用，因此扩展自带了1.4.3版本的UEditor核心文件。
 *
 * @package crazydb\ueditor
 */
class ContractAssets extends AssetBundle {

    /**
     * UEditor路径
     * @var
     */
    public $sourcePath;

    /**
     * UEditor加载需要的JS文件。
     * ueditor.config.js中是默认配置项，不建议直接引入。
     * @var array
     */
    public $js = [
        'js/jquery.min.js',
        'js/jquery-ui.min.js',
        'js/html2canvas.min.js',
        'js/download.js?v=9',
        'js/convert.js',
        'js/jSignature.min.js',
        'js/modalBox.js?v=1',
    ];

    /**
     * UEditor加载需要的CSS文件。
     * UEditor 会自动加载默认皮肤，CSS这里不必指定
     *
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