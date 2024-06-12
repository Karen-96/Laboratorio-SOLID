<?php

interface DescuentoEfectivo {
    public function calcularDescuentoEfectivo($monto);
}

interface DescuentoDebito {
    public function calcularDescuentoDebito($monto);
}

interface DescuentoCredito {
    public function calcularDescuentoCredito($monto);
}

class DescuentoEfectivoImpl implements DescuentoEfectivo {
    public function calcularDescuentoEfectivo($monto) {
        return $monto * 0.10;
    }
}

class DescuentoDebitoImpl implements DescuentoDebito {
    public function calcularDescuentoDebito($monto) {
        return $monto * 0.05;
    }
}

class DescuentoCreditoImpl implements DescuentoCredito {
    public function calcularDescuentoCredito($monto) {
        return 0; // No hay descuento para tarjetas de crédito
    }
}

class Pago {
    public $monto;
    public $persona;
    public $metodoPago;
    private $calculadoraDescuento;

    public function __construct($monto, $persona, $metodoPago) {
        $this->monto = $monto;
        $this->persona = $persona;
        $this->metodoPago = $metodoPago;

        // Construyo el nombre de la clase
        $nombreDeLaClase = "Descuento" . ucfirst($metodoPago) . "Impl";

        // Si existe esa clase, es porque se implementó ese medio de pago
        if (class_exists($nombreDeLaClase)) {
            $this->calculadoraDescuento = new $nombreDeLaClase();
        } else {
            // Si no, no
            echo "Método de pago inválido";
            return;
        }
    }

    public function procesarPago() {
        // Utilizamos la estrategia de descuento seleccionada para calcular el descuento
        $metodoCalcularDescuento = "calcularDescuento" . ucfirst($this->metodoPago);
        $montoConDescuento = $this->monto - $this->calculadoraDescuento->$metodoCalcularDescuento($this->monto);

        // Impr
        echo "$this->persona paga con $this->metodoPago, un total de: $montoConDescuento ";
    }
}

// Ejemplo de uso
$pago = new Pago(100, "Juan", "efectivo");
$pago->procesarPago();