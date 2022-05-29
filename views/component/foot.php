<!-- Se incluyen las librerías por defecto, Jquery, Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
<!-- Si se utilizará funciones javascript en todos los documentos solo se debe agregar el path y la ruta del archivo -->
<script src="<?= PATH . "resources/js/function.js" ?>"></script>
<!-- En el caso que solo se incluyan en una vista se debe agregar una centencia, 
     En el ejemplo solo existen dos vistas por lo que he evaluado si esta en home o en la segunda vista
-->
<?= CURRENTURI === PATH ? '<script src="' . PATH . "resources/js/functions_galaxia.js" . '"></script>' : "" ?>
<?= CURRENTURI !== PATH ? '<script src="' . PATH . "resources/js/functions_planeta.js" . '"></script>' : "" ?>
</body>

</html>