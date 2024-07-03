<?php

namespace App\Livewire;

use App\Models\Factura;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FacturaComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $desde;
    public $hasta;
    public $usuario;
    public $paciente;
    public $usuarios;
    public $pacientes;

    public function mount()
    {
        $this->usuarios = User::all();
        $this->pacientes = Paciente::all();
    }

    public function updating(){
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['desde','hasta','usuario','paciente']);
    }

    public function deleteFactura($factura_id)
    {
        //inicia transaccion
        DB::beginTransaction();

        try {
            $factura = Factura::findOrFail($factura_id);

            $lineasPago = $factura->pagos;

            foreach ($lineasPago as $pago) {
                //recupera la relacion entre factura y pagos
                $relacionFacturaPagos = $pago->pagos()->where('fatura_id', $factura->pago_id)->first();

                if ($relacionFacturaPagos === null) {
                    throw new Exception('No se puede eliminar la factura');
                }
            }
            $cnatidadPagos = $lineasPago->pivot->cantidad;

            $lineasPago->pagos()->updateExistingPivot($factura->pago_id, ['cantidad' => $cnatidadPagos + $relacionFacturaPagos]);

            if ($factura->factura_id !== null){
                Factura::destroy($factura->factura_id);
            }

            $factura->delete();
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            session()->flash('error', 'No se puede eliminar la factura '.$e->getMessage());
        }
        return redirect()->route('factura.index');
    }


    public function render()
    {
        $query = Factura::query();
        if (!empty($this->usuario)){
            $query = $query->where('usuario_id', $this->usuario);
        }
        if (!empty($this->paciente)){
            $query = $query->where('paciente_id', $this->paciente);
        }
        if (!empty($this->desde)){
            $query = $query->where('desde', '>=', $this->desde);
        }
        if (!empty($this->hasta)){
            $query = $query->where('hasta', '<=', $this->hasta);
        }

        $facturas = $query->orderBy('id', 'DESC')->paginate(6);

        return view('livewire.factura-component', compact('facturas'));
    }

}
