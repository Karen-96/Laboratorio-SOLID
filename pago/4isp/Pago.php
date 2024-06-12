<?php

class Pago {
    private $monto;
    private $persona;
    private $metodoDePago;

    public function __construct($monto, $metodoDePago, $persona) {
      $this->$monto = $monto;
      $this->$metodoDePago = $metodoDePago;
            $this->persona = $persona;
    }

    public function procesarPago() {
        if ($this->metodoDePago === 'debito') {
            echo "Pago de $this->monto procesado con tarjeta de débito.\n";
        } elseif ($this->metodoDePago === 'credito') {
            echo "Pago de $this->monto procesado con tarjeta de crédito.\n";
        } elseif ($this->metodoDePago === 'efectivo') {
            echo "Pago de $this->monto recibido en efectivo.\n";
        } else {
            echo "Método de pago no válido.\n";
        }
    }
}