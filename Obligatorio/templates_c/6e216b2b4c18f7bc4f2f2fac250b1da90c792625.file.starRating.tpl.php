<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-03 15:11:18
         compiled from "templates\starRating.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1660754f1d4c2d2aca5-86745622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e216b2b4c18f7bc4f2f2fac250b1da90c792625' => 
    array (
      0 => 'templates\\starRating.tpl',
      1 => 1425406222,
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
    'x' => 0,
    'videos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f1d4c2d329c6_74814360')) {function content_54f1d4c2d329c6_74814360($_smarty_tpl) {?><span class="star-rating">
    <input type="radio" name="rating<?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['idVideo'];?>
" value="1">
    <i></i>
    <input type="radio" name="rating<?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['idVideo'];?>
" value="2">
    <i></i>
    <input type="radio" name="rating<?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['idVideo'];?>
" value="3">
    <i></i>
    <input type="radio" name="rating<?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['idVideo'];?>
" value="4">
    <i></i>
    <input type="radio" name="rating<?php echo $_smarty_tpl->tpl_vars['videos']->value[$_smarty_tpl->tpl_vars['x']->value-1]['idVideo'];?>
" value="5">
    <i></i>
</span><?php }} ?>
