<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 为默认文本编辑器提供增强功能
 * 
 * @package EditorEnhancement 
 * @author Mr.Raindrop
 * @version 0.1.0
 * @link http://www.mrraindrop.com
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
        Typecho_Plugin::factory('admin/write-js.php')->write = array('EditorEnhancement_Plugin', 'injectScript');
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
        $shortcuts = new Typecho_Widget_Helper_Form_Element_Checkbox('开启快捷键', array(
            "kSave" => "ctrl+s 保存草稿",
            "kSubmit" => "ctrl+Enter 发布文章"
        ));
        $form->addInput($shortcuts);
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
    	echo '<script src="'. Helper::options()->pluginUrl . '/EditorEnhancement/editorEnhancement.min.js"></script>';
    }
}