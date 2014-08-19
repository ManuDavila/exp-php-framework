
<h3>FORMULARIO</h3>
<?php echo HTML::open_form(array(
    "method" => "POST", 
    "action" => ROUTER::create_action_url("demo/index"),
    "enctype" => "multipart/form-data"
        )) ?>

<?php echo HTML::label("nombre", "Introduce tu nombre") ?>
<?php echo HTML::input("text", "nombre", null, array("placeholder" => "Introduce tu nombre")) ?>

<?php echo HTML::br(2) ?>

<?php echo HTML::radio("radio", "1", false) ?>

<?php echo HTML::br(2) ?>

<?php echo HTML::checkbox("check", null, false) ?>

<?php echo HTML::br(2) ?>

<?php echo HTML::button_HTML5("submit", "Enviar el formulario", array("id" => "button")) ?>

<?php echo HTML::close_form() ?>


