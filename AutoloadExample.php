<?php

namespace contract;

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\web\View;
use Yii;

/**
 * This is just an example.
 */
class AutoloadExample extends \yii\base\Widget
{
    /**
     * 签名大小
     */
    public $size;

    /**
     * 签名位置y轴
     */
    public $top;

    /**
     * 签名位置x轴
     */
    public $left;

    /**
     * 合约图片
     */
    public $image;

    /**
     * 合约条款文字
     */
//    public $text;

    /**
     * 接受合成图片流的方法
     */
    public $url;


    /**
     * 启动插件
     */
    public function run()
    {
        parent::run();
        //静态加载
        ContractAssets::register($this->getView());
        //内容加载
        $this->renderWidgets();
    }


    /**
     * 插件主体
     */
    public function renderWidgets()
    {
        $loadIndicator1 =  "<fieldset>";
        $loadIndicator1 .= "<span class=\"whole\" style=\"width: 544px;display: inline-block;position: relative;\">";
        $loadIndicator1 .= Html::img($this->image, ['id'=>'baseimg', 'style'=>"width:100%;height:auto;"]);
        $loadIndicator1 .= "<div style=\"height: 100%;width: 100%;top:0;position: absolute;overflow: hidden;\"><div class='drg' style='position: absolute;width:$this->size;top: $this->top;left: $this->left;display: inline-block;'>";
        $loadIndicator1 .= Html::img('', ['id'=>'styleimg', 'style'=>'width:100%;cursor: pointer;']);
        $loadIndicator1 .= "</div></div></span><script>var aUrl=\"$this->url\"</script>";
        $loadIndicator1 .= "<legend>条款</legend></fieldset><br/>";

        $loadIndicator2 = $this->getModalBoxs();

        echo $loadIndicator1 . $loadIndicator2;
    }

    /**
     * 模态框中的签名
     */
    public function getModalBoxs(){
        $loadIndicator = Html::button('签名', ['id'=>'triggerBtn']);
        $loadIndicator .= Html::button('点击合成生成',['onclick'=>'down()']);

        $loadIndicator .= "<div id=\"myModal\" class=\"modal\"><div class=\"modal-content\"><div class=\"modal-header\"><h2>请手动签名</h2><span id=\"closeBtn\" class=\"close\">×</span></div><div class=\"modal-body\">";

        $loadIndicator .= "<div id=\"signature\" style=\"border:1px solid #000;\"></div>";


        $loadIndicator .= "</div><div class=\"modal-footer\">";

        $loadIndicator .= Html::fileInput('', '保存', ['type'=>'button', 'id'=>'yes']);
        $loadIndicator .= Html::fileInput('', '重写', ['type'=>'button', 'id'=>'reset']);

        $loadIndicator .= "</div></div></div>";

        return $loadIndicator;
    }


    /**
     * 插件主体
     */
    public function renderWidget()
    {
        //模态框
        $loadIndicator1 = $this->getModalBox();

        $loadIndicator2 = "<fieldset><div id=\"signature\" style=\"border:1px solid #000;\"></div><p style=\"text-align: center\"><b style=\"color: red\">请手动写字签名。</b></p>";
        $loadIndicator2 .= Html::fileInput('', '保存', ['type'=>'button', 'id'=>'yes']);
        $loadIndicator2 .= Html::fileInput('', '重写', ['type'=>'button', 'id'=>'reset']);
        $loadIndicator2 .= '<legend>签名</legend></fieldset><fieldset>';
        $loadIndicator2 .= Html::button('点击合成生成',['onclick'=>'down()']);
        $loadIndicator2 .= '</fieldset>';

        $loadIndicator3 = "<span class=\"whole\" style=\"width: 544px;display: inline-block;position: relative;\">";
        $loadIndicator3 .= Html::img($this->image, ['id'=>'baseimg', 'style'=>"width:100%;height:auto;"]);
        $loadIndicator3 .= "<div style=\"height: 100%;width: 100%;top:0;position: absolute;overflow: hidden;\"><div class='drg' style='position: absolute;width:$this->size;top: $this->top;left: $this->left;display: inline-block;'>";
        $loadIndicator3 .= Html::img('', ['id'=>'styleimg', 'style'=>'width:100%;cursor: pointer;']);
        $loadIndicator3 .= "</div></div></span><script>var aUrl=\"$this->url\"</script>";

        echo $loadIndicator1 . $loadIndicator2 . $loadIndicator3;
    }

    /**
     * 合约明细
     */
    public function getModalBox(){
        $loadIndicator = Html::button('查看合约明细', ['id'=>'triggerBtn']);
        $loadIndicator .= "<div id=\"myModal\" class=\"modal\"><div class=\"modal-content\"><div class=\"modal-header\"><h2>合约明细</h2><span id=\"closeBtn\" class=\"close\">×</span></div><div class=\"modal-body\">";
        $loadIndicator .= Html::textarea('', $this->text, ['cols'=>'60%', 'rows'=>'20', 'readonly'=>true]);
        $loadIndicator .= "</div><div class=\"modal-footer\">";
        $loadIndicator .= Html::button('确定', ['id'=>'yesBtn']);
        $loadIndicator .= "</div></div></div>";
        return $loadIndicator;
    }
}
