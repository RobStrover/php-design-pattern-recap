<?php


class CustomerIsGold {

    public function isSatisfiedBy(Customer $customer)
    {
        return $customer->getType() == 'gold';
        // This can be as complex as it needs to be.
    }

    public function asScope($query)
    {
        return $query->where('type', 'gold');
    }

}