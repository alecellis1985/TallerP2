<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-17 23:36:17
         compiled from "templates\videoPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124354f1d1c6069eb2-06555742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7a6035636a9189d8dca436a4d9aea9691d816ca' => 
    array (
      0 => 'templates\\videoPage.tpl',
      1 => 1426646175,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124354f1d1c6069eb2-06555742',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f1d1c60a50e5_84530757',
  'variables' => 
  array (
    'x' => 0,
    'videosCountInPage' => 0,
    'videos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f1d1c60a50e5_84530757')) {function content_54f1d1c60a50e5_84530757($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['x']->value = 1;
  if ($_smarty_tpl->tpl_vars['x']->value<$_smarty_tpl->tpl_vars['videosCountInPage']->value+1) { for ($_foo=true;$_smarty_tpl->tpl_vars['x']->value<$_smarty_tpl->tpl_vars['videosCountInPage']->value+1; $_smarty_tpl->tpl_vars['x']->value++) {
?>
    <?php if ($_smarty_tpl->tpl_vars['x']->value%2==1) {?>
        <div class="row">
        <?php }?>
        <div class="col-md-6 portfolio-item">
            <h3>
                <a class="videoDetails" href=""><?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['title'];?>
</a>
            </h3>
            <div class="videoPlayer" id="videoPlayer<?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['idVideo'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['url'];?>
"></div>
            <input type="hidden" class="videoId" value="<?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['idVideo'];?>
">
            <p class="starRating"><?php echo $_smarty_tpl->getSubTemplate ("starRating.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</p>
            <p><?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['description'];?>
</p>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['x']->value%2==0||$_smarty_tpl->tpl_vars['x']->value==$_smarty_tpl->tpl_vars['videosCountInPage']->value) {?>
        </div>
    <?php }?>
<?php }} ?> 
<?php }} ?>
