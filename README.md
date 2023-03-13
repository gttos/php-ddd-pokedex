<p align="center">
  <a href="https://codely.com">
    <img alt="Codely logo" src="https://user-images.githubusercontent.com/10558907/170513882-a09eee57-7765-4ca4-b2dd-3c2e061fdad0.png" width="300px" height="92px"/>
  </a>
</p>

<h1 align="center">
    Pokedex PHP // DDD
</h1>

<p align="center">
    <a href="https://github.com/CodelyTV"><img src="https://img.shields.io/badge/CodelyTV-OS-green.svg?style=flat-square" alt="codely.tv"/></a>
    <a href="http://pro.codely.tv"><img src="https://img.shields.io/badge/CodelyTV-PRO-black.svg?style=flat-square" alt="CodelyTV Courses"/></a>
    <a href="#"><img src="https://img.shields.io/badge/Symfony-5.0-purple.svg?style=flat-square&logo=symfony" alt="Symfony 5.0"/></a>
    <a href="https://github.com/CodelyTV/php-ddd-example/actions"><img src="https://github.com/CodelyTV/php-ddd-example/workflows/CI/badge.svg?branch=master" alt="CI pipeline status" /></a>
</p>

<p align="center">
  Piece of <strong>PHP application using Domain-Driven Design (DDD) and Command Query Responsibility Segregation
  (CQRS) principles</strong> keeping the code as simple as possible.
  <br />
  <br />
  Take a look, play and have fun with this.
</p>

## 🚀 Environment Setup

### 🐳 Needed tools

1. [Install Docker](https://www.docker.com/get-started)
2. Clone this project: `git clone https://github.com/gttos/php-ddd-pokedex.git`
3. Move to the project folder: `cd php-ddd-example`

### 🛠️ Environment configuration

1. Create a local environment file (`cp .env .env.local`) if you want to modify any parameter

### 🔥 Application execution

1. Install all the dependencies and bring up the project with Docker executing: `make build`
2. Then you'll have 3 apps available (2 APIs and 1 Frontend):
   1. [Web Frontend](apps/web/frontend): http://localhost:8031/health-check
   2. [Web Backend](apps/web/backend): http://localhost:8030/health-check
   3. [Backoffice Frontend](apps/backoffice/frontend): http://localhost:8041/health-check
   4. [Backoffice Backend](apps/backoffice/backend): http://localhost:8040/health-check

### ✅ Tests execution

1. Install the dependencies if you haven't done it previously: `make deps`
2. Execute PHPUnit and Behat tests: `make test`

### ✅ Fill Pokemon Database

1. Enter to Pokemon Backoffice Container: `make shell-bb`
2. Run this command to fill the MySql Database: `php apps/backoffice/backend/bin/console pokedex:pokeapi:get $limit` [replace {$limit} variable: example 50]

### ✅ API Pokemon 

```
You might have filled the DB before getting any information from the API.
```
1. All Pokemon: `http://0.0.0.0:8030/pokemon`
2. One Pokemon: `http://0.0.0.0:8030/pokemon/1` 

## 👩‍💻 Project explanation

This project tries to be a WEB (Massive Open Online Course) platform. It's decoupled from any framework, but it has
some Symfony and Laravel implementations.

### ⛱️ Bounded Contexts

* [Web](src/Web): Place to look in if you wanna see some code 🙂. Massive Open Online Courses public platform with users, videos, notifications, and so on.
* [Backoffice](src/Backoffice): Here you'll find the use cases needed by the Customer Support department in order to manage users, courses, videos, and so on.

### 🎯 Hexagonal Architecture

This repository follows the Hexagonal Architecture pattern. Also, it's structured using `modules`.
With this, we can see that the current structure of a Bounded Context is:

```scala
$ tree -L 4 src

src
|-- Web // Company subdomain / Bounded Context: Features related to one of the company business lines / products
|   `-- Videos // Some Module inside the Web context
|       |-- Application
|       |   |-- Create // Inside the application layer all is structured by actions
|       |   |   |-- CreateVideoCommand.php
|       |   |   |-- CreateVideoCommandHandler.php
|       |   |   `-- VideoCreator.php
|       |   |-- Find
|       |   |-- Trim
|       |   `-- Update
|       |-- Domain
|       |   |-- Video.php // The Aggregate of the Module
|       |   |-- VideoCreatedDomainEvent.php // A Domain Event
|       |   |-- VideoFinder.php
|       |   |-- VideoId.php
|       |   |-- VideoNotFound.php
|       |   |-- VideoRepository.php // The `Interface` of the repository is inside Domain
|       |   |-- VideoTitle.php
|       |   |-- VideoType.php
|       |   |-- VideoUrl.php
|       |   `-- Videos.php // A collection of our Aggregate
|       `-- Infrastructure // The infrastructure of our module
|           |-- DependencyInjection
|           `-- Persistence
|               `--MySqlVideoRepository.php // An implementation of the repository
`-- Shared // Shared Kernel: Common infrastructure and domain shared between the different Bounded Contexts
    |-- Domain
    `-- Infrastructure
```

#### Repository pattern
Our repositories try to be as simple as possible usually only containing 2 methods `search` and `save`.
If we need some query with more filters we use the `Specification` pattern also known as `Criteria` pattern. So we add a
`searchByCriteria` method.

You can see an example [here](src/Web/Courses/Domain/CourseRepository.php)
and its implementation [here](src/Web/Courses/Infrastructure/Persistence/MySqlCourseRepository.php).

### Aggregates
You can see an example of an aggregate [here](src/Web/Courses/Domain/Course.php). All aggregates should
extend the [AggregateRoot](src/Shared/Domain/Aggregate/AggregateRoot.php).

### Command Bus
There is 1 implementations of the [command bus](src/Shared/Domain/Bus/Command/CommandBus.php).
1. [Sync](src/Shared/Infrastructure/Bus/Command/InMemorySymfonyCommandBus.php) using the Symfony Message Bus

### Query Bus
The [Query Bus](src/Shared/Infrastructure/Bus/Query/InMemorySymfonyQueryBus.php) uses the Symfony Message Bus.

### Event Bus
The [Event Bus](src/Shared/Infrastructure/Bus/Event/InMemory/InMemorySymfonyEventBus.php) uses the Symfony Message Bus.
The [MySql Bus](src/Shared/Infrastructure/Bus/Event/MySql/MySqlDoctrineEventBus.php) uses a MySql+Pulling as a bus.
The [RabbitMQ Bus](src/Shared/Infrastructure/Bus/Event/RabbitMq/RabbitMqEventBus.php) uses RabbitMQ C extension.

## 📱 Monitoring
Every time a domain event is published it's exported to Prometheus. You can access to the Prometheus panel [here](http://localhost:9999/).

## 🤔 Contributing
There are some things missing (add swagger, improve documentation...), feel free to add this if you want! If you want
some guidelines feel free to contact us :)

## 🤩 Extra
This code was shown in the [From framework coupled code to #microservices through #DDD](http://codely.tv/screencasts/codigo-acoplado-framework-microservicios-ddd) talk and doubts where answered in the [DDD y CQRS: Preguntas Frecuentes](http://codely.tv/screencasts/ddd-cqrs-preguntas-frecuentes/) video.

🎥 Used in the CodelyTV Pro courses:
* [🇪🇸 DDD in PHP](https://pro.codely.tv/library/ddd-en-php/about/)
* [🇪🇸 Arquitectura Hexagonal](https://pro.codely.tv/library/arquitectura-hexagonal/66748/about/)
* [🇪🇸 CQRS: Command Query Responsibility Segregation](https://pro.codely.tv/library/cqrs-command-query-responsibility-segregation-3719e4aa/62554/about/)
* [🇪🇸 Comunicación entre microservicios: Event-Driven Architecture](https://pro.codely.tv/library/comunicacion-entre-microservicios-event-driven-architecture/74823/about/)
