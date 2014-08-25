<?php

/*
echo HTML::a(ROUTER::create_action_url("demo/index", array("id" => 3)), "PRUEBA");
echo HTML::br(2);
echo ROUTER::create_action_url("demo/index");

echo $hola;

echo $msg;

echo HTML::open_form(array(
    "method" => "POST",
    "action" => ROUTER::create_action_url("demo/index"),
    "enctype" => "multipart/form-data",
));

echo HTML::label("name", "Name:");
echo HTML::input("text", "name", null, array("placeholder" => "name"));
echo HTML::br();
echo HTML::label("repeat_name", "Repeat name:");
echo HTML::input("text", "repeat_name", null, array("placeholder" => "Repeat name"));
echo HTML::br();
echo HTML::label("upload", "Upload:");
echo HTML::input("file", "upload");
echo HTML::br();
echo HTML::button_HTML5("submit", "Send");

echo HTML::close_form();

*/
?>

<form method="post">
    Buscar: <input type="search" name="buscar" placeholder="Buscar">
    <button type="submit">Buscar</button>
</form>

<?php
echo "<table class='table'>";
foreach ($model as $row)
{
    echo "<tr><td>".$row["id"]."</td><td>".$row["paginacion"]."</td></tr>";
}
echo "</table>";

$pagination->pages('btn btn-primary');