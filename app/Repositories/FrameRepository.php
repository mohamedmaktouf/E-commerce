<?php

namespace App\Repositories;

use App\Models\Frame;

class FrameRepository
{
    private $frame;

    /**
     * @param $frame
     */
    public function __construct(Frame $frame)
    {
        $this->frame = $frame;
    }

    /**
     * @param string $name
     * @param string $description
     * @param int $status
     * @param int $stock
     * @param array $prices
     */
    public function create(string $name , string $description , int $status , int $stock , array $prices) : void
    {
        $this->frame->name = $name;
        $this->frame->description = $description;
        $this->frame->status = $status;
        $this->frame->stock = $stock;
        $this->frame->save();
        foreach ($prices as $price)
        {
            $this->frame->prices()->attach([$price['currency'] => ['price' => $price['price']]]);
        }

    }
    public function getActiveFrames()
    {
        return $this->frame->query()->where('status',Frame::STATUS['ACTIVE'])
            ->with('prices')
            ->paginate(config('constants.FRAMES_PAGINATION'));
    }


}
