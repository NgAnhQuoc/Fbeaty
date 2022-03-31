<?php

namespace App\View\Components\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Banner\BannerRepository;
use Illuminate\View\Component;

class Banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private $Banner;
    private $data=array();
    public function __construct(BannerRepository $Banner)
    {
        $this->Banner=$Banner;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->data['banners']=$this->Banner->getBannerByShow(Controller::BANNER_HIEN);
        return view('components.site.banner', $this->data);
    }
}
