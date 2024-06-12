<?php

class DescuentoEfectivo implements DescuentoStrategy {
    public function calcularDescuento($monto) {
        return $monto * 0.10;
    }
}