<?php

namespace App\Repositories;

use App\Models\Basket;

class BasketRepository
{
    private $basket;

    /**
     * @param $basket
     */
    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    /**
     * @param int $userId
     * @return Basket
     */
    public function create() : void
    {
        $user = auth()->user();
        $this->basket->user_id = $user->id ;
        $this->basket->save();
    }
    public function getUnConfirmedBasket()
    {
        $user = auth()->user();
        return Basket::query()->where('confirmed',false)
            ->where('user_id',$user->id)
            ->first();
    }

    /**
     * @return Basket
     */
    public function getBasket(): Basket
    {
        return $this->basket;
    }

    /**
     * @param Basket $basket
     */
    public function setBasket(Basket $basket): void
    {
        $this->basket = $basket;
    }


}
