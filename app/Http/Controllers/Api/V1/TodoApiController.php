<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UppgiftRepo;
use Illuminate\Http\Request;
use App\Models\Uppgift;

class TodoApiController extends Controller
{
    public function __construct(private UppgiftRepo $repo)
    {
    }

    public function all()
    {
        $lista = $this->repo->all();
        return response()->json(['todo' => $lista]);
    }

    public function get(Request $request)
    {
        try {
            $id = filter_var($request->route('id'), FILTER_VALIDATE_INT);
            $item = $this->repo->get($id);
            return response()->json(['todo' => $item]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function add(Request $request)
    {
        try {
            $text = $request->input('uppgift');
            $uppgift = Uppgift::factory()->make(['text' => $text, 'done' => false]);

            $this->repo->add($uppgift);
            return response()->json(['todo' => $uppgift], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $id = filter_var($request->input('id'), FILTER_VALIDATE_INT);
            $uppgift = $this->repo->get($id);
            if (!$uppgift) {
                return response()->json(['error' => 'Not found'], 404);
            }

            $uppgift->text = $request->input('uppgift', $uppgift->text);
            $uppgift->done = $request->has('done') ? (bool)$request->input('done') : $uppgift->done;

            $this->repo->update($uppgift);

            return response()->json(['todo' => $uppgift]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function check(Request $request)
    {
        try {
            $id = filter_var($request->route('id'), FILTER_VALIDATE_INT);
            $uppgift = $this->repo->get($id);
            if (!$uppgift) {
                return response()->json(['error' => 'Not found'], 404);
            }

            $uppgift->done = !$uppgift->done;
            $this->repo->update($uppgift);

            return response()->json(['todo' => $uppgift]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function remove(Request $request)
    {
        try {
            $id = filter_var($request->input('id'), FILTER_VALIDATE_INT);
            $this->repo->delete($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}