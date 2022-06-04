<?php

namespace App\Repositories;

use App\Exceptions\OutOfStock;
use App\Models\Frame;
use App\Models\Glass;
use App\Models\Lens;
use Illuminate\Support\Facades\Lang;

/**
 *
 */
class GlassRepository
{
    /**
     * @var Glass
     */
    private $glass;
    /**
     * @var BasketRepository
     */
    private $basketRepository;

    /**
     * @param $glass
     */
    public function __construct(Glass $glass, BasketRepository $basketRepository)
    {
        $this->glass = $glass;
        $this->basketRepository = $basketRepository;
    }


    /**
     * @param int $frameId
     * @param int $lensId
     * @throws OutOfStock
     */
    public function create(int $frameId, int $lensId): void
    {
        $frame = Frame::query()->find($frameId);
        $lens = Lens::query()->find($lensId);
        $this->checkStock($frame, $lens);
        $this->setGlassAttributes($frameId, $lensId);
        $basket = $this->basketRepository->getUnConfirmedBasket();
        if (!$basket)
            $this->basketRepository->create();
        else
            $this->basketRepository->setBasket($basket);
        $this->addToBasket();
        $this->glass->save();
        $this->decrementStock($frame, $lens);

    }


    /**
     * @param Frame $frame
     * @param Lens $lens
     * @throws OutOfStock
     */
    private function checkStock(Frame $frame, Lens $lens)
    {
        if (!$frame->stock) {
            throw new OutOfStock(Lang::get('messages.frame_out_of_stock'));
        }
        if ($lens->stock < Glass::NUMBER_OF_LENSES) {
            throw new OutOfStock(Lang::get('messages.lens_out_of_stock'));
        }
    }


    /**
     * @param int $frameId
     * @param int $lensId
     */
    private function setGlassAttributes(int $frameId, int $lensId)
    {
        $this->glass->frame_id = $frameId;
        $this->glass->lens_id = $lensId;
    }

    /**
     *
     */
    private function addToBasket()
    {
        $this->glass->basket_id = $this->basketRepository->getBasket()->id;
    }


    /**
     * @param Frame $frame
     * @param Lens $lens
     */
    private function decrementStock(Frame $frame, Lens $lens): void
    {
        $frame->query()->decrement('stock');
        $lens->query()->decrement('stock',Glass::NUMBER_OF_LENSES);
    }


}
