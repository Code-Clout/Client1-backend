<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentTestimonialRequest;
use App\Http\Requests\UpdateStudentTestimonialRequest;
use App\Repositories\Interfaces\StudentTestimonialRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentTestimonialController extends Controller
{
    protected $testimonialRepository;

    public function __construct(StudentTestimonialRepositoryInterface $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }

    public function index()
    {
        $testimonials = $this->testimonialRepository->all();
        if ($testimonials->isEmpty()) {
            return response()->json(['message' => 'No testimonials found.'], 404);
        }
        return response()->json($testimonials, 200);
    }

    public function show($id)
    {
        try {
            $testimonial = $this->testimonialRepository->find($id);
            return response()->json($testimonial, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Student testimonial not found.'], 404);
        }
    }

    public function store(StoreStudentTestimonialRequest $request)
    {
        $data = $request->validated();
        $data['student_photo'] = $request->file('student_photo')->store('public/photos');
        $data['company_logo'] = $request->file('company_logo')->store('public/logos');
        $this->testimonialRepository->create($data);
        return response()->json(['message' => 'Student testimonial stored successfully!'], 201);
    }

    public function update(UpdateStudentTestimonialRequest $request, $id)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('student_photo')) {
                $data['student_photo'] = $request->file('student_photo')->store('public/photos');
            }
            if ($request->hasFile('company_logo')) {
                $data['company_logo'] = $request->file('company_logo')->store('public/logos');
            }
            $updatedTestimonial = $this->testimonialRepository->update($id, $data);
            return response()->json(['message' => 'Student testimonial updated successfully.', 'data' => $updatedTestimonial], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Student testimonial not found.'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->testimonialRepository->delete($id);
            return response()->json(['message' => 'Student testimonial deleted successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Student testimonial not found.'], 404);
        }
    }
}
