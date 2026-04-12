<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\VolunteerTask;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{

    public function index()
    {
        return Evaluation::latest()->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'volunteer_id' => 'required',
            'score' => 'required|numeric|min:0|max:100',
            'notes' => 'nullable|string',
            'id' =>'nullable'
        ]);

        return Evaluation::create($data);
    }

    public function show($id)
    {
        return Evaluation::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $evaluation = Evaluation::findOrFail($id);

        $evaluation->update($request->all());

        return $evaluation;
    }

    public function destroy($id)
    {
        Evaluation::destroy($id);

        return response()->json(['message' => 'Deleted']);
    }


    public function supervisors()
    {
        return VolunteerTask::selectRaw('supervisor_id,
                COUNT(*) as total_tasks,
                SUM(CASE WHEN status = "completed" THEN 1 ELSE 0 END) as completed_tasks
            ')
            ->groupBy('supervisor_id')
            ->get();
    }
}
