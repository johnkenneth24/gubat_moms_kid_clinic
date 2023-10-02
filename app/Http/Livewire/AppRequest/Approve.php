<?php

namespace App\Http\Livewire\AppRequest;

use Livewire\Component;

class Approve extends Component
{
    public function approval(){
      $this->dispatchBrowserEvent('swal:confirm', [
        'type' => 'warning',
        'message' => 'Are you sure?',
        'text' => 'If deleted, you will not be able to recover this imaginary file!'
    ]);
    }
    public function render()
    {
        return view('livewire.app-request.approve');
    }
}
