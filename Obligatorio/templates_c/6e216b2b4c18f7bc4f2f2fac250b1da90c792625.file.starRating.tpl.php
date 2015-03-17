<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-16 20:10:22
         compiled from "templates\starRating.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1660754f1d4c2d2aca5-86745622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e216b2b4c18f7bc4f2f2fac250b1da90c792625' => 
    array (
      0 => 'templates\\starRating.tpl',
      1 => 1426453562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1660754f1d4c2d2aca5-86745622',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f1d4c2d329c6_74814360',
  'variables' => 
  array (
    'j' => 0,
    'x' => 0,
    'videos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f1d4c2d329c6_74814360')) {function content_54f1d4c2d329c6_74814360($_smarty_tpl) {?><span class="star-rating">
    <?php  $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['j']->value = 1;
  if ($_smarty_tpl->tpl_vars['j']->value<6) { for ($_foo=true;$_smarty_tpl->tpl_vars['j']->value<6; $_smarty_tpl->tpl_vars['j']->value++) {
?>
        <input type="radio" name="rating<?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['idVideo'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
">
        <i></i>
   <?php }} ?>
</span>  
    
    
    <?php }} ?>
