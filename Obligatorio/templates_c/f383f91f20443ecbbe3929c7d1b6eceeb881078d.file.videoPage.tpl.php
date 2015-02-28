<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-27 15:37:06
         compiled from "templates\videoPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2559154f0b9524935a9-25021779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f383f91f20443ecbbe3929c7d1b6eceeb881078d' => 
    array (
      0 => 'templates\\videoPage.tpl',
      1 => 1425060416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2559154f0b9524935a9-25021779',
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
  'unifunc' => 'content_54f0b952dc76a6_52056709',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f0b952dc76a6_52056709')) {function content_54f0b952dc76a6_52056709($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['pair'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pair']->_loop = false;
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
