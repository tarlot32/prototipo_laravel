<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();

        return view('admin.gproveedores.listadoproveedores', compact('proveedores'));
    }

    public function create()
    {
        return view('admin.gproveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_empresa' => ['required', 'string', 'max:255'],
            'contacto' => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'direccion' => ['nullable', 'string', 'max:255'],
        ]);

        $proveedor = new Proveedor;
        $proveedor->nombre_empresa = $request->input('nombre_empresa');
        $proveedor->contacto = $request->input('contacto');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->save();

        return redirect()
            ->route('proveedores.index')
            ->with('success', '¡Proveedor registrado exitosamente!');
    }

    public function update(Request $request, string $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $request->validate([
            'nombre_empresa' => ['required', 'string', 'max:255'],
            'contacto' => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'direccion' => ['nullable', 'string', 'max:255'],
        ]);

        $proveedor->nombre_empresa = $request->input('nombre_empresa');
        $proveedor->contacto = $request->input('contacto');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->save();

        return back()->with('success', 'Proveedor actualizado exitosamente');
    }

    public function destroy(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return back()->with('success', 'Proveedor eliminado exitosamente');
    }
}
