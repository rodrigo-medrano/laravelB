<?php

namespace App\Livewire;

use Livewire\Component;

class ContadorComponent extends Component
{
    public $contador=0;
    public function render()
    {
        return view('livewire.contador-component');
    }
    public function incrementar(){
        $this->contador++;
    }
    public function decrementar(){
        $this->contador--;
    }
}
