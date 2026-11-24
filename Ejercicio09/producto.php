<?php

class Producto{
    public int $id;
    public string $nombre;
    public string $precio;
    public int $stock;

    

    public function valorStock(): float{
         return (float) $this->precio * $this->stock;
    }

    public function estaAgotado():bool {
        return $this->stock === 0;
    }

}


?>