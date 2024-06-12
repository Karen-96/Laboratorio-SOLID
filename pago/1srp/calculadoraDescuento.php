<?PHP

class CalculadoraDescuento {
    public function calcularDescuento($monto, $metodoPago) {
        // Calcula el descuento con un gran switch (ESTO NO RESPETA OCP)
        switch ($metodoPago) {
            case 'efectivo':
                return $this->aplicarDescuento($monto, 0.10);
            case 'debito':
                return $this->aplicarDescuento($monto, 0.05);
            case 'credito':
                // No hay descuento para tarjetas de crédito
                return $monto;
            default:
                echo "Método de pago inválido";
                return $monto;
        }
    }

    private function aplicarDescuento($monto, $tasaDescuento) {
        // Aplicamos el descuento al monto
        return $monto -= $monto * $tasaDescuento;
    }
}
