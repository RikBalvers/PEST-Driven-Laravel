<?php

use Illuminate\Support\Facades\Validator;

it('checks for missing debug statements', function() {
    expect(['dd', 'dump', 'ray'])
        ->not->toBeUsed();
});

it('checks the validator facade is not used', function() {
    expect(Validator::class)
        ->not->toBeUsed()
        ->ignoring('App\Actions\Fortify');
});
