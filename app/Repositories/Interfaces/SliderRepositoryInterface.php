<?php

namespace App\Repositories\Interfaces;

interface SliderRepositoryInterface
{
    /**
     * Obtener todos los sliders.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * Obtener un slider por ID.
     *
     * @param int $id
     * @return \App\Models\Slider|null
     */
    public function findById(int $id);

    /**
     * Crear un nuevo slider.
     *
     * @param array $data
     * @return \App\Models\Slider
     */
    public function create(array $data);

    /**
     * Actualizar un slider existente.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Slider|null
     */
    public function update(int $id, array $data);

    /**
     * Eliminar un slider.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}