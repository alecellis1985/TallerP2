<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-01 01:32:49
         compiled from "templates\videoPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124354f1d1c6069eb2-06555742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7a6035636a9189d8dca436a4d9aea9691d816ca' => 
    array (
      0 => 'templates\\videoPage.tpl',
      1 => 1425184195,
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
    'videos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f1d1c60a50e5_84530757')) {function content_54f1d1c60a50e5_84530757($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['x']->value = 1;
  if ($_smarty_tpl->tpl_vars['x']->value<9) { for ($_foo=true;$_smarty_tpl->tpl_vars['x']->value<9; $_smarty_tpl->tpl_vars['x']->value++) {
?>
    <?php if ($_smarty_tpl->tpl_vars['x']->value%2==0) {?>
    <div class="row">
    <?php }?>
        <div class="col-md-6 portfolio-item">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['url'];?>
?rel=0" frameborder="0" allowfullscreen></iframe>
            <h3>
                <a href="#"><?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['client'];?>
</a>
            </h3>
            <p class="starRating"></p>
            <p><?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['description'];?>
</p>
        </div>
    <?php if ($_smarty_tpl->tpl_vars['x']->value%2==0) {?>
    </div>
    <?php }?>
<?php }} ?> <?php }} ?>
