<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-05 21:28:09
         compiled from "templates\prueba.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3274954d3e82e37fa26-83345189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e386dc60b58c62059084d28a33996da948c04332' => 
    array (
      0 => 'templates\\prueba.tpl',
      1 => 1423178888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3274954d3e82e37fa26-83345189',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54d3e82ea2e820_58979088',
  'variables' => 
  array (
    'nombre' => 0,
    'contactos' => 0,
    'con' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d3e82ea2e820_58979088')) {function content_54d3e82ea2e820_58979088($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>Fucking Smarty!</title>
</head>
<body>
	<h1>Hola <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</h1>


	<table border="1">
	<thead>	
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Sexo</th>
		<th>Telefono</th>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['con'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['con']->_loop = false;
 $_smarty_tpl->tpl_vars['cid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contactos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['con']->key => $_smarty_tpl->tpl_vars['con']->value) {
$_smarty_tpl->tpl_vars['con']->_loop = true;
 $_smarty_tpl->tpl_vars['cid']->value = $_smarty_tpl->tpl_vars['con']->key;
?>
			
			<tr style="background-color: <?php if ($_smarty_tpl->tpl_vars['con']->value['sexo']=='M') {?> blue <?php } else { ?> pink <?php }?>">
	  			<td><?php echo $_smarty_tpl->tpl_vars['con']->value['nombre'];?>
</td>
	  			<td><?php echo $_smarty_tpl->tpl_vars['con']->value['apellido'];?>
</td>
	  			<td><?php echo $_smarty_tpl->tpl_vars['con']->value['sexo'];?>
</td>
	  			<td><?php echo $_smarty_tpl->tpl_vars['con']->value['telefono'];?>
</td>
	  		</tr>
		<?php } ?>
	</tbody>
	</table>	


</body>
</html><?php }} ?>
