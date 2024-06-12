<?php 

interface DescuentoStrategy {
    public function calcularDescuento($monto);
}

class DescuentoEfectivo implements DescuentoStrategy {
    public function calcularDescuento($monto) {
        return $monto * 0.10;
    }
}

class DescuentoDebito implements DescuentoStrategy {
    public function calcularDescuento($monto) {
        return $monto * 0.05;
    }
}

class DescuentoCredito implements DescuentoStrategy {
    public function calcularDescuento($monto) {
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

        //Construyo el nombre de la clase
        $nombreDeLaClase = "Descuento" . ucfirst($metodoPago);
        //Si existe esa clase, es porque se implementó ese medio de pago
        if(class_exists($nombreDeLaClase)){
            $this->calculadoraDescuento = new $nombreDeLaClase();
        }else{
            //si no, no
            echo "Método de pago inválido";
            return;
        }
    }

    public function procesarPago() {
        // Utilizamos la estrategia de descuento seleccionada para calcular el descuento
        $montoConDescuento = $this->monto - $this->calculadoraDescuento->calcularDescuento($this->monto);

        // Imprimimos el resultado fuera de la clase Pago
        echo "$this->persona paga con $this->metodoPago, un total de: $montoConDescuento ";
    }
}

// Ejemplo de uso
$pago = new Pago(100, "Juan", "efectivo");
$pago->procesarPago();