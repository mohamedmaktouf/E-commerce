<?php

namespace App\Repositories;

use App\Models\Lens;

class LensRepository
{
    private $lens;

    /**
     * @param $lens
     */
    public function __construct(Lens $lens)
    {
        $this->lens = $lens;
    }

    /**
     * @param string $colour
     * @param string $description
     * @param int $prescription
     * @param int $type
     * @param int $stock
     * @param array $prices
     */
    public function create(string $colour , string $description , int $prescription ,
                           int $type , int $stock , array $prices) : void
    {
        $this->lens->colour = $colour;
        $this->lens->description = $description;
        $this->lens->prescription_type = $prescription;
        $this->lens->lens_type = $type;
        $this->lens->stock = $stock;
        $this->lens->save();
        foreach ($prices as $price)
        {
            $this->lens->prices()->attach([$price['currency'] => ['price' => $price['price']]]);
        }
    }
    public function getLenses()
    {
        return $this->lens->query()
            ->with('prices')
            ->paginate(config('constants.LENSES_PAGINATION'));
    }


}
