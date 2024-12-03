<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CheckUserActivity extends Command
{
    protected $signature = 'usuarios:verificar-actividad';
    protected $description = 'Asegurarse de que todos los usuarios activos refieran a alguien cada mes.';

    public function handle()
    {
        // Obtener todos los usuarios suscritos
        $usuarios = \DB::table('users')
            ->where('is_subscribed', 1)
            ->get();

        foreach ($usuarios as $usuario) {
            // Verificar si el usuario refirió a alguien en el mes actual
            $referidosContados = \DB::table('users')
                ->where('refer', $usuario->id) // Contar usuarios referidos por este usuario
                ->whereMonth('created_at', Carbon::now()->month) // En el mes actual
                ->count();

            if ($referidosContados === 0) {
                // El usuario no refirió a nadie; marcar como inactivo y deducir 100Bs si es posible
                $this->marcarUsuarioInactivo($usuario);
            }
        }

        $this->info('La verificación de referidos de los usuarios se completó exitosamente.');
    }

    private function marcarUsuarioInactivo($usuario)
    {
        if ($usuario->balance >= 100) {
            // Deducir 100Bs del saldo
            \DB::table('users')
                ->where('id', $usuario->id)
                ->update([
                    'balance' => $usuario->balance - 100,
                    'is_subscribed' => 0, // Marcar como inactivo
                ]);

            // Notificar al usuario
            $this->notificarUsuario($usuario, false);
        } else {
            // Si el saldo es insuficiente, simplemente marcar como inactivo
            \DB::table('users')
                ->where('id', $usuario->id)
                ->update(['is_subscribed' => 0]);
        }
    }

    private function notificarUsuario($usuario, $activado)
    {
        $mensajeCorreo = $activado
            ? 'Tu cuenta ha sido activada. Por favor, refiere al menos a un usuario este mes para mantenerte activo.'
            : 'No referiste a nadie este mes. Se han deducido 100Bs de tu saldo y tu cuenta ahora está inactiva.';

        Mail::raw($mensajeCorreo, function ($message) use ($usuario) {
            $message->to($usuario->email)
                    ->subject('Actualización del estado de tu cuenta');
        });
    }
}
