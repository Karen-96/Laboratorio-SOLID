<?php

include 'Pago.php';


$pago = new Pago(100, "Juan", "efectivo");
$pago->procesarPago();