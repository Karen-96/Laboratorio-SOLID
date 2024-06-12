<?php

include 'pago.php';

$pago = new Pago(100, "Juan", "efectivo");
$pago->procesarPago();