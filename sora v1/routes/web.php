<?php

use App\Http\Controllers\SerieController;
use Illuminate\Support\Facades\Route;




route::get("/",[SerieController::class,"index"])->name("serie.index");

route::get("/biblioteca",[SerieController::class,"biblioteca"])->name("series.biblioteca");

route::get("/serie/{seriecreada_id}/edit",[SerieController::class,"edit"])->name("serie.edit");

route::put("serie/{seriecreada_id}",[SerieController::class,"update"])->name("serie.update");

route::get("/serie/{seriecreada_id}/show",[SerieController::class,"show"])->name("serie.show");

route::delete("/serie/{seriecreada_id}/destroy",[SerieController::class,"destroy"])->name("serie.destroy");


route::get("series/create",[SerieController::class,"create"])->name("serie.create");


route::post("/",[SerieController::class,"store"])->name("serie.store");



