<?php
namespace App\Http\Controllers;

use App\Models\AlertasInventario;

class AlertasController extends Controller {
    public function resolverAlerta($id) {
        $alerta = AlertasInventario::findOrFail($id);
        $alerta->update(['resuelta' => true]);
        return redirect()->back()->with('success', 'Alerta resuelta con éxito.');
    }
}
