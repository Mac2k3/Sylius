<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Behat\Context\Transform;

use Behat\Behat\Context\Context;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Taxation\Model\TaxCategoryInterface;
use Sylius\Component\Taxation\Repository\TaxCategoryRepositoryInterface;

/**
 * @author Łukasz Chruściel <lukasz.chrusciel@lakion.com>
 */
class TaxCategoryContextSpec extends ObjectBehavior
{
    function let(TaxCategoryRepositoryInterface $taxCategoryRepository) {
        $this->beConstructedWith($taxCategoryRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Behat\Context\Transform\TaxCategoryContext');
    }

    function it_implements_context_interface()
    {
        $this->shouldImplement(Context::class);
    }

    function it_casts_tax_category_name_to_tax_category($taxCategoryRepository, TaxCategoryInterface $taxCategory)
    {
        $taxCategoryRepository->findOneByName('TaxCategory')->willReturn($taxCategory);

        $this->getTaxCategoryByName('TaxCategory')->shouldReturn($taxCategory);
    }

    function it_throws_exception_if_there_is_no_tax_category_with_name_given_to_casting($taxCategoryRepository)
    {
        $taxCategoryRepository->findOneByName('TaxCategory')->willReturn(null);

        $this
            ->shouldThrow(new \InvalidArgumentException('Tax category with name "TaxCategory" does not exist'))
            ->during('getTaxCategoryByName', ['TaxCategory'])
        ;
    }
}
