<?php
/**
 * Ejemplo 1 (01-crear-cargo.php)
 */

try {

      // Respuesta
      var_dump($cargo);

} catch (CulqiException $e) {

      echo "Llamado al API error: " . htmlspecialchars($e->getMessage());

}
