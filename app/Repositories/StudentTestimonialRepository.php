<?php
namespace App\Repositories;

use App\Models\StudentTestimonial;
use App\Repositories\Interfaces\StudentTestimonialRepositoryInterface;

class StudentTestimonialRepository implements StudentTestimonialRepositoryInterface
{
    public function all()
    {
        return StudentTestimonial::all();
    }

    public function find($id)
    {
        return StudentTestimonial::findOrFail($id);
    }

    public function create(array $data)
    {
        return StudentTestimonial::create($data);
    }

    public function update($id, array $data)
    {
        $testimonial = $this->find($id);
        $testimonial->update($data);
        return $testimonial;
    }

    public function delete($id)
    {
        $testimonial = $this->find($id);
        return $testimonial->delete();
    }
}
