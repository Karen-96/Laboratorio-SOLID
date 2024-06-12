<?php

class DescuentoCredito implements DescuentoStrategy {
    public function calcularDescuento($monto) {
        return 0; // No hay descuento para tarjetas de crédito
    }
}