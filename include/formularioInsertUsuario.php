<?php
if ($ajax === false) {
    echo '<form method="post" action="phpinsert.php">';
}
?>

<table>
    <tr>
        <td>login</td>
        <td>
            <input type="text" name="login" value="" id="login"/>
        </td>
    </tr>
    <tr>
        <td>clave</td>
        <td>
            <input type="text" name="clave" value="" id="clave"/>
        </td>
    </tr>
    <tr>
        <td>nombre</td>
        <td>
            <input type="text" name="nombre" value="" id="nombre"/>
        </td>
    </tr>
    <tr>
        <td>apellidos</td>
        <td>
            <input type="text" name="apellidos" value="" id="apellidos"/>
        </td>
    </tr>
    <tr>
        <td>email</td>
        <td>
            <input type="text" name="email" value="" id="email"/>
        </td>
    </tr>
    <tr>
        <td>rol</td>
        <td>
            <?php echo Util::getRol("", "rol", "rol", false); ?>
        </td>
    </tr>
    <tr>
        <td>is root</td>
        <td>
            <?php echo Util::getSiNo("", "isroot", "isroot", false); ?>
        </td>
    </tr>
    <tr>
        <td>is activo</td>
        <td>
            <?php echo Util::getSiNo("", "isactivo", "isactivo", false); ?>
        </td>
    </tr>
    <tr>
        <td>fecha alta</td>
        <td>
            <input type="text" name="fechaalta" value="" disabled="" id="fechaAlta"/>
        </td>
    </tr>
    <tr>
        <td>fecha login</td>
        <td>
            <input type="text" name="fechalogin" value="" disabled="" id="fechaLogin"/>
        </td>
    </tr>
    <?php
    if ($ajax === false) {
        ?>
        <tr>
            <td colspan = "2">
                <input id="btinsert" type="submit" value="inserción" class="btn btn-success" />
            </td>
        </tr>
        <?php         
    }
    ?>
</table>
<?php
if ($ajax === false) {
    echo '</form>';
}
?>