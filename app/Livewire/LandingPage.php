<?php

namespace App\Livewire;

use Livewire\Component;

class LandingPage extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';
    public $isSubmitted = false;
    public $activeTestimonial = 0;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function submitContact()
    {
        $this->validate();
        $this->isSubmitted = true;
        $this->reset(['name', 'email', 'message']);
        session()->flash('success', 'Pesan berhasil dikirim!');
    }

    public function nextTestimonial()
    {
        $this->activeTestimonial = ($this->activeTestimonial + 1) % 3;
    }

    public function prevTestimonial()
    {
        $this->activeTestimonial = ($this->activeTestimonial - 1 + 3) % 3;
    }

    public function setTestimonial($index)
    {
        $this->activeTestimonial = $index;
    }

    public function render()
    {
        return view('livewire.landing-page');
    }
}
