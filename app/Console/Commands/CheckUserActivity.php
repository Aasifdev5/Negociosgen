<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class CheckUserActivity extends Command
{
    // Command signature
    protected $signature = 'usuarios:verificar-actividad';

    // Command description
    protected $description = 'Asegurarse de que todos los usuarios activos refieran a alguien cada mes.';

    public function handle()
    {
        $this->info('Iniciando la verificación de actividad de usuarios.');

        // Retrieve all subscribed users
        $usuarios = DB::table('users')
            ->where('is_subscribed', 1)
            ->get();

        foreach ($usuarios as $usuario) {
            // Check referrals for the current month
            $referidosContados = DB::table('users')
                ->where('refer', $usuario->id)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();

            if ($referidosContados === 0) {
                // Mark user as inactive if no referrals were made
                $this->marcarUsuarioInactivo($usuario);
            } else {
                $this->info("El usuario {$usuario->id} tiene {$referidosContados} referidos este mes.");
            }
        }

        $this->info('La verificación de actividad de usuarios se completó.');
    }

    private function marcarUsuarioInactivo($usuario)
    {
        if ($usuario->balance >= 100) {
            // Deduct 100 from balance and mark as inactive
            DB::table('users')
                ->where('id', $usuario->id)
                ->update([
                    'balance' => $usuario->balance - 100,
                    'is_subscribed' => 0,
                ]);

            $this->info("El usuario {$usuario->id} ha sido marcado como inactivo y se dedujeron 100Bs.");
            $this->notificarUsuario($usuario, false);
        } else {
            // Mark as inactive without deduction
            DB::table('users')
                ->where('id', $usuario->id)
                ->update(['is_subscribed' => 0,'is_active'=>0]);

            $this->info("El usuario {$usuario->id} ha sido marcado como inactivo debido a saldo insuficiente.");
        }
    }

    private function notificarUsuario($usuario, $activado)
    {
        $mensajeCorreo = $activado
            ? 'Tu cuenta ha sido activada. Refiera a alguien este mes para permanecer activo.'
            : 'Tu cuenta ha sido desactivada. Se dedujeron 100Bs de tu saldo.';

        Mail::raw($mensajeCorreo, function ($message) use ($usuario) {
            $message->to($usuario->email)
                    ->subject('Estado de tu cuenta');
        });

        $this->info("Se envió un correo al usuario {$usuario->id}.");
    }
}
