<?php

namespace App\Http\Controllers\Concerns;

use App\Concern;
use Illuminate\Http\Request;
use App\Events\ConcernWasResolved;
use App\Http\Controllers\Controller;

class ConcernsController extends Controller
{
    public function update(Concern $concern)
    {
        $concern->update(request()->all());

        broadcast(new ConcernWasResolved($concern->load('user')))->toOthers();

        return response()->json($concern, 202);
    }

    public function delete(Concern $concern)
    {
        $concern->delete();

        return response()->json(204);
    }
}
