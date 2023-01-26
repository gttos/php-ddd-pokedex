<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Pokemon\Application\Create;

use Pokedex\Mooc\Pokemon\Application\Create\CreatePokemonCommandHandler;
use Pokedex\Mooc\Pokemon\Application\Create\PokemonCreator;
use Pokedex\Tests\Mooc\Pokemon\Domain\PokemonCreatedDomainEventMother;
use Pokedex\Tests\Mooc\Pokemon\Domain\PokemonMother;
use Pokedex\Tests\Mooc\Pokemon\PokemonModuleUnitTestCase;

final class CreatePokemonCommandHandlerTest extends PokemonModuleUnitTestCase
{
    private CreatePokemonCommandHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreatePokemonCommandHandler(new PokemonCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $command = CreatePokemonCommandMother::create();

        $pokemon = PokemonMother::fromRequest($command);
        $domainEvent = PokemonCreatedDomainEventMother::fromCourse($pokemon);

        $this->shouldSave($pokemon);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
