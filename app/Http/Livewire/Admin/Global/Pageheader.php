<?php

namespace App\Http\Livewire\Admin\Global;

use Livewire\Component;

class Pageheader extends Component
{
    public $judul = "";
    public $subjudul = "";
    public $breadcrumb = [];
    public function render()
    {
        return view('livewire.admin.global.pageheader');
    }
}
