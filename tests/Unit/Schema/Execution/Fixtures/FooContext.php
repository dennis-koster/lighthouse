<?php declare(strict_types=1);

namespace Tests\Unit\Schema\Execution\Fixtures;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class FooContext implements GraphQLContext
{
    public const FROM_FOO_CONTEXT = 'custom.context';

    public function __construct(private Request $request) {}

    public function user(): User
    {
        return new User();
    }

    public function setUser(?Authenticatable $user): void
    {
    }

    public function request(): Request
    {
        return $this->request;
    }

    public function foo(): string
    {
        return self::FROM_FOO_CONTEXT;
    }
}
