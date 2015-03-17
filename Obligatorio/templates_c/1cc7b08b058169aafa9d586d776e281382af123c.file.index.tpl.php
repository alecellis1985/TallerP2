<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-17 16:35:39
         compiled from "templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276854f086b5dbb433-12109124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cc7b08b058169aafa9d586d776e281382af123c' => 
    array (
      0 => 'templates\\index.tpl',
      1 => 1426620937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276854f086b5dbb433-12109124',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f086b64a6700_38607739',
  'variables' => 
  array (
    'videoExists' => 0,
    'mainVideo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f086b64a6700_38607739')) {function content_54f086b64a6700_38607739($_smarty_tpl) {?><!DOCTYPE html> 
<html class="no-js"> 
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <link href="resources/css/starRating.css" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation -->
        <div id="header"><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>

        <div class="container contentContainer" style="margin-top: 50px;">
            <div class="row bottom bottom-buffer">
                <div class="col-md-6 col-md-offset-1 ">
                    <h2><i>MyCompany films corp.</i></h2>
                    <div>
                        <p> We are a film producer company that offer our clients high quality custom videos for their business. You can 
                            check out our films produce for different clients and leave your comments and score. Your opinion and feedback is very
                            appreciated by our team.</p>
                        <p>
                            Go ahead and take a tour through our site! 
                        </p>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-2">
                    <img class="companyLogo"src='resources/img/companyLogo.png' alt='Blast off with Bootstrap' />
                </div>

            </div>
            <div class="row">
                <?php if ($_smarty_tpl->tpl_vars['videoExists']->value) {?>
                    <div class="col-md-5  col-md-offset-1 portfolio-item">
                        <div class="videoPlayer" id="videoPlayer<?php echo $_smarty_tpl->tpl_vars['mainVideo']->value['idVideo'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['mainVideo']->value['url'];?>
"></div>
                        <h3>
                            <a href="#" class="disableClick"><?php echo $_smarty_tpl->tpl_vars['mainVideo']->value['client'];?>
</a>
                        </h3>
                        <!-- TODO: Cambiar esto por rating con estrellas y dejar la descripcion en la siguiente columna-->
                        <p>
                            <span class="star-rating">
                                <input type="radio" name="ratingStatic" value="1" class="disableClick">
                                <i <?php if ($_smarty_tpl->tpl_vars['mainVideo']->value['rating']>=1) {?> class="rated" <?php }?>></i>
                                <input type="radio" name="ratingStatic" value="2" class="disableClick">
                                <i <?php if ($_smarty_tpl->tpl_vars['mainVideo']->value['rating']>=2) {?> class="rated" <?php }?>></i>
                                <a href="videoDetails.tpl"></a>
                                <input type="radio" name="ratingStatic" value="3" class="disableClick">
                                <i <?php if ($_smarty_tpl->tpl_vars['mainVideo']->value['rating']>=3) {?> class="rated" <?php }?>></i>
                                <input type="radio" name="ratingStatic" value="4" class="disableClick">
                                <i <?php if ($_smarty_tpl->tpl_vars['mainVideo']->value['rating']>=4) {?> class="rated" <?php }?>></i>
                                <input type="radio" name="ratingStatic" value="5" class="disableClick">
                                <i <?php if ($_smarty_tpl->tpl_vars['mainVideo']->value['rating']>=5) {?> class="rated" <?php }?>></i>
                            </span>
                        </p>
                    </div>

                    <div class="col-md-4 col-md-offset-1">
                        <h3>
                            <i>MyCompany films</i> featured Video
                        </h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['mainVideo']->value['description'];?>
</p>
                    </div>
                <?php } else { ?>
                    <div class="col-md-12">
                        <h2>No available videos at the moment</h2>
                    </div>
                <?php }?>
            </div>

        </div>

        <div class="footer"><?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>

        <?php echo '<script'; ?>
 src="http://code.jquery.com/jquery-1.11.2.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>window.jQuery || document.write('<?php echo '<script'; ?>
 src="resources/js/libs/jquery.js"><\/script>')<?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            var bootstrap_enabled = (typeof $().modal == 'function');
            bootstrap_enabled || document.write('<link rel="stylesheet" href="resources/css/bootstrap.css">');
        <?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/libs/plugins.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/helper.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/main.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/youTubePlayer.js"><?php echo '</script'; ?>
>
    </body>
</html>
<?php }} ?>
