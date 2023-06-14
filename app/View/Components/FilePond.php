<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

class FilePond extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.file-pond');
    }
}
