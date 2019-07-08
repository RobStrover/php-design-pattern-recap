<?php


class CusomersRepositoryTest extends \PHPUnit\Framework\TestCase
{

    protected $customers;

    public function setUp(): void
    {
        $this->customers = new CustomersRepository;
    }

    /** @test */
    function it_fetches_all_customers()
    {

        $results = $this->customers->all();

        $this->assertCount(7, $results);

    }

    /** @test */
    function it_fetches_all_cusomtes_who_match_a_given_specification()
    {

        $results = $this->customers->matchingSpecification(new CustomerIsGold);

        $this->assertCount(5, $results);

    }

}