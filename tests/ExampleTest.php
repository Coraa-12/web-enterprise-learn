<?php

use App\Greeter;

it('greets the user properly', function () {
    $greeter = new Greeter();
    expect($greeter->greet('Developer'))->toBe('Hello, Developer!');
});
