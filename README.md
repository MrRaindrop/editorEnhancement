# EditorEnhancement

typecho编辑器增强插件

### 功能

[3dobe](http://www.3dobe.com/)的zero最近被typecho的保存按钮没有ctrl+s快捷键搞的已经失去耐心了，于是给丫做了一个。本来写死在代码里的，不过想想太不优雅了，于是一边熟悉了下typecho的源码和插件机制一边写了这个helloworld级别的插件；typecho的钩子机制还是挺有意思的。本插件功能非常简单（也拿出来做个plugin简直都是蛋碎），就是给默认的编辑器加上一些必要的快捷键；当然名为Enhancement所以以后会慢慢再加些编辑器增强功能进来，暂时就这么着了嗯。

具体功能：

* ctrl+s 保存草稿
* ctrl+enter 发布文章

可以在插件的面板里配置要不要这个功能。

### 使用

1. 直接拷贝``dist/``目录内的``dist/EditorEnhancement``文件夹到typecho的``usr/Plugin``目录下
2. 进入插件管理界面，即可看到新增的EditorEnhancement插件，``启用``即可
3. 在插件的``设置``面板里，可以勾选要使用的快捷键，不要的去掉就可以了

### 版本支持

支持typecho版本 1.0（14.10.10），之前的版本没有做测试

