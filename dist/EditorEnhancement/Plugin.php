<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 编辑器增强插件
 * 
 * @package EditorEnhancement
 * @author Mr.Raindrop
 * @version 0.2.0
 * @link https://github.com/MrRaindrop/editorEnhancement
 */
class EditorEnhancement_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('10x/write-js.php')->write = array('EditorEnhancement_Plugin', 'injectScript');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){
    	// nothing to do.
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
    	/** 编辑菜单快捷键设置 */
        $shortcuts = new Typecho_Widget_Helper_Form_Element_Checkbox('shortcuts', array(
            "keySave"=>"Ctrl+S: save draft",
            "keySubmit"=>"Ctrl+Enter: publish post"
        ));
        $shortcuts->value(array('keySave', 'keySubmit'));
        $form->addInput($shortcuts->multiMode());
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){
    	// nothing to do.
    }
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function injectScript()
    {
        $shorts = Helper::options()->plugin('EditorEnhancement')->shortcuts;
    	echo '<script src="'. Helper::options()->pluginUrl . '/EditorEnhancement/editorEnhancement.js"></script>';
        $shortsStr = '';
        if (current($shorts)) {
            $shortsStr .= '"' . htmlspecialchars(current($shorts));
        }
        while($cur = next($shorts)) {
            $shortsStr .= '" ,"' . htmlspecialchars(current($shorts));
        }
        if ($shortsStr !== '') {
            $shortsStr .= '"';
        }
        echo '<script type="text/javascript">$(function() {window._rdp_.EditorEnhancement.enableShortcuts([' .
            $shortsStr .
            ']);})</script>';
    }
}