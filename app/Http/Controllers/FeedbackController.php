<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the feedback.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(10);

        $widget = [
            'total_feedbacks' => Feedback::count(),
            'average_satisfaction' => Feedback::avg('overall_satisfaction'),
            //...
        ];

        return view('feedback.index', compact('feedbacks', 'widget'));
    }

    /**
     * Show the form for creating a new feedback.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created feedback in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'requirements_rating' => 'required|integer|min:1|max:5',
            'procedure_rating' => 'required|integer|min:1|max:5',
            'timeliness_rating' => 'required|integer|min:1|max:5',
            'cost_rating' => 'required|integer|min:1|max:5',
            'product_quality_rating' => 'required|integer|min:1|max:5',
            'staff_competence_rating' => 'required|integer|min:1|max:5',
            'staff_politeness_rating' => 'required|integer|min:1|max:5',
            'handling_complaint_rating' => 'required|integer|min:1|max:5',
            'facility_rating' => 'required|integer|min:1|max:5',
            'overall_satisfaction' => 'required|integer|min:1|max:5',
            'message' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Feedback::create($request->all());

        return redirect()->route('feedback.index')
            ->with('success', 'Data survei kepuasan berhasil ditambahkan!');
    }

    /**
     * Display the specified feedback.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Feedback $feedback)
    {
        return view('feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified feedback.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified feedback in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Feedback $feedback)
    {
        $validator = Validator::make($request->all(), [
            'requirements_rating' => 'required|integer|min:1|max:5',
            'procedure_rating' => 'required|integer|min:1|max:5',
            'timeliness_rating' => 'required|integer|min:1|max:5',
            'cost_rating' => 'required|integer|min:1|max:5',
            'product_quality_rating' => 'required|integer|min:1|max:5',
            'staff_competence_rating' => 'required|integer|min:1|max:5',
            'staff_politeness_rating' => 'required|integer|min:1|max:5',
            'handling_complaint_rating' => 'required|integer|min:1|max:5',
            'facility_rating' => 'required|integer|min:1|max:5',
            'overall_satisfaction' => 'required|integer|min:1|max:5',
            'message' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $feedback->update($request->all());

        return redirect()->route('feedback.index')
            ->with('success', 'Data survei kepuasan berhasil diperbarui!');
    }

    /**
     * Remove the specified feedback from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('feedback.index')
            ->with('success', 'Data survei kepuasan berhasil dihapus!');
    }
}