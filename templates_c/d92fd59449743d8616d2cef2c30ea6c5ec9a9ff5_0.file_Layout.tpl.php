<?php
/* Smarty version 5.1.0, created on 2024-06-26 15:21:52
  from 'file:Layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_667c3210dbc196_82648976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd92fd59449743d8616d2cef2c30ea6c5ec9a9ff5' => 
    array (
      0 => 'Layout.tpl',
      1 => 1719415119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667c3210dbc196_82648976 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\occasion\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
<head>
    <style>
       .container {
           margin-top: 20px;
       }

       .error{
           color: red;
       }

       .success{
           color: green;
       }
    </style>
</head>
<body>

<!-- Page content(Register) -->
<main class="flex-shrink-0">
    <div class="container">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1030079617667c3210db4093_95259504', "contentRegister");
?>

    </div>
</main>

<!-- Page content(Login) -->
<main class="flex-shrink-0">
    <div class="container2">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2075387787667c3210db5e46_41130263', "contentLogin");
?>

    </div>
</main>

<!-- Page content(Search) -->
<main class="flex-shrink-0">
    <div class="container3">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_320145563667c3210db79a3_35707731', "contentSearch");
?>

    </div>
</main>

<!-- Page content(Show Case) -->
<main class="flex-shrink-0">
    <div class="container3">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_582539007667c3210db9410_46343081', "contentShowCase");
?>

    </div>
</main>

<!-- Page content(Favorite) -->
<main class="flex-shrink-0">
    <div class="container3">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1096866465667c3210dbae37_51761842', "contentFavorite");
?>

    </div>
</main>



</body>
</html>
<?php }
/* {block "contentRegister"} */
class Block_1030079617667c3210db4093_95259504 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\occasion\\templates';
}
}
/* {/block "contentRegister"} */
/* {block "contentLogin"} */
class Block_2075387787667c3210db5e46_41130263 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\occasion\\templates';
}
}
/* {/block "contentLogin"} */
/* {block "contentSearch"} */
class Block_320145563667c3210db79a3_35707731 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\occasion\\templates';
}
}
/* {/block "contentSearch"} */
/* {block "contentShowCase"} */
class Block_582539007667c3210db9410_46343081 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\occasion\\templates';
}
}
/* {/block "contentShowCase"} */
/* {block "contentFavorite"} */
class Block_1096866465667c3210dbae37_51761842 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\occasion\\templates';
}
}
/* {/block "contentFavorite"} */
}
