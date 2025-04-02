<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('forms.forms', compact('forms')); // ✅ Correct
    }


    public function create()
    {
        return view('forms.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'questions' => 'required|array',
            'types' => 'required|array',
        ]);

        // Structurer les questions avec les réponses
        $questionsData = [];
        foreach ($request->questions as $index => $question) {
            $questionsData[] = [
                'question' => $question,
                'type' => $request->types[$index],
                'answers' => $request->types[$index] === 'multiple' ? $request->input("answers.$index", []) : [],
            ];
        }

        // Enregistrement du sondage dans la base MongoDB
        Form::create([
            'title' => $request->title,
            'description' => $request->description,
            'questions' => json_encode($questionsData),
        ]);

        return redirect()->route('forms.index')->with('success', 'Sondage créé avec succès !');
    }


    public function show($id)
    {
        $form = Form::find($id);
        return view('show', compact('form'));
    }
}
