<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-28 10:56:12
         compiled from "templates\videoPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3092054f1c8fcc796a4-62577662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51dd9406b89923476a38130f920081cf816f7b33' => 
    array (
      0 => 'templates\\videoPage.tpl',
      1 => 1425060416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3092054f1c8fcc796a4-62577662',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'videos' => 0,
    'pair' => 0,
    'video' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f1c8fccde802_45005086',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f1c8fccde802_45005086')) {function content_54f1c8fccde802_45005086($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['pair'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pair']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['videos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pair']->key => $_smarty_tpl->tpl_vars['pair']->value) {
$_smarty_tpl->tpl_vars['pair']->_loop = true;
?>
    <div class="row">
        <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['video']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pair']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->_loop = true;
?>
            <div class="col-md-6 portfolio-item">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['video']->value['url'];?>
?rel=0" frameborder="0" allowfullscreen></iframe>
                <h3>
                    <a href="#"><?php echo $_smarty_tpl->tpl_vars['video']->value['client'];?>
</a>
                </h3>
                <p class="starRating"></p>
                <p><?php echo $_smarty_tpl->tpl_vars['video']->value['description'];?>
</p>
            </div>
        <?php } ?>
    </div>
<?php } ?><?php }} ?>
