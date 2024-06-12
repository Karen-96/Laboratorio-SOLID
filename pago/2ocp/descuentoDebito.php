<?php

class DescuentoDebito implements DescuentoStrategy {
    public function calcularDescuento($monto) {
        return $monto * 0.05;
    }
}