<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Repositories\Interfaces\SliderRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SliderController extends Controller
{
    /**
     * @var SliderRepositoryInterface
     */
    protected $sliderRepository;

    /**
     * SliderController constructor.
     *
     * @param SliderRepositoryInterface $sliderRepository
     */
    public function __construct(SliderRepositoryInterface $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    /**
     * Mostrar listado de sliders.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $sliders = $this->sliderRepository->getAll();
        
        return response()->json([
            'success' => true,
            'data' => $sliders
        ]);
    }

    /**
     * Almacenar un nuevo slider.
     *
     * @param StoreSliderRequest $request
     * @return JsonResponse
     */
    public function store(StoreSliderRequest $request): JsonResponse
    {
        $slider = $this->sliderRepository->create($request->validated());
        
        return response()->json([
            'success' => true,
            'message' => 'Slider creado exitosamente',
            'data' => $slider
        ], Response::HTTP_CREATED);
    }

    /**
     * Mostrar un slider específico.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $slider = $this->sliderRepository->findById($id);
        
        if (!$slider) {
            return response()->json([
                'success' => false,
                'message' => 'Slider no encontrado'
            ], Response::HTTP_NOT_FOUND);
        }
        
        return response()->json([
            'success' => true,
            'data' => $slider
        ]);
    }

    /**
     * Actualizar un slider existente.
     *
     * @param UpdateSliderRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateSliderRequest $request, int $id): JsonResponse
    {
        $slider = $this->sliderRepository->update($id, $request->validated());
        
        if (!$slider) {
            return response()->json([
                'success' => false,
                'message' => 'Slider no encontrado'
            ], Response::HTTP_NOT_FOUND);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Slider actualizado exitosamente',
            'data' => $slider
        ]);
    }

    /**
     * Eliminar un slider.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->sliderRepository->delete($id);
        
        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Slider no encontrado'
            ], Response::HTTP_NOT_FOUND);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Slider eliminado exitosamente'
        ]);
    }
}