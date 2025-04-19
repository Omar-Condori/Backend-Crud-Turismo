<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Repositories\Interfaces\SliderRepositoryInterface;

class SliderRepository implements SliderRepositoryInterface
{
    /**
     * @var Slider
     */
    protected $model;

    /**
     * SliderRepository constructor.
     *
     * @param Slider $slider
     */
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }

    /**
     * Obtener todos los sliders.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->orderBy('orden')->get();
    }

    /**
     * Obtener un slider por ID.
     *
     * @param int $id
     * @return \App\Models\Slider|null
     */
    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Crear un nuevo slider.
     *
     * @param array $data
     * @return \App\Models\Slider
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Actualizar un slider existente.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Slider|null
     */
    public function update(int $id, array $data)
    {
        $slider = $this->findById($id);
        
        if (!$slider) {
            return null;
        }

        $slider->update($data);
        return $slider;
    }

    /**
     * Eliminar un slider.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $slider = $this->findById($id);
        
        if (!$slider) {
            return false;
        }

        return $slider->delete();
    }
}