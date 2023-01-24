<?php

declare(strict_types=1);

namespace Pokedex\Apps\Backoffice\Frontend\Controller\Courses;

use Pokedex\Mooc\CoursesCounter\Application\Find\CoursesCounterResponse;
use Pokedex\Mooc\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use Pokedex\Shared\Domain\ValueObject\Uuid;
use Pokedex\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesGetWebController extends WebController
{
    public function __invoke(Request $request): Response
    {
        /** @var CoursesCounterResponse $coursesCounterResponse */
        $coursesCounterResponse = $this->ask(new FindCoursesCounterQuery());

        return $this->render(
            'pages/courses/courses.html.twig',
            [
                'title'           => 'Courses',
                'description'     => 'Courses Pokedex - Backoffice',
                'courses_counter' => $coursesCounterResponse->total(),
                'new_course_id'   => Uuid::random()->value(),
            ]
        );
    }

    protected function exceptions(): array
    {
        return [];
    }
}
